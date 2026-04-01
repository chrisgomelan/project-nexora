/**
 * Scroll To Top JS logic
 */
document.addEventListener('DOMContentLoaded', () => {
    const scrollContainers = document.querySelectorAll('.nexora-scroll-to-top');
    
    if (!scrollContainers.length) return;

    scrollContainers.forEach(container => {
        const btn = container.querySelector('.nexora-scroll-to-top__button');
        const showOn = parseInt(container.getAttribute('data-show-on') || '300', 10);

        // Toggle visibility on scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > showOn) {
                container.classList.add('is-visible');
            } else {
                container.classList.remove('is-visible');
            }
        });

        // Scroll to top on click
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
});
