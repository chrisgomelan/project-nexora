<?php
/**
 * Hero Section Block — Server-side render
 */

$heading = $attributes['heading'] ?? 'Your Growth, Powered by Strategy & Technology.';
$paragraph = $attributes['paragraph'] ?? 'We use data-driven strategies and innovative technology to accelerate your brand\'s growth with measurable results.';
$button_text = $attributes['buttonText'] ?? 'Start Your Journey';
$button_url = $attributes['buttonUrl'] ?? '#';
$image_url = $attributes['imageUrl'] ?? '/wp-content/uploads/2026/03/hero.webp';
$image_alt = $attributes['imageAlt'] ?? 'Business team in a modern office';
$bg_color = $attributes['backgroundColor'] ?? '#8B9CB8';
$show_button = $attributes['showButton'] ?? true;

$container_classes = array(
    'nexora-hero',
    'wp-block-nexora-hero-section',
    'alignfull',
);
?>

<section class="<?php echo esc_attr(implode(' ', $container_classes)); ?>"
    style="--nexora-hero-bg: <?php echo esc_attr($bg_color); ?>">

    <div class="nexora-hero__columns">

        <!-- Left: Text content -->
        <div class="nexora-hero__text">

            <h1 class="nexora-hero__heading wp-block-heading">
                <?php echo wp_kses_post($heading); ?>
            </h1>

            <p class="nexora-hero__paragraph wp-block-paragraph">
                <?php echo wp_kses_post($paragraph); ?>
            </p>

            <?php if ($show_button): ?>
                <div class="wp-block-buttons">
                    <div class="wp-block-button is-style-nexora-primary">
                        <a href="<?php echo esc_url($button_url); ?>" class="wp-block-button__link wp-element-button"
                            title="<?php echo esc_attr($button_text); ?>">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <!-- Right: Image -->
        <div class="nexora-hero__image">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                title="<?php echo esc_attr($image_alt); ?>" loading="eager" decoding="async" />
        </div>

    </div>

</section>