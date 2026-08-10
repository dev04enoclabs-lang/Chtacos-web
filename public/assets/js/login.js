document.addEventListener("DOMContentLoaded", () => {
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");

    if (togglePassword && passwordInput && toggleIcon) {
        togglePassword.addEventListener("click", () => {
            const isPassword =
                passwordInput.getAttribute("type") === "password";
            passwordInput.setAttribute(
                "type",
                isPassword ? "text" : "password",
            );

            toggleIcon.classList.toggle("fa-eye", !isPassword);
            toggleIcon.classList.toggle("fa-eye-slash", isPassword);
        });
    }
});
