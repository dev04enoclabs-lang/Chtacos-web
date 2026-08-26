document.addEventListener("DOMContentLoaded", function () {
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("password_confirmation");
    const errorMessage = document.getElementById("password-match-error");

    function validatePassword() {
        if (!password || !confirmPassword || !errorMessage) return;

        const passValue = password.value;
        const confirmValue = confirmPassword.value;

        if (confirmValue === "") {
            resetStyles(password);
            resetStyles(confirmPassword);
            errorMessage.classList.add("hidden");
            return;
        }

        if (passValue === confirmValue) {
            setValidStyles(password);
            setValidStyles(confirmPassword);
            errorMessage.classList.add("hidden");
        } else {
            setInvalidStyles(password);
            setInvalidStyles(confirmPassword);
            errorMessage.classList.remove("hidden");
        }
    }

    function setValidStyles(element) {
        element.classList.remove("border-outline-variant", "border-red-500");
        element.classList.add(
            "border-emerald-500",
            "ring-1",
            "ring-emerald-500",
        );
    }

    function setInvalidStyles(element) {
        element.classList.remove(
            "border-outline-variant",
            "border-emerald-500",
            "ring-1",
            "ring-emerald-500",
        );
        element.classList.add("border-red-500");
    }

    function resetStyles(element) {
        element.classList.remove(
            "border-red-500",
            "border-emerald-500",
            "ring-1",
            "ring-emerald-500",
        );
        element.classList.add("border-outline-variant");
    }

    if (password && confirmPassword) {
        password.addEventListener("input", validatePassword);
        confirmPassword.addEventListener("input", validatePassword);
    }

    function setupPasswordToggle(buttonId, inputId, iconId) {
        const button = document.getElementById(buttonId);
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (button && input && icon) {
            button.addEventListener("click", function (e) {
                e.preventDefault(); // Evita que el botón dispare el submit del formulario por accidente

                const isPassword = input.getAttribute("type") === "password";
                const newType = isPassword ? "text" : "password";

                // Cambiar tipo de input
                input.setAttribute("type", newType);

                // Actualizar clases de FontAwesome con precisión
                if (isPassword) {
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        }
    }

    setupPasswordToggle("togglePassword", "password", "toggleIcon");
    setupPasswordToggle(
        "togglePasswordConfirm",
        "password_confirmation",
        "toggleIconConfirm",
    );
});
