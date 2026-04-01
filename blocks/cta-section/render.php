<?php
/**
 * CTA Section Block — Server-side render
 *
 * @var array  $attributes Block attributes.
 */

$title = $attributes['title'] ?? "Let's Build Something Great";
$description = $attributes['description'] ?? "Ready to take your brand to the next level? Let's connect and turn your vision into results.";
$primary_btn_text = $attributes['primaryButtonText'] ?? "Contact Us";
$primary_btn_url = $attributes['primaryButtonUrl'] ?? "#";
$secondary_btn_text = $attributes['secondaryButtonText'] ?? "Book for Free Consultation";
$secondary_btn_url = $attributes['secondaryButtonUrl'] ?? "#";
?>

<section class="nexora-cta alignfull">
    <div class="nexora-cta__inner">
        <h2 class="nexora-cta__title">
            <?php echo esc_html($title); ?>
        </h2>

        <p class="nexora-cta__description wp-block-paragraph">
            <?php echo wp_kses_post($description); ?>
        </p>

        <div class="nexora-cta__buttons">
            <div class="wp-block-buttons">
                <div class="wp-block-button is-style-nexora-primary">
                    <a class="wp-block-button__link" href="<?php echo esc_url($primary_btn_url); ?>"
                        title="<?php echo esc_attr($primary_btn_text); ?>">
                        <?php echo esc_html($primary_btn_text); ?>
                    </a>
                </div>
                <div class="wp-block-button is-style-nexora-secondary">
                    <a class="wp-block-button__link" href="<?php echo esc_url($secondary_btn_url); ?>"
                        title="<?php echo esc_attr($secondary_btn_text); ?>">
                        <?php echo esc_html($secondary_btn_text); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>