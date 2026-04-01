<?php
// Child theme functions file
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Global site-wide styles (buttons, utilities)
    wp_enqueue_style(
        'nexora-global-style',
        get_stylesheet_directory_uri() . '/assets/css/global.css',
        [],
        wp_get_theme()->get('Version')
    );

    // Load Google Fonts — Poppins & Inter
    wp_enqueue_style(
        'nexora-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // Enqueue Font Awesome for social icons
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        [],
        '6.5.1'
    );

    // Enqueue header styles
    wp_enqueue_style(
        'nexora-header-style',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        [],
        wp_get_theme()->get('Version')
    );

    // Enqueue header JS
    wp_enqueue_script(
        'nexora-header-script',
        get_stylesheet_directory_uri() . '/assets/js/header.js',
        [],
        wp_get_theme()->get('Version'),
        true // Load in footer
    );

    // Enqueue timer JS
    wp_enqueue_script(
        'nexora-timer-script',
        get_stylesheet_directory_uri() . '/assets/js/timer.js',
        [],
        wp_get_theme()->get('Version'),
        true // Load in footer
    );
});

// Force-render header from file, bypassing Site Editor database overrides
add_action('wp_body_open', function () {
    $header_file = get_stylesheet_directory() . '/parts/header.html';
    if (file_exists($header_file)) {
        $content = file_get_contents($header_file);
        echo do_blocks($content);
    }
}, 1);

// Register custom blocks & Nexora button style variations
add_action('init', function () {

    // Register hero-section block (block.json drives attributes, render.php & style.css)
    register_block_type(get_stylesheet_directory() . '/blocks/hero-section');

    // Register about-section-hero block
    register_block_type(get_stylesheet_directory() . '/blocks/about-section-hero');

    // Register coming-soon block
    register_block_type(get_stylesheet_directory() . '/blocks/coming-soon');

    // Register content-split block
    register_block_type(get_stylesheet_directory() . '/blocks/content-split');

    // Register testimonials block
    register_block_type(get_stylesheet_directory() . '/blocks/testimonials');

    // Register mission-vision block
    register_block_type(get_stylesheet_directory() . '/blocks/mission-vision');

    // Register cta-section block
    register_block_type(get_stylesheet_directory() . '/blocks/cta-section');

    // Register footer block
    register_block_type(get_stylesheet_directory() . '/blocks/nexora-footer');

    // Register scroll-curtain-reveal block
    register_block_type(get_stylesheet_directory() . '/blocks/scroll-curtain-reveal');


    //Register Who choose us block
    register_block_type(get_stylesheet_directory() . '/blocks/who-choose-us');

    // Register scroll-to-top block
    register_block_type(get_stylesheet_directory() . '/blocks/scroll-to-top');

    register_block_style('core/button', [
        'name' => 'nexora-primary',
        'label' => 'Nexora Primary',
    ]);

    register_block_style('core/button', [
        'name' => 'nexora-secondary',
        'label' => 'Nexora Secondary',
    ]);
});

/**
 * ── SEO & Essential Theme Support ──────────────────────────
 * ─────────────────────────────────────────────────────────── */
add_action('after_setup_theme', function () {
    // Let WordPress manage the <title> tag for better SEO
    add_theme_support('title-tag');

    // Support semantic HTML5 tags
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);
});

/**
 * ── Structured Data (JSON-LD) for SEO ───────────────────────
 * Injects Organization and LocalBusiness schema into <head>.
 * ─────────────────────────────────────────────────────────── */
add_action('wp_head', function () {
    // Dynamic data fallback if no block attributes found
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => "Nexora",
        "url" => home_url(),
        "logo" => home_url('/wp-content/uploads/2026/03/nexora-logo.webp'),
        "contactPoint" => [
            "@type" => "ContactPoint",
            "telephone" => "+63-2-8567-4390",
            "contactType" => "Customer Support"
        ],
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "12th Floor, One Tech Plaza, Bonifacio Global City",
            "addressLocality" => "Taguig City",
            "addressRegion" => "Metro Manila",
            "postalCode" => "1634",
            "addressCountry" => "PH"
        ]
    ];
    echo "\n" . '<script type="application/ld+json">' . json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
});

