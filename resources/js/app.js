import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// =============================
// GLOBAL MODAL FUNCTIONS
// =============================

window.openAuthModal = function(type = "login") {

    const modal = document.getElementById("authModal");
    const modalContent = document.getElementById("modalContent");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");

    if (!modal || !modalContent) return;

    modal.classList.remove("hidden");

    modalContent.classList.remove("max-w-md", "max-w-3xl");

    if (type === "login") {

        modalContent.classList.add("max-w-md");

        loginForm?.classList.remove("hidden");
        registerForm?.classList.add("hidden");

    } else {

        modalContent.classList.add("max-w-3xl");

        registerForm?.classList.remove("hidden");
        loginForm?.classList.add("hidden");
    }

    setTimeout(() => {
        modalContent.classList.remove("scale-95", "opacity-0");
        modalContent.classList.add("scale-100", "opacity-100");
    }, 10);
};

window.closeAuthModal = function() {

    const modal = document.getElementById("authModal");
    const modalContent = document.getElementById("modalContent");

    if (!modal || !modalContent) return;

    modalContent.classList.remove("scale-100", "opacity-100");
    modalContent.classList.add("scale-95", "opacity-0");

    setTimeout(() => {
        modal.classList.add("hidden");
    }, 200);
};

// =============================
// DOM READY EVENTS
// =============================

document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("authModal");
    const closeBtn = document.getElementById("closeAuthModal");

    closeBtn?.addEventListener("click", window.closeAuthModal);

    modal?.addEventListener("click", (e) => {
        if (e.target === modal) {
            window.closeAuthModal();
        }
    });

    const openType = document.body.dataset.openModal;

    if (openType === "login") {
        window.openAuthModal("login");
    }

    if (openType === "register") {
        window.openAuthModal("register");
    }

});