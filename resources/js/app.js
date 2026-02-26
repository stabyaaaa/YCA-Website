import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("authModal");
    const modalContent = document.getElementById("modalContent");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");

    const loginBtn = document.getElementById("loginBtn");
    const registerBtn = document.getElementById("registerBtn");
    const closeBtn = document.getElementById("closeAuthModal");

    if (!modal || !modalContent) return;

    function resetWidth() {
        modalContent.classList.remove("max-w-md", "max-w-3xl");
    }

    function openModal(type) {

        modal.classList.remove("hidden");

        resetWidth();

        if (type === "login") {

            // Small width for login
            modalContent.classList.add("max-w-md");

            loginForm?.classList.remove("hidden");
            registerForm?.classList.add("hidden");

        } else {

            // Bigger width for register
            modalContent.classList.add("max-w-3xl");

            registerForm?.classList.remove("hidden");
            loginForm?.classList.add("hidden");
        }

        // Animate in
        setTimeout(() => {
            modalContent.classList.remove("scale-95", "opacity-0");
            modalContent.classList.add("scale-100", "opacity-100");
        }, 10);
    }

    function closeModal() {
        modalContent.classList.remove("scale-100", "opacity-100");
        modalContent.classList.add("scale-95", "opacity-0");

        setTimeout(() => {
            modal.classList.add("hidden");
        }, 200);
    }

    // Manual buttons
    loginBtn?.addEventListener("click", () => openModal("login"));
    registerBtn?.addEventListener("click", () => openModal("register"));
    closeBtn?.addEventListener("click", closeModal);

    // Close when clicking outside
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    /*
    ============================
    🔥 AUTO OPEN BASED ON ERROR
    ============================
    We read body data attributes set by Blade
    */

    const openType = document.body.dataset.openModal;

    if (openType === "login") {
        openModal("login");
    }

    if (openType === "register") {
        openModal("register");
    }

});
