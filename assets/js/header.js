/**
 * Nexora Header JS
 * Adds 'is-scrolled' class for shadow effect on scroll
 */
document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.nexora-header');
    if (!header) return;

    const onScroll = function () {
        if (window.scrollY > 10) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // Run on load

    // ── Burger Menu Toggle (Manual Handler) ────────────────
    const openBtn = document.querySelector('.wp-block-navigation__responsive-container-open');
    const closeBtn = document.querySelector('.wp-block-navigation__responsive-container-close');
    const navOverlay = document.querySelector('.wp-block-navigation__responsive-container');
    const body = document.body;

    if (openBtn && navOverlay) {
        openBtn.addEventListener('click', function (e) {
            e.preventDefault();
            navOverlay.classList.add('is-menu-open');
            body.classList.add('has-modal-open');
        });
    }

    if (closeBtn && navOverlay) {
        closeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            navOverlay.classList.remove('is-menu-open');
            body.classList.remove('has-modal-open');
        });
    }
});
