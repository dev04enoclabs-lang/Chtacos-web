document.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("ready");

    document.querySelectorAll(".material-symbols-outlined").forEach((icon) => {
        if (icon.innerText === "skillet") {
            icon.classList.add("animate-pulse");
        }
    });

    console.log("Sabor y Brasa Orders Screen Loaded");
});
