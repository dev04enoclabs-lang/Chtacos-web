document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("tailwind-ready");

    document.querySelectorAll("button").forEach((button) => {
        button.addEventListener("mousedown", () => {
            button.classList.add("scale-95");
        });
        button.addEventListener("mouseup", () => {
            button.classList.remove("scale-95");
        });
        button.addEventListener("mouseleave", () => {
            button.classList.remove("scale-95");
        });
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
});
