<?php
/**
 * Mission Vision Block — Server-side render
 *
 * @var array  $attributes Block attributes.
 */

$title = $attributes['title'] ?? 'Our Mission & Vision';
$mission_title = $attributes['missionTitle'] ?? 'Our Mission';
$mission_text = $attributes['missionText'] ?? 'To empower brands with intelligent marketing systems that turn data into predictable, scalable revenue.';
$vision_title = $attributes['visionTitle'] ?? 'Our Vision';
$vision_text = $attributes['visionText'] ?? 'To become a globally trusted performance partner where strategy, automation, and innovation work seamlessly to drive measurable business growth.';
?>

<section class="nexora-mission-vision wp-block-nexora-mission-vision alignfull">
    <div class="nexora-mission-vision__inner alignwide">

        <h2 class="nexora-mission-vision__main-title">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="nexora-mission-vision__cards">

            <!-- Mission Card -->
            <div class="nexora-mv-card">
                <h2 class="nexora-mv-card__title">
                    <?php echo esc_html($mission_title); ?>
                </h2>
                <p class="nexora-mv-card__text">
                    <?php echo wp_kses_post($mission_text); ?>
                </p>
            </div>

            <!-- Vision Card -->
            <div class="nexora-mv-card">
                <h2 class="nexora-mv-card__title">
                    <?php echo esc_html($vision_title); ?>
                </h2>
                <p class="nexora-mv-card__text">
                    <?php echo wp_kses_post($vision_text); ?>
                </p>
            </div>

        </div>

    </div>
</section>