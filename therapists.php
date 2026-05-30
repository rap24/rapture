<?php
/**
 * Rapture Therapy Centre — Dynamic Therapists Page
 */
require_once __DIR__ . '/includes/db.php';

$db = getDB();
$active_page = 'therapists';
$page_title = 'Meet Our Therapists - Rapture Therapy Centre Bangalore';
$page_description = 'Meet the clinical experts at Rapture Therapy Centre in RR Nagar, Bangalore. Our certified Speech Pathologists, Occupational Therapists, and Special Educators coordinate care.';

$founder = $db->query("SELECT * FROM therapists WHERE is_founder = 1 LIMIT 1")->fetch();
$team = $db->query("SELECT * FROM therapists WHERE is_founder = 0 ORDER BY sort_order ASC")->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

    <!-- Page Hero -->
    <section class="page-hero" style="background-image: url('assets/speech_therapy.png');">
        <div class="page-hero-content">
            <h1>Meet Our Therapists</h1>
            <div class="page-breadcrumbs">
                <a href="index.php">Home</a> / <span>Our Therapists</span>
            </div>
        </div>
    </section>

    <!-- Meet the Founder — Dominant Split Layout -->
    <?php if ($founder): ?>
    <section class="founder-spotlight" id="founder">
        <div class="container">
            <div class="founder-split">
                <div class="founder-image-side">
                    <?php if ($founder['photo']): ?>
                    <img src="assets/<?= htmlspecialchars($founder['photo']) ?>" alt="<?= htmlspecialchars($founder['name']) ?>">
                    <?php endif; ?>
                </div>
                <div class="founder-content-side">
                    <div class="founder-content-inner">
                        <h2 class="founder-name"><em>Meet</em> <?= htmlspecialchars($founder['name']) ?></h2>
                        <p class="founder-label"><?= htmlspecialchars($founder['credential'] ?: 'Founder & Senior Therapist') ?></p>
                        <p class="founder-bio"><?= htmlspecialchars($founder['bio']) ?></p>

                        <div class="founder-bottom-line">
                            <div class="founder-bottom-left">
                                <span class="founder-bottom-label">THE BOTTOM LINE</span>
                                <p>If your child is having trouble communicating,<br>let us be your <em>first line of support.</em></p>
                            </div>
                            <a href="#booking-modal" class="btn btn-outline founder-cta open-booking-modal">LEARN MORE <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Therapists Directory Grid -->
    <section class="section-padding therapists-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Clinical Leadership Team</h2>
                <p class="section-subtitle">Our certified experts coordinate goals across Speech, Occupational, and scholastic disciplines.</p>
            </div>

            <!-- Dynamic Category Filters -->
            <div class="therapists-filters-bar">
                <button class="filter-badge active" data-filter="all">All Specialists</button>
                <button class="filter-badge" data-filter="speech">Speech & Language</button>
                <button class="filter-badge" data-filter="ot">Occupational Therapy</button>
                <button class="filter-badge" data-filter="education">Special Educators</button>
                <button class="filter-badge" data-filter="physio">Physiotherapists</button>
            </div>

            <!-- Grid -->
            <div class="therapists-grid" id="therapists-grid">
                <?php foreach ($team as $t): ?>
                <div class="therapist-profile-card fade-in-element active-card" data-category="<?= htmlspecialchars($t['category']) ?>">
                    <div class="therapist-image-box">
                        <?php if ($t['photo']): ?>
                            <img src="assets/<?= htmlspecialchars($t['photo']) ?>" alt="Photo of <?= htmlspecialchars($t['name']) ?>">
                        <?php else: ?>
                            <div style="width:100%;height:100%;background:linear-gradient(135deg,#e6f4f4,#d4eced);display:flex;align-items:center;justify-content:center;font-size:3rem;font-weight:900;color:#3d878a;"><?= strtoupper(substr($t['name'], 0, 2)) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="therapist-card-body">
                        <div class="therapist-meta">
                            <h3><?= htmlspecialchars($t['name']) ?></h3>
                            <div class="therapist-rating">
                                <i class="ri-star-fill"></i>
                                <span><?= number_format($t['rating'], 1) ?></span>
                            </div>
                        </div>
                        <p class="therapist-credential"><?= htmlspecialchars($t['credential']) ?></p>
                        <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin-bottom: 20px;">
                            <?= htmlspecialchars($t['bio']) ?>
                        </p>
                        <div class="therapist-specialties">
                            <h5>Core Practices</h5>
                            <div class="specialty-tags">
                                <?php foreach (array_slice(explode(',', $t['specialties']), 0, 3) as $tag): ?>
                                    <span class="specialty-tag"><?= htmlspecialchars(trim($tag)) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="therapist-footer">
                            <?php if ($t['is_available']): ?>
                            <div class="availability-status">
                                <span class="status-indicator-dot"></span>
                                <span>Available</span>
                            </div>
                            <button class="btn btn-outline open-booking-modal" style="padding: 8px 16px; font-size: 0.85rem;">Book slot</button>
                            <?php else: ?>
                            <div class="availability-status" style="opacity: 0.6;">
                                <span class="status-indicator-dot" style="background: var(--text-muted);"></span>
                                <span>Currently Unavailable</span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
