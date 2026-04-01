<?php
/**
 * Scroll To Top Block — Server-side render
 */

$show_on_scroll = $attributes['showOnScroll'] ?? 300;
?>
<div class="nexora-scroll-to-top wp-block-nexora-scroll-to-top" data-show-on="<?php echo esc_attr($show_on_scroll); ?>">
    <button class="nexora-scroll-to-top__button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>
</div>