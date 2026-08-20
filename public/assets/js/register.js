document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");

    if (togglePassword && passwordInput && toggleIcon) {
        togglePassword.addEventListener("click", function () {
            const isPassword =
                passwordInput.getAttribute("type") === "password";

            // Cambia el tipo de input
            passwordInput.setAttribute(
                "type",
                isPassword ? "text" : "password",
            );

            // Cambia el icono del ojo
            toggleIcon.classList.toggle("fa-eye", !isPassword);
            toggleIcon.classList.toggle("fa-eye-slash", isPassword);
        });
    }
});
