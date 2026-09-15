document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("ready");

    const ordersContainer = document.getElementById("orders-container");
    const tableSelect = document.getElementById("order-table-select");
    const tableTitle = document.getElementById("order-table-title");

    const totalTableLabel = document.getElementById("total-table-label");
    const totalTableAmount = document.getElementById("total-table-amount");
    const btnAccount = document.getElementById("btn-account");

    const normalizarMesa = (mesa) => {
        const mesaNormalizada = String(mesa || "").trim();
        return (
            {
                "Mesa 6": "Llevar-1",
                "Mesa 7": "Llevar-2",
            }[mesaNormalizada] || mesaNormalizada
        );
    };

    let mesaActual = "Mesa 1";
    if (tableSelect) {
        tableSelect.value = "Mesa 1";
    }

    // Modal de eliminar orden y variable de callback declarada correctamente
    let callbackConfirmacion = null;
    const deleteModal = document.getElementById("delete-modal");
    const deleteModalText = document.getElementById("delete-modal-text");
    const btnConfirmDelete = document.getElementById("btn-confirm-delete");
    const btnCancelDelete = document.getElementById("btn-cancel-delete");

    function mostrarModalEliminar(mensaje, accion) {
        if (!deleteModal) return;
        deleteModalText.textContent = mensaje;
        callbackConfirmacion = accion;
        deleteModal.classList.remove("hidden");
    }

    function cerrarModalEliminar() {
        if (!deleteModal) return;
        deleteModal.classList.add("hidden");
        callbackConfirmacion = null;
    }

    if (btnCancelDelete) {
        btnCancelDelete.addEventListener("click", cerrarModalEliminar);
    }

    if (btnConfirmDelete) {
        btnConfirmDelete.addEventListener("click", () => {
            if (typeof callbackConfirmacion === "function") {
                callbackConfirmacion();
            }
            cerrarModalEliminar();
        });
    }

    // Actualiza el estado visual (rojo/verde) de cada mesa en el selector
    function updateTableSelectStatus() {
        if (!tableSelect) return;

        const pedidosGuardados =
            JSON.parse(localStorage.getItem("my_orders")) || [];

        Array.from(tableSelect.options).forEach((option) => {
            if (option.hidden) return;

            const nombreMesaOption = option.textContent.trim().toLowerCase();
            const tienePedido = pedidosGuardados.some(
                (pedido) =>
                    normalizarMesa(pedido.mesa).toLowerCase() ===
                    nombreMesaOption,
            );

            if (tienePedido) {
                option.disabled = false;
                option.style.color = "#16a34a"; // Verde
                option.style.fontWeight = "bold";
            } else {
                option.disabled = true;
                option.style.color = "#dc2626"; // Rojo
                option.style.fontWeight = "normal";
            }
        });
    }

    function renderOrders() {
        const pedidosGuardados =
            JSON.parse(localStorage.getItem("my_orders")) || [];

        // 1. Validar si la mesa actual tiene pedidos activos
        const tienePedidosMesaActual = pedidosGuardados.some(
            (p) =>
                String(p.mesa).trim().toLowerCase() ===
                normalizarMesa(mesaActual).toLowerCase(),
        );

        if (!tienePedidosMesaActual && pedidosGuardados.length > 0) {
            const mesaConPedido = pedidosGuardados.find((p) => p.mesa);
            if (mesaConPedido) {
                mesaActual = normalizarMesa(mesaConPedido.mesa);

                if (tableSelect) {
                    const optionMatch = Array.from(tableSelect.options).find(
                        (opt) =>
                            opt.textContent.trim().toLowerCase() ===
                            normalizarMesa(mesaActual).toLowerCase(),
                    );
                    if (optionMatch) {
                        tableSelect.value = optionMatch.value;
                    }
                }
            }
        }

        const pedidosFiltrados = pedidosGuardados.filter(
            (pedido) =>
                normalizarMesa(pedido.mesa).toLowerCase() ===
                normalizarMesa(mesaActual).toLowerCase(),
        );

        updateTableSelectStatus();

        if (tableTitle) {
            tableTitle.textContent = mesaActual;
        }

        if (totalTableLabel) {
            const numeroMesa = mesaActual;
            totalTableLabel.textContent = `Total de la Mesa (${numeroMesa})`;
        }

        let sumaTotalMesa = 0;
        pedidosFiltrados.forEach((pedido) => {
            sumaTotalMesa += Number(pedido.total || 0);
        });

        if (totalTableAmount) {
            totalTableAmount.textContent = `$${sumaTotalMesa.toFixed(2)}`;
        }

        if (btnAccount) {
            if (pedidosFiltrados.length === 0) {
                btnAccount.classList.add("opacity-50", "pointer-events-none");
                btnAccount.setAttribute("aria-disabled", "true");
            } else {
                btnAccount.classList.remove(
                    "opacity-50",
                    "pointer-events-none",
                );
                btnAccount.removeAttribute("aria-disabled");
            }
        }

        // Resumen superior
        const summaryCard = document.getElementById("table-summary-card");
        const summaryList = document.getElementById("summary-products-list");
        const summaryTotalItems = document.getElementById(
            "summary-total-items",
        );

        if (summaryCard && summaryList) {
            if (pedidosFiltrados.length === 0) {
                summaryCard.classList.add("hidden");
                summaryList.innerHTML = "";
            } else {
                const acumuladoProductos = {};
                let totalProductosCount = 0;

                pedidosFiltrados.forEach((pedido) => {
                    if (Array.isArray(pedido.productos)) {
                        pedido.productos.forEach((prod) => {
                            const nombre = prod.name;
                            const cantidad = Number(prod.quantity) || 0;

                            if (!acumuladoProductos[nombre]) {
                                acumuladoProductos[nombre] = 0;
                            }
                            acumuladoProductos[nombre] += cantidad;
                            totalProductosCount += cantidad;
                        });
                    }
                });

                let summaryHtml = "";
                for (const [nombreProd, cantidadTotal] of Object.entries(
                    acumuladoProductos,
                )) {
                    summaryHtml += `
                        <li class="flex items-center justify-between py-2.5">
                            <span class="font-medium text-on-surface text-[15px]">${nombreProd}</span>
                            <span class="font-extrabold text-[15px] text-black-600 bg-black-500/10 px-3 py-1 rounded-lg">
                                x${cantidadTotal}
                            </span>
                        </li>
                    `;
                }

                summaryList.innerHTML = summaryHtml;

                if (summaryTotalItems) {
                    summaryTotalItems.textContent = `${totalProductosCount} producto${totalProductosCount === 1 ? "" : "s"}`;
                }

                summaryCard.classList.remove("hidden");
            }
        }

        if (pedidosFiltrados.length === 0) {
            ordersContainer.innerHTML = `<p class="text-center text-on-surface-variant py-8">No hay pedidos registrados para la ${mesaActual}.</p>`;
            return;
        }

        let html = "";

        pedidosFiltrados.forEach((pedido) => {
            let productosHtml = "";
            const readyOrders = Boolean(pedido.listo);

            pedido.productos.forEach((prod, prodIndex) => {
                productosHtml += `
                    <li class="grid grid-cols-3 items-center gap-x-4 gap-y-1 py-1">
                        <div class="flex flex-col">
                            <span class="px-3 font-body-md text-on-surface font-medium">${prod.name}</span>
                            <span class="px-3 text-[15px] text-on-surface-variant">Prep: ${pedido.preparacion}</span>
                        </div>
                        
                        <div class="flex items-center justify-center bg-surface-container-high rounded-lg p-0.5 border border-outline-variant justify-self-center">
                            <button type="button" class="order-btn-minus w-7 h-7 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface rounded transition-colors" data-order-id="${pedido.id}" data-prod-index="${prodIndex}">
                                <span class="material-symbols-outlined text-sm">remove</span>
                            </button>
                            <span class="w-8 text-center text-sm font-bold text-on-surface">${prod.quantity}</span>
                            <button type="button" class="order-btn-plus w-7 h-7 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface rounded transition-colors" data-order-id="${pedido.id}" data-prod-index="${prodIndex}">
                                <span class="material-symbols-outlined text-sm">add</span>
                            </button>
                        </div>

                        <span class="font-body-md text-on-surface-variant text-right">$${(prod.price * prod.quantity).toFixed(2)}</span>
                    </li>
                `;
            });

            const cardBgClass = readyOrders
                ? "bg-green-100/80 border-green-500 shadow-md"
                : "bg-surface-container-lowest border-outline-variant shadow-sm";

            const btnListoClass = readyOrders
                ? "border-red-500 text-red-600 bg-red-50 hover:bg-red-100"
                : "border-green-600 text-green-700 bg-green-50 hover:bg-green-100";

            const btnListoIcon = readyOrders ? "close" : "check";
            const btnListoText = readyOrders ? "Cancelar / Modificar" : "Listo";

            html += `
                <div class="bg-surface-container-lowest rounded-xl p-5 border border-outline-variant shadow-sm transition-transform duration-200 mb-4">
                    <div class="flex flex-col gap-3 mb-4 px-1">
                        <div class="flex items-center justify-between w-full">
                            <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
                                Cliente: <span class="text-on-surface-variant font-normal text-body-md">${pedido.usuario}</span>
                                <span class="text-xs bg-primary/10 text-primary px-2 py-0.5 rounded-full ml-2">${pedido.mesa}</span>
                            </h3>
                            <div class="flex items-center gap-3">
                                <span class="font-price-display text-price-display text-primary">$${pedido.total.toFixed(2)}</span>
                                <button type="button" class="btn-delete-order text-red-500 hover:text-red-700 p-1 rounded-lg hover:bg-red-50 transition-colors" data-id="${pedido.id}" title="Cancelar pedido">
                                    <span class="material-symbols-outlined text-xl">delete</span>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 items-center gap-x-3 w-full">
                            <div class="justify-self-start">
                                <span class="font-label-lg text-secondary uppercase tracking-wider bg-secondary-fixed/30 px-3 py-0.5 rounded">Producto</span>
                            </div>
                            <div class="justify-self-center">
                                <span class="font-label-lg text-secondary uppercase tracking-wider bg-secondary-fixed/30 px-3 py-0.5 rounded">Cantidad</span>
                            </div>
                            <div class="justify-self-end">
                                <span class="text-on-surface-variant text-label-lg whitespace-nowrap">${pedido.tiempo}</span>
                            </div>
                        </div>
                    </div>
                    <ul class="text-[16px] space-y-4 mb-4">
                        ${productosHtml}
                    </ul>
                    <button type="button" class="btn-toggle-ready w-full py-2 mb-2 border rounded-lg font-label-lg flex items-center justify-center gap-2 transition-colors ${btnListoClass}" data-id="${pedido.id}">
                        <span class="material-symbols-outlined text-sm">${btnListoIcon}</span> ${btnListoText}
                    </button>
                    <button type="button" class="btn-add-more w-full py-2 border border-dashed border-outline-variant rounded-lg text-on-surface-variant font-label-lg flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors" data-id="${pedido.id}">
                        <span class="material-symbols-outlined text-sm">add</span> Agregar Producto
                    </button>
                </div>
            `;
        });

        html += `
            <button type="button" class="btn-add-client w-full py-2 mb-6 border border-dashed border-orange-500/50 rounded-lg text-orange-600 font-label-lg flex items-center justify-center gap-2 hover:bg-orange-500/10 hover:border-orange-800 transition-colors" data-mesa="${mesaActual}">
                <i class="fas fa-address-card"></i> Agregar Clientes
            </button>
        `;

        ordersContainer.innerHTML = html;
    }

    if (tableSelect) {
        tableSelect.addEventListener("change", () => {
            const selectedOption =
                tableSelect.options[tableSelect.selectedIndex];
            if (selectedOption) {
                mesaActual = normalizarMesa(selectedOption.textContent);
                renderOrders();
            }
        });
    }

    document.addEventListener("click", (e) => {
        let pedidosGuardados =
            JSON.parse(localStorage.getItem("my_orders")) || [];

        // 1. Eliminar pedido completo
        const deleteBtn = e.target.closest(".btn-delete-order");
        if (deleteBtn) {
            const id = Number(deleteBtn.getAttribute("data-id"));
            mostrarModalEliminar(
                "¿Estás seguro de cancelar y eliminar este pedido?",
                () => {
                    let pedidosG =
                        JSON.parse(localStorage.getItem("my_orders")) || [];
                    pedidosG = pedidosG.filter((p) => p.id !== id);
                    localStorage.setItem("my_orders", JSON.stringify(pedidosG));
                    renderOrders();
                },
            );
            return;
        }

        // 2. Incrementar cantidad
        const plusBtn = e.target.closest(".order-btn-plus");
        if (plusBtn) {
            const orderId = Number(plusBtn.getAttribute("data-order-id"));
            const prodIndex = Number(plusBtn.getAttribute("data-prod-index"));

            const pedido = pedidosGuardados.find((p) => p.id === orderId);
            if (pedido && pedido.listo) return;

            if (pedido && pedido.productos[prodIndex]) {
                pedido.productos[prodIndex].quantity += 1;
                pedido.total = pedido.productos.reduce(
                    (acc, item) => acc + item.price * item.quantity,
                    0,
                );
                localStorage.setItem(
                    "my_orders",
                    JSON.stringify(pedidosGuardados),
                );
                renderOrders();
            }
            return;
        }

        // 3. Decrementar cantidad / eliminar producto
        const minusBtn = e.target.closest(".order-btn-minus");
        if (minusBtn) {
            const orderId = Number(minusBtn.getAttribute("data-order-id"));
            const prodIndex = Number(minusBtn.getAttribute("data-prod-index"));

            const pedido = pedidosGuardados.find((p) => p.id === orderId);
            if (pedido && pedido.listo) return;

            if (pedido && pedido.productos[prodIndex]) {
                // Si la cantidad es 1, pedimos confirmación con modal antes de borrar
                if (pedido.productos[prodIndex].quantity === 1) {
                    mostrarModalEliminar(
                        `¿Deseas eliminar "${pedido.productos[prodIndex].name}" del pedido?`,
                        () => {
                            let pedidosG =
                                JSON.parse(localStorage.getItem("my_orders")) ||
                                [];
                            const pTarget = pedidosG.find(
                                (p) => p.id === orderId,
                            );

                            if (pTarget) {
                                pTarget.productos.splice(prodIndex, 1);
                                if (pTarget.productos.length === 0) {
                                    pedidosG = pedidosG.filter(
                                        (p) => p.id !== orderId,
                                    );
                                } else {
                                    pTarget.total = pTarget.productos.reduce(
                                        (acc, item) =>
                                            acc + item.price * item.quantity,
                                        0,
                                    );
                                }
                                localStorage.setItem(
                                    "my_orders",
                                    JSON.stringify(pedidosG),
                                );
                                renderOrders();
                            }
                        },
                    );
                } else {
                    // Decremento directo sin modal cuando la cantidad es > 1
                    pedido.productos[prodIndex].quantity -= 1;
                    pedido.total = pedido.productos.reduce(
                        (acc, item) => acc + item.price * item.quantity,
                        0,
                    );
                    localStorage.setItem(
                        "my_orders",
                        JSON.stringify(pedidosGuardados),
                    );
                    renderOrders();
                }
            }
            return;
        }

        // 4. Botón agregar más productos al pedido
        const addMoreBtn = e.target.closest(".btn-add-more");
        if (addMoreBtn) {
            const orderId = Number(addMoreBtn.getAttribute("data-id"));
            const pedidoActual = pedidosGuardados.find((p) => p.id === orderId);

            if (pedidoActual) {
                const mesaNombre = normalizarMesa(pedidoActual.mesa);
                window.location.href = `/menu?mesa=${encodeURIComponent(mesaNombre)}&usuario=${encodeURIComponent(pedidoActual.usuario)}&order_id=${pedidoActual.id}`;
            } else {
                window.location.href = "/menu";
            }
            return;
        }

        // 5. Botón de agregar clientes
        const addClientBtn = e.target.closest(".btn-add-client");
        if (addClientBtn) {
            const mesaNombre = normalizarMesa(
                addClientBtn.getAttribute("data-mesa") || mesaActual,
            );
            window.location.href = `/menu?mesa=${encodeURIComponent(mesaNombre)}&nuevo_cliente=true`;
            return;
        }

        // 6. Botón de Listo / Modificar
        const toggleReadyBtn = e.target.closest(".btn-toggle-ready");
        if (toggleReadyBtn) {
            const orderId = Number(toggleReadyBtn.getAttribute("data-id"));
            const pedido = pedidosGuardados.find((p) => p.id === orderId);

            if (pedido) {
                pedido.listo = !pedido.listo;
                localStorage.setItem(
                    "my_orders",
                    JSON.stringify(pedidosGuardados),
                );
                renderOrders();
            }
            return;
        }
    });

    renderOrders();

    document.querySelectorAll(".material-symbols-outlined").forEach((icon) => {
        if (icon.innerText === "skillet") {
            icon.classList.add("animate-pulse");
        }
    });
});
