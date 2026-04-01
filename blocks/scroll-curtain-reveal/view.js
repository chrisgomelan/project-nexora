/**
 * Scroll Reveal Handler
 */

document.addEventListener('DOMContentLoaded', () => {
    const reveals = document.querySelectorAll('.nexora-reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-animated');
                // Unobserve to keep it visible after animation
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15 // Trigger when bottom of section is 15% visible
    });

    reveals.forEach(reveal => {
        revealObserver.observe(reveal);
    });
});
