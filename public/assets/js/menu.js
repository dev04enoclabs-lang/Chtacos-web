document.addEventListener("DOMContentLoaded", () => {
    // ==========================================
    // 0. CAPTURAR PARÁMETROS DE URL Y ORDEN ACTIVA
    // ==========================================
    const urlParams = new URLSearchParams(window.location.search);
    const mesaUrl = urlParams.get("mesa");
    const usuarioUrl = urlParams.get("usuario");
    const orderIdUrl = urlParams.get("order_id");

    const selectMesa = document.getElementById("select-mesa");
    const selectUsuario = document.getElementById("select-usuario");
    const selectPreparacion = document.getElementById("select-preparacion");

    // Elementos del Modal
    const customModal = document.getElementById("custom-modal");
    const modalMessage = document.getElementById("modal-message");
    const modalCloseBtn = document.getElementById("modal-close-btn");

    /**
     * Muestra el modal personalizado con un mensaje específico 🌮
     */
    function mostrarModal(mensaje) {
        if (customModal && modalMessage) {
            modalMessage.textContent = mensaje;
            customModal.classList.remove("hidden");
        }
    }

    /**
     * Oculta el modal personalizado 🙈
     */
    function ocultarModal() {
        if (customModal) {
            customModal.classList.add("hidden");
        }
    }

    if (modalCloseBtn) {
        modalCloseBtn.addEventListener("click", ocultarModal);
    }

    if (mesaUrl && selectMesa) {
        selectMesa.value = mesaUrl;
        if (!selectMesa.value) {
            for (let option of selectMesa.options) {
                if (
                    option.value === mesaUrl ||
                    option.value.includes(mesaUrl) ||
                    option.text.includes(mesaUrl)
                ) {
                    selectMesa.value = option.value;
                    break;
                }
            }
        }
        selectMesa.dispatchEvent(new Event("change"));
    }

    if (usuarioUrl && selectUsuario) {
        selectUsuario.value = usuarioUrl;
        if (!selectUsuario.value) {
            for (let option of selectUsuario.options) {
                if (
                    option.value === usuarioUrl ||
                    option.text.includes(usuarioUrl)
                ) {
                    selectUsuario.value = option.value;
                    break;
                }
            }
        }
        selectUsuario.dispatchEvent(new Event("change"));
    }

    let cart = [];

    if (orderIdUrl) {
        localStorage.setItem("active_order_id", orderIdUrl);

        if (selectMesa) selectMesa.disabled = true;
        if (selectUsuario) selectUsuario.disabled = true;

        const pedidosGuardados =
            JSON.parse(localStorage.getItem("my_orders")) || [];
        const ordenExistente = pedidosGuardados.find(
            (p) => String(p.id) === String(orderIdUrl),
        );

        if (ordenExistente) {
            if (ordenExistente.productos) {
                cart = [...ordenExistente.productos];
            }
            if (ordenExistente.preparacion && selectPreparacion) {
                selectPreparacion.value = ordenExistente.preparacion;
                selectPreparacion.dispatchEvent(new Event("change"));
            }
        }
    } else {
        localStorage.removeItem("active_order_id");
        if (selectMesa) selectMesa.disabled = false;
        if (selectUsuario) selectUsuario.disabled = false;
    }

    // ==========================================
    // 1. SECCIÓN: FILTRADO DE CATEGORÍAS
    // ==========================================
    const buttons = document.querySelectorAll("#category-filters button");
    const products = document.querySelectorAll(".product-card");
    const noProducto = document.getElementById("noProductId");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const selectedCategory = button.getAttribute("data-category");

            buttons.forEach((btn) => {
                btn.classList.remove(
                    "active-tab",
                    "bg-primary",
                    "text-on-primary",
                    "shadow-md",
                );
                btn.classList.add(
                    "border",
                    "border-outline",
                    "text-on-surface-variant",
                    "hover:bg-surface-container-high",
                );
            });

            button.classList.add(
                "active-tab",
                "bg-primary",
                "text-on-primary",
                "shadow-md",
            );
            button.classList.remove(
                "border",
                "border-outline",
                "text-on-surface-variant",
                "hover:bg-surface-container-high",
            );

            let visibleCount = 0;

            products.forEach((product) => {
                const productCategory = product.getAttribute("data-category");

                if (
                    selectedCategory === "todos" ||
                    productCategory === selectedCategory
                ) {
                    product.style.display = "block";
                    visibleCount++;
                    setTimeout(() => {
                        product.style.opacity = "1";
                        product.style.transform = "scale(1)";
                    }, 10);
                } else {
                    product.style.opacity = "0";
                    product.style.transform = "scale(0.95)";
                    setTimeout(() => {
                        product.style.display = "none";
                    }, 170);
                }
            });

            if (noProducto) {
                if (visibleCount === 0) {
                    noProducto.classList.remove("hidden");
                } else {
                    noProducto.classList.add("hidden");
                }
            }
        });
    });

    // ==========================================
    // 2. SECCIÓN: CARRITO Y EVENTOS
    // ==========================================
    const cartContainer = document.getElementById("cart-modal-container");
    const totalPriceEl = document.getElementById("cart-total-price");

    const metaSummary = document.getElementById("order-meta-summary");
    const summaryMesa = document.getElementById("summary-mesa");
    const summaryUsuario = document.getElementById("summary-usuario");
    const summaryPrep = document.getElementById("summary-prep");

    function updateMetaSummary() {
        const mesaVal = selectMesa
            ? selectMesa.options[selectMesa.selectedIndex]?.text ||
              selectMesa.value
            : "";
        const usuarioVal = selectUsuario ? selectUsuario.value : "";
        const prepVal = selectPreparacion ? selectPreparacion.value : "";

        if (metaSummary) {
            if (mesaVal || usuarioVal || prepVal) {
                metaSummary.classList.remove("hidden");
                if (summaryMesa)
                    summaryMesa.textContent = mesaVal || "No seleccionada";
                if (summaryUsuario)
                    summaryUsuario.textContent =
                        usuarioVal || "No seleccionado";
                if (summaryPrep)
                    summaryPrep.textContent = prepVal || "No seleccionada";
            } else {
                metaSummary.classList.add("hidden");
            }
        }
    }

    if (selectMesa) selectMesa.addEventListener("change", updateMetaSummary);
    if (selectUsuario)
        selectUsuario.addEventListener("change", updateMetaSummary);
    if (selectPreparacion)
        selectPreparacion.addEventListener("change", updateMetaSummary);

    updateCartUI();
    updateMetaSummary();

    document.addEventListener("click", (e) => {
        // AGREGAR AL CARRITO
        const addBtn = e.target.closest('[data-action="add-to-cart"]');
        if (addBtn) {
            const id = addBtn.getAttribute("data-id");
            const productCard =
                addBtn.closest(".product-card") || addBtn.parentElement;

            const nameEl =
                productCard.querySelector(".product-name") ||
                productCard.querySelector("h4") ||
                productCard.querySelector("p");
            const priceEl =
                productCard.querySelector(".product-price") ||
                productCard.querySelector("span");

            const name =
                addBtn.getAttribute("data-name") ||
                (nameEl ? nameEl.innerText.trim() : "Producto");
            let rawPrice =
                addBtn.getAttribute("data-price") ||
                (priceEl ? priceEl.innerText.replace("$", "").trim() : "0");
            const price = parseFloat(rawPrice) || 0;

            const existingItem = cart.find((item) => item.id === id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }

            updateCartUI();
        }

        // BOTÓN MÁS (+)
        const plusBtn = e.target.closest(".cart-btn-plus");
        if (plusBtn) {
            const id = plusBtn.getAttribute("data-id");
            const item = cart.find((i) => i.id === id);
            if (item) {
                item.quantity += 1;
                updateCartUI();
            }
        }

        // BOTÓN MENOS (-)
        const minusBtn = e.target.closest(".cart-btn-minus");
        if (minusBtn) {
            const id = minusBtn.getAttribute("data-id");
            const item = cart.find((i) => i.id === id);
            if (item) {
                item.quantity -= 1;
                if (item.quantity <= 0) {
                    cart = cart.filter((i) => i.id !== id);
                }
                updateCartUI();
            }
        }

        // Confirmar su pedido y captura de requesitos paar guardar la orden
        const confirmBtn = e.target.closest("#btn-confirm-order");
        if (confirmBtn) {
            const mesaValue = selectMesa ? selectMesa.value : "";
            const usuarioValue = selectUsuario ? selectUsuario.value : "";
            const prepValue = selectPreparacion ? selectPreparacion.value : "";

            if (!mesaValue) {
                mostrarModal("Por favor selecciona una Mesa.");
                return;
            }
            if (!usuarioValue) {
                mostrarModal("Por favor selecciona un Usuario.");
                return;
            }
            if (!prepValue) {
                mostrarModal("Por favor selecciona la Preparación.");
                return;
            }
            if (cart.length === 0) {
                mostrarModal(
                    "Tu orden está vacía. Agrega al menos un producto.",
                );
                return;
            }

            const activeOrderId = localStorage.getItem("active_order_id");
            let ordersAdd = JSON.parse(localStorage.getItem("my_orders")) || [];

            if (activeOrderId) {
                const index = ordersAdd.findIndex(
                    (p) => String(p.id) === String(activeOrderId),
                );
                if (index !== -1) {
                    ordersAdd[index].mesa = `Mesa ${mesaValue}`.replace(
                        "Mesa Mesa ",
                        "Mesa ",
                    );
                    ordersAdd[index].usuario = usuarioValue;
                    ordersAdd[index].preparacion = prepValue;
                    ordersAdd[index].productos = [...cart];
                    ordersAdd[index].total = cart.reduce(
                        (acc, item) => acc + item.price * item.quantity,
                        0,
                    );
                }
            } else {
                const newOrder = {
                    id: Date.now(),
                    mesa: `Mesa ${mesaValue}`.replace("Mesa Mesa ", "Mesa "),
                    usuario: usuarioValue,
                    preparacion: prepValue,
                    productos: [...cart],
                    total: cart.reduce(
                        (acc, item) => acc + item.price * item.quantity,
                        0,
                    ),
                    tiempo: "Hace un momento",
                };
                ordersAdd.unshift(newOrder);
            }

            localStorage.setItem("my_orders", JSON.stringify(ordersAdd));
            localStorage.removeItem("active_order_id");

            cart = [];
            updateCartUI();

            window.location.href = "/orders";
        }
    });

    function updateCartUI() {
        renderCartModal();
        updateAllButtonBadges();
        updateTotalPrice();
    }

    function renderCartModal() {
        if (!cartContainer) return;

        if (cart.length === 0) {
            cartContainer.innerHTML = `<p class="text-center text-xs text-on-surface-variant py-4">No hay productos en la orden</p>`;
            return;
        }

        let html = "";
        cart.forEach((item) => {
            html += `
                <div class="flex justify-between items-center group py-2 border-b border-outline-variant/30">
                    <div>
                        <p class="font-label-lg text-label-lg text-on-surface">${item.name}</p>
                        <p class="text-xs text-on-surface-variant">$${item.price.toFixed(2)}</p>
                    </div>
                    <div class="flex items-center gap-xs bg-surface-container-highest rounded-full px-2 py-1">
                        <button type="button" class="cart-btn-minus w-6 h-6 rounded-full hover:bg-outline-variant flex items-center justify-center text-on-surface-variant transition-colors" data-id="${item.id}">-</button>
                        <span class="font-label-lg px-1">${item.quantity}</span>
                        <button type="button" class="cart-btn-plus w-6 h-6 rounded-full hover:bg-outline-variant flex items-center justify-center text-on-surface-variant transition-colors" data-id="${item.id}">+</button>
                    </div>
                </div>
            `;
        });

        cartContainer.innerHTML = html;
    }

    function updateTotalPrice() {
        if (!totalPriceEl) return;
        const total = cart.reduce(
            (acc, item) => acc + item.price * item.quantity,
            0,
        );
        totalPriceEl.textContent = `$${total.toFixed(2)}`;
    }

    function updateAllButtonBadges() {
        const addButtons = document.querySelectorAll(
            '[data-action="add-to-cart"]',
        );

        addButtons.forEach((button) => {
            const productId = button.getAttribute("data-id");
            const badge = button.querySelector(".product-qty-badge");

            if (!badge) return;

            const cartItem = cart.find((item) => item.id === productId);

            if (cartItem && cartItem.quantity > 0) {
                badge.textContent = cartItem.quantity;
                badge.classList.remove("hidden");
            } else {
                badge.textContent = "0";
                badge.classList.add("hidden");
            }
        });
    }
});
