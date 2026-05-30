<?php
/**
 * Rapture Therapy Centre — Dynamic Blog / Learning Centre
 */
require_once __DIR__ . '/includes/db.php';

$db = getDB();
$active_page = 'blog';
$page_title = 'Learning Centre — Rapture Therapy Centre Bangalore';
$page_description = 'Expert articles on speech therapy, occupational therapy, child development, and parenting from our clinical team.';

$articles = $db->query("SELECT * FROM articles WHERE is_published = 1 ORDER BY published_date DESC")->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

    <!-- Page Hero -->
    <section class="page-hero" style="background-image: url('assets/speech_therapy.png');">
        <div class="page-hero-content">
            <h1>Learning Centre</h1>
            <div class="page-breadcrumbs">
                <a href="index.php">Home</a> / <span>Learning Centre</span>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="section-padding" style="background: var(--bg-white);">
        <div class="container">
            
            <!-- Dynamic Category Filters -->
            <div class="therapists-filters-bar">
                <button class="filter-badge active" data-filter="all">All Topics</button>
                <button class="filter-badge" data-filter="speech">Speech & Language</button>
                <button class="filter-badge" data-filter="ot">Sensory Integration</button>
                <button class="filter-badge" data-filter="opt">OPT Protocols</button>
                <button class="filter-badge" data-filter="parenting">Parenting Tips</button>
            </div>

            <!-- Blog Grid -->
            <div class="blog-grid" id="blog-grid">
                <?php foreach ($articles as $a): ?>
                <article class="blog-post-card fade-in-element active-card" data-category="<?= htmlspecialchars($a['category']) ?>">
                    <div class="blog-post-image">
                        <?php if ($a['featured_image']): ?>
                            <img src="assets/<?= htmlspecialchars($a['featured_image']) ?>" alt="<?= htmlspecialchars($a['title']) ?>">
                        <?php else: ?>
                            <div style="width:100%;height:220px;background:var(--bg-blue-light);display:flex;align-items:center;justify-content:center;"><i class="ri-article-line" style="font-size:3rem;color:var(--primary);"></i></div>
                        <?php endif; ?>
                        <span class="blog-category-badge"><?= htmlspecialchars($a['category_label']) ?></span>
                    </div>
                    <div class="blog-card-body">
                        <span class="blog-date"><?= date('F j, Y', strtotime($a['published_date'])) ?> | Clinical Team</span>
                        <h3><a href="article.php?slug=<?= htmlspecialchars($a['slug']) ?>"><?= htmlspecialchars($a['title']) ?></a></h3>
                        <p class="blog-excerpt"><?= htmlspecialchars($a['excerpt']) ?></p>
                        <a href="article.php?slug=<?= htmlspecialchars($a['slug']) ?>" class="blog-read-more">Read Article <i class="ri-arrow-right-line"></i></a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
