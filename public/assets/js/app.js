// Control de session al cerrar
window.addEventListener("pageshow", function (event) {
    const isBackForwardNavigation = event.persisted || 
        (typeof window.performance !== "undefined" && 
         window.performance.getEntriesByType("navigation")[0]?.type === "back_forward");

    if (isBackForwardNavigation) {
        window.location.reload();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const btnMenu = document.getElementById("btn-options-menu");
    const dropdown = document.getElementById("options-dropdown");

    if (btnMenu && dropdown) {
        btnMenu.addEventListener("click", (e) => {
            e.stopPropagation();
            dropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target) && !btnMenu.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    }
});

