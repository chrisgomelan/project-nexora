<?php
/**
 * Content Split Section Block — Server-side render
 *
 * @var array  $attributes Block attributes.
 */

$title = $attributes['title'] ?? '';
$description = $attributes['description'] ?? '';
$description2 = $attributes['description2'] ?? '';
$slogan = $attributes['slogan'] ?? '';
$button_text = $attributes['buttonText'] ?? 'Learn More';
$button_url = $attributes['buttonUrl'] ?? '#';
$show_button = $attributes['showButton'] ?? false;
$image_url = $attributes['imageUrl'] ?? '';
$image_alt = $attributes['imageAlt'] ?? '';
$reverse_layout = $attributes['reverseLayout'] ?? false;
$heading_level = $attributes['headingLevel'] ?? 2;

$container_classes = array(
    'nexora-split-section',
    'wp-block-nexora-content-split',
    $reverse_layout ? 'is-reversed' : 'is-normal',
);

$tag = 'h' . (int) $heading_level;
?>

<section class="<?php echo esc_attr(implode(' ', $container_classes)); ?>">
    <div class="nexora-split-section__inner alignwide">
        <div class="nexora-split-section__content">
            <<?php echo esc_attr($tag); ?> class="nexora-split-section__title">
                <?php echo wp_kses_post($title); ?>
            </<?php echo esc_attr($tag); ?>>
            <p class="nexora-split-section__description wp-block-paragraph">
                <?php echo wp_kses_post($description); ?>
            </p>
            <?php if (!empty($description2)): ?>
                <p class="nexora-split-section__description-two wp-block-paragraph">
                    <?php echo wp_kses_post($description2); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($slogan)): ?>
                <h3 class="nexora-split-section__slogan">
                    <?php echo wp_kses_post($slogan); ?>
                </h3>
            <?php endif; ?>

            <?php if ($show_button): ?>
                <div class="wp-block-buttons nexora-split-section__cta">
                    <div class="wp-block-button is-style-nexora-primary">
                        <a href="<?php echo esc_url($button_url); ?>" class="wp-block-button__link wp-element-button"
                            title="<?php echo esc_attr($button_text); ?>">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="nexora-split-section__image">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                title="<?php echo esc_attr($image_alt); ?>" loading="lazy">
        </div>
    </div>
</section>