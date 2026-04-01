<?php
/**
 * Coming Soon Block — Server-side render
 *
 * @var array  $attributes Block attributes.
 */

$title = $attributes['title'] ?? 'Building the Next Digital Frontier.';
$description = $attributes['description'] ?? 'By blending marketing intelligence with emerging technologies, Nexora creates future-ready solutions for ambitious brands. Stay tuned.';
$sub_title = $attributes['subTitle'] ?? 'Connect Before We Go Live';
$image_url = $attributes['imageUrl'] ?? '/wp-content/uploads/2026/03/digital-frontier-scaled.webp';
$image_alt = $attributes['imageAlt'] ?? 'Digital Frontier';

$container_classes = array(
    'nexora-coming-soon',
    'wp-block-nexora-coming-soon',
    'alignfull'
);
?>

<section class="<?php echo esc_attr(implode(' ', $container_classes)); ?>">
    <div class="nexora-coming-soon__content">
        <div class="nexora-coming-soon__content-inner">
            <h1 class="nexora-coming-soon__title">
                <?php echo wp_kses_post($title); ?>
            </h1>
            <p class="nexora-coming-soon__description">
                <?php echo wp_kses_post($description); ?>
            </p>

            <div class="nexora-coming-soon__timer">
                <?php
                // Render the simple launch timer block directly or manually layout
                if (function_exists('sl_render_block_output')) {
                    echo sl_render_block_output();
                } else {
                    echo do_blocks('<!-- wp:sl/countdown /-->');
                }
                ?>
            </div>

            <div class="nexora-coming-soon__subscribe">
                <h4>
                    <?php echo wp_kses_post($sub_title); ?>
                </h4>
                <form action="#" method="post" class="nexora-coming-soon__form">
                    <input type="email" placeholder="Enter Email Address" required class="nexora-coming-soon__input" />
                    <button type="submit" class="nexora-coming-soon__button">Get Early Access</button>
                </form>
            </div>
        </div>
    </div>
    <div class="nexora-coming-soon__image-container">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy"
            class="nexora-coming-soon__image" />
    </div>
</section>