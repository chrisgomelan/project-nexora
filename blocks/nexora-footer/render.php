<?php
/**
 * Nexora Footer Block — Server-side render
 *
 * @var array $attributes Block attributes.
 */

$logo_url = $attributes['logoUrl'] ?? '/wp-content/uploads/2026/03/nexora-logo.webp';
$logo_width = $attributes['logoWidth'] ?? 160;
$nav_items = $attributes['navItems'] ?? [];
$social_icons = $attributes['socialIcons'] ?? [];
$email = $attributes['email'] ?? '';
$address = $attributes['address'] ?? '12TH FLOOR, ONE TECH PLAZA,<br> BONIFACIO GLOBAL CITY, TAGUIG CITY, PHILIPPINES';
$phone = $attributes['phone'] ?? '+63 2 8567 4390';
$hours_title = $attributes['hoursTitle'] ?? 'MONDAY – FRIDAY';
$hours_time = $attributes['hoursTime'] ?? '9:00 AM – 6:00 PM (GMT+8)';
$hours_note = $attributes['hoursNote'] ?? 'CONSULTATIONS BY SCHEDULE';
$copyright = $attributes['copyright'] ?? '© 2025 ALL RIGHTS RESERVED';
?>

<footer class="nexora-footer alignfull">
    <div class="nexora-footer__inner">

        <!-- Top: Logo -->
        <div class="nexora-footer__logo">
            <a href="/" title="Nexora - Home">
                <img src="<?php echo esc_url($logo_url); ?>" alt="Nexora" title="Nexora"
                    width="<?php echo esc_attr($logo_width); ?>">
            </a>
        </div>

        <hr class="nexora-footer__divider">

        <!-- Navigation -->
        <nav class="nexora-footer__nav">
            <ul class="nexora-footer__nav-list">
                <?php foreach ($nav_items as $item): ?>
                    <li class="nexora-footer__nav-item">
                        <a href="<?php echo esc_url($item['url']); ?>" title="<?php echo esc_attr($item['label']); ?>">
                            <?php echo esc_html($item['label']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Main Info Grid -->
        <div class="nexora-footer__grid">

            <!-- Left: Email & Socials -->
            <div class="nexora-footer__grid-col nexora-footer__col-social">
                <div class="nexora-footer__email">
                    <a href="mailto:<?php echo esc_attr($email); ?>" title="Email Nexora">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
                <div class="nexora-footer__social-icons">
                    <?php foreach ($social_icons as $social): ?>
                        <div class="nexora-footer__social-box">
                            <a href="<?php echo esc_url($social['url']); ?>" class="nexora-footer__social-link"
                                aria-label="<?php echo esc_attr($social['platform']); ?>"
                                title="<?php echo esc_attr($social['platform']); ?>">
                                <i class="<?php echo esc_attr($social['iconClass']); ?>"></i>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Center: Address & Phone -->
            <div class="nexora-footer__grid-col nexora-footer__col-address">
                <div class="nexora-footer__address-title">NEXORA</div>
                <div class="nexora-footer__address-text">
                    <?php echo wp_kses_post($address); ?>
                </div>
                <div class="nexora-footer__phone">
                    <?php echo esc_html($phone); ?>
                </div>
            </div>

            <!-- Right: Hours -->
            <div class="nexora-footer__grid-col nexora-footer__col-hours">
                <div class="nexora-footer__hours-title">
                    <?php echo esc_html($hours_title); ?>
                </div>
                <div class="nexora-footer__hours-time">
                    <?php echo esc_html($hours_time); ?>
                </div>
                <div class="nexora-footer__hours-note">
                    <?php echo esc_html($hours_note); ?>
                </div>
            </div>

        </div>

        <!-- Bottom: Copyright -->
        <div class="nexora-footer__copyright">
            <?php echo esc_html($copyright); ?>
        </div>

    </div>
</footer>