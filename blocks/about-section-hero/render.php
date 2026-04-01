<?php
/**
 * About Section Hero Block — Server-side render
 *
 * @var array $attributes Block attributes.
 */

$heading = $attributes['heading'] ?? 'Accelerating Brand Growth Through Data & Intelligent Technology';
$description = $attributes['description'] ?? 'Nexora is a data-driven digital agency leveraging advanced analytics, automation, and innovative technology to deliver measurable, scalable growth for modern brands.';
$primary_button_text = $attributes['primaryButtonText'] ?? 'Work With Nexora';
$primary_button_url = $attributes['primaryButtonUrl'] ?? '#';
$secondary_button_text = $attributes['secondaryButtonText'] ?? 'Explore Our Approach';
$secondary_button_url = $attributes['secondaryButtonUrl'] ?? '#';
$show_primary = $attributes['showPrimaryButton'] ?? true;
$show_secondary = $attributes['showSecondaryButton'] ?? true;
?>

<section class="nexora-about-hero alignfull">

    <!-- Content -->
    <div class="nexora-about-hero__content">

        <h1 class="nexora-about-hero__heading wp-block-heading">
            <?php echo wp_kses_post($heading); ?>
        </h1>

        <h4 class="nexora-about-hero__description wp-block-heading">
            <?php echo wp_kses_post($description); ?>
        </h4>

        <?php if ($show_primary || $show_secondary): ?>
            <div class="wp-block-buttons nexora-about-hero__buttons">

                <?php if ($show_secondary): ?>
                    <div class="wp-block-button is-style-nexora-secondary">
                        <a href="<?php echo esc_url($secondary_button_url); ?>" class="wp-block-button__link wp-element-button"
                            title="<?php echo esc_attr($secondary_button_text); ?>">
                            <?php echo esc_html($secondary_button_text); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($show_primary): ?>
                    <div class="wp-block-button is-style-nexora-primary">
                        <a href="<?php echo esc_url($primary_button_url); ?>" class="wp-block-button__link wp-element-button"
                            title="<?php echo esc_attr($primary_button_text); ?>">
                            <?php echo esc_html($primary_button_text); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    </div>

</section>