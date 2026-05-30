<?php
/**
 * Rapture Therapy Centre — Public Header Include
 * Usage: set $active_page before including. E.g. $active_page = 'therapists';
 * Optional: set $page_title, $page_description for SEO.
 */
if (!isset($active_page)) $active_page = 'home';
if (!isset($page_title)) $page_title = 'Rapture Therapy Centre Bangalore';
if (!isset($page_description)) $page_description = 'Premium interdisciplinary developmental clinic in RR Nagar, Bangalore.';
$base = isset($is_article) ? '../' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base ?>css/style.css?v=2.0">
    <link rel="icon" type="image/png" href="<?= $base ?>assets/logo.png">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KRSF4HR8');</script>
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRSF4HR8"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <!-- Top Promo Banner -->
    <div class="insurance-promo-banner">
        <span>Schedule a 1-hour consultation with our lead therapist!</span>
        <a href="#booking-modal" class="open-booking-modal">Book Now <i class="ri-arrow-right-line"></i></a>
    </div>

    <!-- Sticky Navigation Header -->
    <header class="header">
        <div class="container nav-container">
            <a href="<?= $base ?>index.php" class="logo-link">
                <img src="<?= $base ?>assets/logo.png" alt="Rapture Therapy Centre Logo" class="logo-img">
                <div>
                    <span class="brand-name">Rapture</span>
                    <span class="brand-tagline">Therapy Centre</span>
                </div>
            </a>
            
            <nav>
                <ul class="nav-menu" id="nav-menu">
                    <li class="nav-item">
                        <a href="<?= $base ?>index.php" class="nav-link <?= $active_page === 'home' ? 'active' : '' ?>">Home <i class="ri-arrow-down-s-line"></i></a>
                        <div class="nav-submenu">
                            <a href="<?= $base ?>index.php#specialties" class="nav-submenu-link">Specialties</a>
                            <a href="<?= $base ?>index.php#ecosystem" class="nav-submenu-link">Our Ecosystem</a>
                            <a href="<?= $base ?>index.php#protocols" class="nav-submenu-link">Protocols</a>
                            <a href="<?= $base ?>index.php#milestones" class="nav-submenu-link">Milestone Wizard</a>
                            <a href="<?= $base ?>index.php#intake" class="nav-submenu-link">Intake Timeline</a>
                            <a href="<?= $base ?>index.php#google-reviews" class="nav-submenu-link">Reviews</a>
                            <a href="<?= $base ?>index.php#faqs" class="nav-submenu-link">FAQs</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base ?>services.php" class="nav-link <?= $active_page === 'services' ? 'active' : '' ?>">Our Services <i class="ri-arrow-down-s-line"></i></a>
                        <div class="nav-submenu">
                            <a href="<?= $base ?>services.php#speech" class="nav-submenu-link">Speech & Language</a>
                            <a href="<?= $base ?>services.php#occupational" class="nav-submenu-link">Occupational Therapy</a>
                            <a href="<?= $base ?>services.php#sessions" class="nav-submenu-link">Flexible Session Formats</a>
                            <a href="<?= $base ?>services.php#education" class="nav-submenu-link">Scholastic & Physiological Care</a>
                            <a href="<?= $base ?>services.php#journey" class="nav-submenu-link">The Collaborative Therapy Journey</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base ?>therapists.php" class="nav-link <?= $active_page === 'therapists' ? 'active' : '' ?>">Our Therapists</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base ?>blog.php" class="nav-link <?= $active_page === 'blog' ? 'active' : '' ?>">Learning Centre</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base ?>about.php" class="nav-link <?= $active_page === 'about' ? 'active' : '' ?>">About Us <i class="ri-arrow-down-s-line"></i></a>
                        <div class="nav-submenu">
                            <a href="<?= $base ?>about.php#why-rapture" class="nav-submenu-link">Why Rapture?</a>
                            <a href="<?= $base ?>about.php#vision" class="nav-submenu-link">Clinic Vision</a>
                            <a href="<?= $base ?>about.php#coordinated-model" class="nav-submenu-link">The Coordinated Model</a>
                            <a href="<?= $base ?>about.php#values" class="nav-submenu-link">Our Clinical Values</a>
                            <a href="<?= $base ?>about.php#support" class="nav-submenu-link">Support Your Child's Next Breakthrough</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base ?>contact.php" class="nav-link <?= $active_page === 'contact' ? 'active' : '' ?>">Contact Us</a>
                    </li>
                </ul>
            </nav>
            
            <div class="nav-actions">
                <button class="theme-toggle" id="theme-toggle" aria-label="Toggle Theme">
                    <i class="ri-moon-line"></i>
                </button>
                <button class="btn btn-primary open-booking-modal">
                    Book Appointment <i class="ri-calendar-event-line"></i>
                </button>
                <span class="menu-toggle" id="menu-toggle">
                    <i class="ri-menu-line"></i>
                </span>
            </div>
        </div>
    </header>
