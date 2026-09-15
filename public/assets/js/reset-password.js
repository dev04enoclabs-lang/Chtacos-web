function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const passInput = document.getElementById("password");
    const confirmInput = document.getElementById("password_confirmation");
    const matchMsg = document.getElementById("password-match-msg");

    function validatePasswords() {
        const passVal = passInput.value;
        const confirmVal = confirmInput.value;

        if (!passVal && !confirmVal) {
            resetStyles();
            return;
        }

        if (confirmVal.length > 0) {
            matchMsg.classList.remove("hidden");

            if (passVal === confirmVal) {
                setMatchState(
                    true, 
                    "border-green-500", 
                    "focus:border-green-500", 
                    "text-green-600", 
                    "✓ Las contraseñas coinciden"
                );
            } else {
                setMatchState(
                    false, 
                    "border-red-500", 
                    "focus:border-red-500", 
                    "text-red-600", 
                    "✕ Las contraseñas no coinciden"
                );
            }
        }
    }

    function setMatchState(isMatch, borderColor, focusColor, textColor, messageText) {
        const badBorder = isMatch ? "border-red-500" : "border-green-500";
        const badFocus = isMatch ? "focus:border-red-500" : "focus:border-green-500";

        [passInput, confirmInput].forEach(input => {
            input.classList.remove(badBorder, badFocus, "border-outline-variant");
            input.classList.add(borderColor, focusColor);
        });

        matchMsg.className = `text-xs mt-1 font-medium ${textColor}`;
        matchMsg.textContent = messageText;
    }

    function resetStyles() {
        [passInput, confirmInput].forEach(input => {
            input.classList.remove("border-green-500", "focus:border-green-500", "border-red-500", "focus:border-red-500");
            input.classList.add("border-outline-variant");
        });
        matchMsg.classList.add("hidden");
    }

    passInput.addEventListener("input", validatePasswords);
    confirmInput.addEventListener("input", validatePasswords);
});