<?php
/**
 * Testimonials Block — Server-side render
 *
 * @var array  $attributes Block attributes.
 */

$title = $attributes['title'] ?? 'What Our Clients Say';
$testimonials = $attributes['testimonials'] ?? [];
?>

<section class="nexora-testimonials wp-block-nexora-testimonials alignfull">
    <div class="nexora-testimonials__inner alignwide">

        <h2 class="nexora-testimonials__title">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="nexora-testimonials__grid">
            <?php foreach ($testimonials as $item): ?>
                <div class="nexora-testimonial">
                    <div class="nexora-testimonial__image">
                        <img src="<?php echo esc_url($item['imageUrl']); ?>"
                            alt="<?php echo esc_attr($item['author']); ?>" title="<?php echo esc_attr($item['author']); ?>" loading="lazy">
                    </div>
                    <blockquote class="nexora-testimonial__quote">
                        <p>“<?php echo wp_kses_post($item['quote']); ?>”</p>
                    </blockquote>
                    <cite class="nexora-testimonial__author">
                        — <?php echo esc_html($item['author']); ?>
                    </cite>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>