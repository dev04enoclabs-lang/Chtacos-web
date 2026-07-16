document.addEventListener("DOMContentLoaded", () => {
    // ==========================================
    // 1. SECCIÓN: FILTRADO DE CATEGORÍAS (PRODUCTOS)
    // ==========================================
    const buttons = document.querySelectorAll("#category-filters button");
    const products = document.querySelectorAll(".product-card");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const selectedCategory = button.getAttribute("data-category");

            buttons.forEach((btn) => {
                btn.classList.remove(
                    "active-tab",
                    "bg-primary",
                    "text-on-primary",
                    "shadow-md"
                );
                btn.classList.add(
                    "border",
                    "border-outline",
                    "text-on-surface-variant",
                    "hover:bg-surface-container-high"
                );
            });

            button.classList.add(
                "active-tab",
                "bg-primary",
                "text-on-primary",
                "shadow-md"
            );
            button.classList.remove(
                "border",
                "border-outline",
                "text-on-surface-variant",
                "hover:bg-surface-container-high"
            );

            products.forEach((product) => {
                const productCategory = product.getAttribute("data-category");

                if (
                    selectedCategory === "todos" ||
                    productCategory === selectedCategory
                ) {
                    product.style.display = "block";
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
        });
    });

    // ==========================================
    // 2. SECCIÓN: BUSCADOR DE USUARIOS / PERFILES
    // ==========================================
    const registeredUser = [
        { id: 1, name: "Jesús Alberto Cruz" },
        { id: 2, name: "María Fernanda Gómez" },
        { id: 3, name: "Juan Carlos Pérez" },
    ];

    const defaultOptions = ['Adulto', 'Adulta', 'Niño', 'Niña'];

    const searchInput = document.getElementById('user-search-input');
    const dropdownList = document.getElementById('user-dropdown-list');
    const hiddenIdInput = document.getElementById('selected-user-id');
    const hiddenIdentifierInput = document.getElementById('selected-user-identifier');
    const hiddencreateNewInput = document.getElementById('create-new-user');

    if (searchInput && dropdownList) {
        
        function filterUsers(query) {
            dropdownList.innerHTML = ''; 
            const cleanQuery = query.trim().toLowerCase(); 

            if (cleanQuery === '') {
                const headerDefault = document.createElement('li');
                headerDefault.className = 'px-4 py-1 text-xs font-bold text-on-surface-variant bg-surface-container-high select-none';
                headerDefault.textContent = 'PERFILES RÁPIDOS';
                dropdownList.appendChild(headerDefault);

                defaultOptions.forEach(option => {
                    const li = document.createElement('li');
                    li.className = 'px-4 py-2 hover:bg-primary hover:text-on-primary cursor-pointer transition-colors';
                    li.textContent = option;
                    li.addEventListener('click', () => {
                        selectUser('', option, '0');
                    });
                    dropdownList.appendChild(li);
                });

                const headerUsers = document.createElement('li');
                headerUsers.className = 'px-4 py-1 text-xs font-bold text-on-surface-variant bg-surface-container-high select-none border-t border-outline';
                headerUsers.textContent = 'USUARIOS REGISTRADOS';
                dropdownList.appendChild(headerUsers);

                registeredUser.forEach(user => {
                    const li = document.createElement('li');
                    li.className = 'px-4 py-2 hover:bg-primary hover:text-on-primary cursor-pointer transition-colors';
                    li.textContent = user.name;
                    li.addEventListener('click', () => {
                        selectUser(user.id, user.name, '0');
                    });
                    dropdownList.appendChild(li);
                });

                dropdownList.classList.remove('hidden');
                return;
            }

            const filtered = registeredUser.filter(user => 
                user.name.toLowerCase().includes(cleanQuery)
            );

            if (filtered.length > 0) {
                filtered.forEach(user => {
                    const li = document.createElement('li');
                    li.className = 'px-4 py-2 hover:bg-primary hover:text-on-primary cursor-pointer transition-colors';
                    li.textContent = user.name;
                    li.addEventListener('click', () => {
                        selectUser(user.id, user.name, '0');
                    });
                    dropdownList.appendChild(li);
                });
                dropdownList.classList.remove('hidden');
            } else {
                const li = document.createElement('li');
                li.className = 'px-4 py-3 text-primary hover:bg-surface-container-high cursor-pointer border-t border-outline flex flex-col';
                li.innerHTML = `
                    <span class="text-xs text-on-surface-variant">No encontrado en registros</span>
                    <span class="font-bold">Registrar y usar: "${query}"</span>
                `;
                
                li.addEventListener('click', () => {
                    selectUser('', query, '1'); 
                });
                dropdownList.appendChild(li);
                dropdownList.classList.remove('hidden');
            }
        }

        function selectUser(id, name, createNew = '0') {
            searchInput.value = name;
            hiddenIdInput.value = id;
            hiddenIdentifierInput.value = name;
            if (hiddencreateNewInput) {
                hiddencreateNewInput.value = createNew;
            }
            dropdownList.classList.add('hidden');
        }

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value;
            if (query.trim() === '') {
                hiddenIdInput.value = '';
                hiddenIdentifierInput.value = '';
                if (hiddencreateNewInput) hiddencreateNewInput.value = '0';
            } else {
                hiddenIdentifierInput.value = query;
            }
            filterUsers(query);
        });

        searchInput.addEventListener('focus', () => {
            filterUsers(searchInput.value);
        });

        document.addEventListener('click', (e) => {
            const container = document.getElementById('user-search-container');
            if (container && !container.contains(e.target)) {
                dropdownList.classList.add('hidden');
            }
        });
    }
});