/**
 * ── SEO Meta Tags (Description, Keywords, Author, Publisher) ──
 * Injects essential SEO meta tags into the <head>.
 * ─────────────────────────────────────────────────────────── */
add_action('wp_head', function () {
    // Description: Front page vs internal pages
    $description = "Nexora empowers business growth through innovative strategy and cutting-edge technology. Discover how we help brands scale with data-driven insights and modern digital solutions.";

    if (!is_front_page()) {
        // Fallback for internal pages or posts (could be enhanced later to use post excerpts)
        $post = get_post();
        if ($post && !empty($post->post_excerpt)) {
            $description = wp_strip_all_tags($post->post_excerpt);
        }
    }

    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="keywords" content="Growth Strategy, Business Technology, Digital Transformation, Nexora, Scalable Business Solutions, Strategic Consulting">' . "\n";
    echo '<meta name="author" content="Nexora">' . "\n";
    echo '<meta name="publisher" content="Nexora">' . "\n";
}, 1);

/**
 * ── Custom Site Title & Favicon ────────────────────────────
 * Overrides the default "project-nexora" title and sets icon.
 * ─────────────────────────────────────────────────────────── */
add_filter('pre_get_document_title', function () {
    return 'Nexora | Growth Powered by Strategy & Technology';
}, 999);

add_filter('bloginfo', function ($output, $show) {
    if ($show === 'name') {
        return 'Nexora';
    }
    return $output;
}, 999, 2);

add_action('wp_head', function () {
    $icon_url = '/wp-content/uploads/2026/03/nexora-logo-icon.webp';
    echo '<link rel="icon" href="' . esc_url($icon_url) . '" type="image/webp">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . esc_url($icon_url) . '">' . "\n";
}, 5);

/**
 * ── SEO Link Title Enhancements ────────────────────────────
 * Ensures all navigation menu links have a title attribute.
 * ─────────────────────────────────────────────────────────── */
add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
    if (empty($atts['title'])) {
        $atts['title'] = $item->title;
    }
    return $atts;
}, 10, 3);

/**
 * ── Global Link Title Enhancement (Block Navigation) ───────
 * Injects missing title attributes into block-based navigation links.
 * ─────────────────────────────────────────────────────────── */
add_filter('render_block', function ($block_content, $block) {
    $target_blocks = ['core/navigation', 'core/page-list', 'core/navigation-link'];

    if (in_array($block['blockName'], $target_blocks) && !empty($block_content)) {
        // Matches <a> tags that do NOT have a title attribute already
        $block_content = preg_replace_callback(
            '/<a\s+(?![^>]*?\stitle=)([^>]*?)>(.*?)<\/a>/is',
            function ($matches) {
                $attributes = $matches[1];
                $inner_html = $matches[2];
                $link_text = trim(strip_tags($inner_html));

                // Use the link text as the title if it exists
                if (!empty($link_text)) {
                    return sprintf('<a title="%s" %s>%s</a>', esc_attr($link_text), $attributes, $inner_html);
                }
                return $matches[0];
            },
            $block_content
        );
    }
    return $block_content;
}, 10, 2);

/**
 * ── Simple Launch Timer Block ─────────────────────────────
 * Registers the countdown block and its callback.
 * ─────────────────────────────────────────────────────────── */
function sl_register_countdown_block()
{
    register_block_type('sl/countdown', array(
        'render_callback' => 'sl_render_block_output',
    ));
}
add_action('init', 'sl_register_countdown_block');

function sl_render_block_output()
{
    // Get saved date from the general plugin
    $date = get_option('sl_launch_date', '');

    ob_start(); ?>
    <div class="sl-timer-block" data-target="<?php echo esc_attr($date); ?>">
        <div class="sl-flex-container">
            <div class="sl-unit"><span id="sl-days">00</span>
                <p>Days</p>
            </div>
            <div class="sl-sep">:</div>
            <div class="sl-unit"><span id="sl-hours">00</span>
                <p>Hours</p>
            </div>
            <div class="sl-sep">:</div>
            <div class="sl-unit"><span id="sl-minutes">00</span>
                <p>Minutes</p>
            </div>
            <div class="sl-sep">:</div>
            <div class="sl-unit"><span id="sl-seconds">00</span>
                <p>Seconds</p>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
