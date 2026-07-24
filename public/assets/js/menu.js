document.addEventListener("DOMContentLoaded", () => {
    // ==========================================
    // 1. SECCIÓN: FILTRADO DE CATEGORÍAS (PRODUCTOS)
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
    // 2. SECCIÓN: CARRITO / MODAL DE PRODUCTOS Y SELECTORES
    // ==========================================
    const cartContainer = document.getElementById("cart-modal-container");
    const totalPriceEl = document.getElementById("cart-total-price");

    const selectMesa = document.getElementById("select-mesa");
    const selectUsuario = document.getElementById("select-usuario");
    const selectPreparacion = document.getElementById("select-preparacion");

    const metaSummary = document.getElementById("order-meta-summary");
    const summaryMesa = document.getElementById("summary-mesa");
    const summaryUsuario = document.getElementById("summary-usuario");
    const summaryPrep = document.getElementById("summary-prep");

    let cart = [];

    function updateMetaSummary() {
        const mesaVal = selectMesa ? selectMesa.value : '';
        const usuarioVal = selectUsuario ? selectUsuario.value : '';
        const prepVal = selectPreparacion ? selectPreparacion.value : '';

        if (metaSummary) {
            if (mesaVal || usuarioVal || prepVal) {
                metaSummary.classList.remove("hidden");
                if (summaryMesa) summaryMesa.textContent = mesaVal || "No seleccionada";
                if (summaryUsuario) summaryUsuario.textContent = usuarioVal || "No seleccionado";
                if (summaryPrep) summaryPrep.textContent = prepVal || "No seleccionada";
            } else {
                metaSummary.classList.add("hidden");
            }
        }
    }

    if (selectMesa) selectMesa.addEventListener("change", updateMetaSummary);
    if (selectUsuario) selectUsuario.addEventListener("change", updateMetaSummary);
    if (selectPreparacion) selectPreparacion.addEventListener("change", updateMetaSummary);

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

        // ==========================================
        // 3. CONFIRMAR PEDIDO (CON LÓGICA OFFLINE)
        // ==========================================
        const confirmBtn = e.target.closest("#btn-confirm-order");
        if (confirmBtn) {
            if (!selectMesa.value) {
                alert("Por favor selecciona una Mesa.");
                selectMesa.focus();
                return;
            }
            if (!selectUsuario.value) {
                alert("Por favor selecciona un Usuario.");
                selectUsuario.focus();
                return;
            }
            if (!selectPreparacion.value) {
                alert("Por favor selecciona la Preparación.");
                selectPreparacion.focus();
                return;
            }
            if (cart.length === 0) {
                alert("Tu orden está vacía. Agrega al menos un producto.");
                return;
            }

            const newOrder = {
                id: Date.now(),
                mesa: selectMesa.value,
                usuario: selectUsuario.value,
                preparacion: selectPreparacion.value,
                productos: [...cart],
                total: cart.reduce(
                    (acc, item) => acc + item.price * item.quantity,
                    0,
                ),
                tiempo: "Hace un momento",
            };

            // CASO 1: SIN CONEXIÓN A INTERNET
            if (!navigator.onLine) {
                // Guarda en la cola para sincronizar con la Base de Datos MySQL cuando regrese el internet
                if (window.OfflineManager) {
                    window.OfflineManager.saveOrder(newOrder);
                }

                // También lo guarda localmente en "my_orders" por si tu vista lo usa
                let ordersAdd = JSON.parse(localStorage.getItem("my_orders")) || [];
                ordersAdd.unshift(newOrder);
                localStorage.setItem("my_orders", JSON.stringify(ordersAdd));

                alert("⚠️ Sin conexión. El pedido ha sido guardado localmente y se enviará automáticamente al recuperar internet.");

                // Limpiamos el carrito en pantalla y NO redirigimos para evitar el error del dinosaurio
                cart = [];
                updateCartUI();
                return;
            }

            // CASO 2: CON CONEXIÓN A INTERNET (Proceso normal)
            if (window.OfflineManager) {
                window.OfflineManager.saveOrder(newOrder);
                window.OfflineManager.syncOrders(); // Sincroniza directamente con el controlador
            }

            let ordersAdd = JSON.parse(localStorage.getItem("my_orders")) || [];
            ordersAdd.unshift(newOrder);
            localStorage.setItem("my_orders", JSON.stringify(ordersAdd));

            cart = [];
            updateCartUI();

            // Solo redirige si hay internet
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