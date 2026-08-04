document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("tailwind-ready");

    // 🎨 Efectos visuales de botones e inputs
    document.querySelectorAll("button").forEach((button) => {
        button.addEventListener("mousedown", () =>
            button.classList.add("scale-95"),
        );
        button.addEventListener("mouseup", () =>
            button.classList.remove("scale-95"),
        );
        button.addEventListener("mouseleave", () =>
            button.classList.remove("scale-95"),
        );
    });

    const inputs = document.querySelectorAll("input");
    inputs.forEach((input) => {
        const label = input.parentElement.querySelector("label");
        if (label) {
            input.addEventListener("focus", () => {
                label.style.color = "#8e4e14";
            });
            input.addEventListener("blur", () => {
                label.style.color = "";
            });
        }
    });

    let pedidosGuardados = JSON.parse(localStorage.getItem("my_orders")) || [];
    const cartContainer = document.getElementById("cart-orders-container");
    const selectMesaCart = document.getElementById("cart-table-select");
    const cartTableTitle = document.getElementById("cart-table-title");

    const saleModal = document.getElementById("sale-modal");
    const modalTitle = document.getElementById("modal-title");
    const modalMessage = document.getElementById("modal-message");
    const modalCloseBtn = document.getElementById("modal-close-btn");

    let modalCloseCallback = null;


    function showModal(title, message, isSuccess = true, onClose = null) {
        if (!saleModal) return;

        if (modalTitle) modalTitle.textContent = title;
        if (modalMessage) modalMessage.textContent = message;

        if (modalCloseBtn) {
            if (isSuccess) {
                modalCloseBtn.className =
                    "w-full bg-green-600 text-white font-semibold py-2.5 px-4 rounded-xl hover:bg-green-700 transition-colors";
            } else {
                modalCloseBtn.className =
                    "w-full bg-red-600 text-white font-semibold py-2.5 px-4 rounded-xl hover:bg-red-700 transition-colors";
            }
        }

        modalCloseCallback = onClose;
        saleModal.classList.remove("hidden");
    }

    if (modalCloseBtn) {
        modalCloseBtn.addEventListener("click", () => {
            if (saleModal) saleModal.classList.add("hidden");
            if (typeof modalCloseCallback === "function") {
                modalCloseCallback();
                modalCloseCallback = null;
            }
        });
    }

    const summaryMesaUsuario = document.getElementById("summary-table-user");
    const summaryModoPago = document.getElementById("summary-payment-mode");
    const summaryArticulosCount = document.getElementById("summary-items-count");
    const summaryArticulosTotal = document.getElementById("summary-subtotal");
    const totalFinalElem = document.getElementById("summary-total");
    const btnCheckout =
        document.querySelector("button.bg-primary") ||
        document.getElementById("btn-hacer-venta");

    const radioPaymentTypes = document.querySelectorAll(
        "input[name='tipo_pago']",
    );

    if (pedidosGuardados.length === 0) {
        if (cartContainer) {
            cartContainer.innerHTML = `<p class="text-center text-on-surface-variant py-8">No hay pedidos registrados todavía.</p>`;
        }
        return;
    }

    let mesaActual =
        selectMesaCart && selectMesaCart.value && selectMesaCart.value !== "0"
            ? `Mesa ${selectMesaCart.value}`
            : pedidosGuardados[0].mesa || "Mesa 1";

    if (selectMesaCart) {
        selectMesaCart.value = mesaActual.replace("Mesa ", "");
    }
    if (cartTableTitle) {
        cartTableTitle.innerText = mesaActual;
    }

    let pedidosSeleccionadosIndividual = new Set();

    function renderCartSummary() {
        const activeRadio = document.querySelector(
            "input[name='tipo_pago']:checked",
        );
        const paymentType = activeRadio ? activeRadio.value : "total";

        const pedidosFiltrados = pedidosGuardados.filter(
            (pedido) =>
                String(pedido.mesa).trim().toLowerCase() ===
                String(mesaActual).trim().toLowerCase(),
        );

        let totalGeneralMesa = 0;
        let totalSeleccionado = 0;
        let countItems = 0;
        let htmlProductos = "";

        if (pedidosFiltrados.length === 0) {
            if (cartContainer) {
                cartContainer.innerHTML = `
                    <div class="bg-surface-container-lowest rounded-xl p-8 text-center border border-outline-variant">
                        <p class="font-body-md text-on-surface-variant">No hay pedidos registrados para la ${mesaActual}.</p>
                    </div>
                `;
            }
            updateSummaryView(0, 0, 0, paymentType);
            return;
        }

        pedidosFiltrados.forEach((pedido) => {
            const nombreCliente = pedido.usuario || "Cliente";
            totalGeneralMesa += pedido.total || 0;

            const estaSeleccionado =
                paymentType === "total" ||
                pedidosSeleccionadosIndividual.has(pedido.id);

            if (estaSeleccionado) {
                totalSeleccionado += pedido.total || 0;
                if (pedido.productos && Array.isArray(pedido.productos)) {
                    pedido.productos.forEach((prod) => {
                        countItems += prod.quantity || 0;
                    });
                }
            }

            let cardClasses =
                "rounded-xl p-5 border shadow-sm mb-4 transition-all ";

            if (paymentType === "usuario") {
                if (estaSeleccionado) {
                    cardClasses +=
                        "border-green-600 bg-green-50/40 cursor-pointer ring-2 ring-green-600/20";
                } else {
                    cardClasses +=
                        "border-outline-variant bg-surface-container-lowest hover:border-gray-400 cursor-pointer opacity-75";
                }
            } else {
                cardClasses +=
                    "border-outline-variant bg-surface-container-lowest opacity-90 cursor-default pointer-events-none select-none";
            }

            let productosHtml = "";
            if (pedido.productos && Array.isArray(pedido.productos)) {
                pedido.productos.forEach((prod) => {
                    productosHtml += `
                        <li class="grid grid-cols-3 items-center gap-x-4 gap-y-1">
                            <span class="px-3 font-body-md text-on-surface font-medium">${prod.name || prod.nombre}</span>
                            <div class="flex items-center justify-center bg-surface-container-high rounded-lg p-0.5 border border-outline-variant justify-self-center">
                                <span class="w-8 text-center text-sm font-bold text-on-surface">${prod.quantity}</span>
                            </div>
                            <span class="font-body-md text-on-surface-variant text-right">$${(Number(prod.price || 0) * Number(prod.quantity || 0)).toFixed(2)}</span>
                        </li>
                    `;
                });
            }

            htmlProductos += `
                <div class="${cardClasses} order-card-item" data-pedido-id="${pedido.id}">
                    <div class="flex flex-col gap-3 mb-4 px-1">
                        <div class="flex items-center justify-between w-full">
                            <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
                                Cliente: <span class="text-on-surface-variant font-normal text-body-md">${nombreCliente}</span>
                                <span class="text-xs bg-primary/10 text-primary px-2 py-0.5 rounded-full ml-2">${pedido.mesa}</span>
                                ${paymentType === "usuario" && estaSeleccionado ? '<span class="text-xs bg-green-600 text-white px-2 py-0.5 rounded-full ml-2">Seleccionado</span>' : ""}
                            </h3>
                            <span class="font-price-display text-primary font-bold text-lg">$${Number(pedido.total || 0).toFixed(2)}</span>
                        </div>
                    </div>
                    <ul class="space-y-4">
                        ${productosHtml}
                    </ul>
                </div>
            `;
        });

        if (cartContainer) {
            cartContainer.innerHTML = htmlProductos;
        }

        let montoFinal =
            paymentType === "total" ? totalGeneralMesa : totalSeleccionado;
        let activeOrdersCount =
            paymentType === "total"
                ? pedidosFiltrados.length
                : pedidosSeleccionadosIndividual.size;

        updateSummaryView(
            countItems,
            montoFinal,
            activeOrdersCount,
            paymentType,
        );
    }

    function updateSummaryView(
        countItems,
        montoFinal,
        activeOrdersCount,
        paymentType,
    ) {
        if (summaryMesaUsuario) {
            if (paymentType === "usuario") {
                const pedidosFiltrados = pedidosGuardados.filter(
                    (p) =>
                        String(p.mesa).trim().toLowerCase() ===
                        String(mesaActual).trim().toLowerCase(),
                );
                const seleccionadosNombres = pedidosFiltrados
                    .filter((p) => pedidosSeleccionadosIndividual.has(p.id))
                    .map((p) => p.usuario || "Cliente");

                summaryMesaUsuario.innerText =
                    seleccionadosNombres.length > 0
                        ? `${mesaActual} / ${[...new Set(seleccionadosNombres)].join(", ")}`
                        : `${mesaActual} / Ninguno (Selecciona)`;
            } else {
                summaryMesaUsuario.innerText = `${mesaActual} / General (Todos)`;
            }
        }

        if (summaryModoPago) {
            summaryModoPago.innerText =
                paymentType === "total" ? "Pago Total Mesa" : "Individual";
        }
        if (summaryArticulosCount) {
            summaryArticulosCount.innerText = `Tus artículos (${countItems})`;
        }
        if (summaryArticulosTotal) {
            summaryArticulosTotal.innerText = `$${montoFinal.toFixed(2)}`;
        }
        if (totalFinalElem) {
            totalFinalElem.innerText = `$${montoFinal.toFixed(2)}`;
        }

        if (btnCheckout) {
            if (activeOrdersCount > 0 && montoFinal > 0) {
                btnCheckout.removeAttribute("disabled");
                btnCheckout.classList.remove(
                    "opacity-50",
                    "cursor-not-allowed",
                );
            } else {
                btnCheckout.setAttribute("disabled", "true");
                btnCheckout.classList.add("opacity-50", "cursor-not-allowed");
            }
        }
    }

    document.addEventListener("click", (e) => {
        const activeRadio = document.querySelector(
            "input[name='tipo_pago']:checked",
        );
        const paymentType = activeRadio ? activeRadio.value : "total";

        if (paymentType === "total") {
            return;
        }

        const card = e.target.closest(".order-card-item");
        if (card && paymentType === "usuario") {
            const pedidoId = Number(card.getAttribute("data-pedido-id"));

            if (pedidosSeleccionadosIndividual.has(pedidoId)) {
                pedidosSeleccionadosIndividual.delete(pedidoId);
            } else {
                pedidosSeleccionadosIndividual.add(pedidoId);
            }

            renderCartSummary();
        }
    });

    if (btnCheckout) {
        btnCheckout.addEventListener("click", async () => {
            const activeRadio = document.querySelector(
                "input[name='tipo_pago']:checked",
            );
            const paymentType = activeRadio ? activeRadio.value : "total";

            const pedidosFiltrados = pedidosGuardados.filter(
                (pedido) =>
                    String(pedido.mesa).trim().toLowerCase() ===
                    String(mesaActual).trim().toLowerCase(),
            );

            let activeOrdersCount =
                paymentType === "total"
                    ? pedidosFiltrados.length
                    : pedidosSeleccionadosIndividual.size;

            if (activeOrdersCount === 0) return;

            let productosAProcesar = [];
            let pedidosAfectados = [];

            if (paymentType === "total") {
                pedidosAfectados = pedidosFiltrados;
            } else {
                pedidosAfectados = pedidosFiltrados.filter((p) =>
                    pedidosSeleccionadosIndividual.has(p.id),
                );
            }

            pedidosAfectados.forEach((pedido) => {
                if (pedido.productos && Array.isArray(pedido.productos)) {
                    pedido.productos.forEach((prod) => {
                        productosAProcesar.push({
                            id_menu: prod.id || prod.id_menu || 1,
                            name: prod.name || prod.nombre || "Producto",
                            quantity: prod.quantity,
                            price: prod.price,
                        });
                    });
                }
            });

            const inputNombreCliente =
                document.getElementById("name_customer") ||
                document.getElementById("input-nombre-cliente");
            const inputEmailCliente =
                document.getElementById("email_customer") ||
                document.getElementById("input-email-cliente");

            const nombreClienteVal =
                inputNombreCliente && inputNombreCliente.value.trim() !== ""
                    ? inputNombreCliente.value
                    : "Cliente General";

            const emailClienteVal = inputEmailCliente
                ? inputEmailCliente.value.trim()
                : "";

            const datosVenta = {
                mesa: mesaActual,
                nombre: nombreClienteVal,
                email: emailClienteVal,
                productos: productosAProcesar,
            };

            try {
                const response = await fetch("/checkout/procesar", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN":
                            document
                                .querySelector('meta[name="csrf-token"]')
                                ?.getAttribute("content") || "",
                    },
                    body: JSON.stringify(datosVenta),
                });

                const resultado = await response.json();

                if (!resultado.success) {
                    showModal(
                        "Error al Procesar",
                        resultado.message || "Ocurrió un inconveniente con el registro.",
                        false
                    );
                    return;
                }

                btnCheckout.setAttribute("disabled", "true");
                btnCheckout.classList.remove(
                    "bg-primary",
                    "hover:brightness-110",
                );
                btnCheckout.classList.add(
                    "bg-green-600",
                    "text-white",
                    "cursor-default",
                );
                btnCheckout.innerHTML = `¡Pago Exitoso / Ticket Enviado! <span class="material-symbols-outlined">done_all</span>`;

                if (paymentType === "total") {
                    pedidosGuardados = pedidosGuardados.filter(
                        (pedido) =>
                            String(pedido.mesa).trim().toLowerCase() !==
                            String(mesaActual).trim().toLowerCase(),
                    );
                } else {
                    pedidosGuardados = pedidosGuardados.filter(
                        (pedido) =>
                            !pedidosSeleccionadosIndividual.has(pedido.id),
                    );
                    pedidosSeleccionadosIndividual.clear();
                }

                localStorage.setItem(
                    "my_orders",
                    JSON.stringify(pedidosGuardados),
                );

                showModal(
                    "¡Pago exitoso!",
                    "¡Venta registrada con éxito y ticket enviado al WhatsApp del cliente!",
                    true,
                    () => {
                        window.location.reload();
                    }
                );

            } catch (error) {
                console.error("Error en la petición:", error);
                showModal(
                    "Error de Conexión",
                    "Ocurrió un error de red al procesar el pago.",
                    false
                );
            }
        });
    }

    if (selectMesaCart) {
        selectMesaCart.addEventListener("change", (e) => {
            mesaActual = `Mesa ${e.target.value}`;
            if (cartTableTitle) cartTableTitle.innerText = mesaActual;
            pedidosSeleccionadosIndividual.clear();
            renderCartSummary();
        });
    }

    radioPaymentTypes.forEach((radio) => {
        radio.addEventListener("change", (e) => {
            if (e.target.value === "usuario") {
                pedidosSeleccionadosIndividual.clear();
            }
            renderCartSummary();
        });
    });

    renderCartSummary();
});