    document.addEventListener('DOMContentLoaded', () => {
        const btnMenu = document.getElementById('btn-options-menu');
        const dropdown = document.getElementById('options-dropdown');

        if (btnMenu && dropdown) {
            // Abrir / Cerrar al hacer clic en el botón de 3 puntos
            btnMenu.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
            });

            // Cerrar menú si se hace clic fuera de él
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && !btnMenu.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        }
    });