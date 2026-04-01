<?php
/**
 * Render for Scroll Curtain Reveal Block
 */

$column_count = $attributes['columnCount'] ?? 3;
$bg_color = $attributes['bgColor'] ?? '#FFFFFF';
$classes = 'nexora-reveal nexora-reveal--col-' . $column_count;
?>
<section class="<?php echo esc_attr($classes); ?>" style="background-color: <?php echo esc_attr($bg_color); ?>;">
    <div class="nexora-reveal__inner">
        <?php echo $content; ?>
    </div>
</section>