<?php
/**
 * Who Choose Us Block — Server-side render
 *
 * @var array  $attributes Block attributes.
 */

$title = $attributes['title'] ?? 'Why Brands Choose Nexora';

$features = [];
for ($i = 1; $i <= 4; $i++) {
    $features[] = [
        'icon' => $attributes["feature{$i}Icon"] ?? '',
        'title' => $attributes["feature{$i}Title"] ?? '',
        'text' => $attributes["feature{$i}Text"] ?? '',
    ];
}
?>

<section class="nexora-wcu wp-block-nexora-who-choose-us alignfull">
    <div class="nexora-wcu__inner alignwide">

        <h2 class="nexora-wcu__main-title wp-block-heading">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="nexora-wcu__grid">
            <?php foreach ($features as $feature): ?>
                <div class="nexora-wcu-card">
                    <div class="nexora-wcu-card__icon">
                        <img src="<?php echo esc_url($feature['icon']); ?>" alt="<?php echo esc_attr($feature['title']); ?>"
                            loading="lazy">
                    </div>
                    <div class="nexora-wcu-card__content">
                        <h4 class="nexora-wcu-card__title">
                            <?php echo esc_html($feature['title']); ?>
                        </h4>
                        <h5 class="nexora-wcu-card__text">
                            <?php echo wp_kses_post($feature['text']); ?>
                        </h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>