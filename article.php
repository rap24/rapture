<?php
/**
 * Rapture Therapy Centre — Single Article View
 * URL: article.php?slug=gestalt-language-processing
 */
require_once __DIR__ . '/includes/db.php';

$db = getDB();
$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
    header('Location: blog.php');
    exit;
}

$stmt = $db->prepare("SELECT * FROM articles WHERE slug = ? AND is_published = 1");
$stmt->execute([$slug]);
$article = $stmt->fetch();

if (!$article) {
    header('HTTP/1.0 404 Not Found');
    $active_page = 'blog';
    $page_title = 'Article Not Found — Rapture Therapy Centre';
    $page_description = 'The requested article was not found.';
    require_once __DIR__ . '/includes/header.php';
    echo '<section class="section-padding"><div class="container text-center"><h2>Article Not Found</h2><p>The article you are looking for does not exist.</p><a href="blog.php" class="btn btn-primary">Back to Learning Centre</a></div></section>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$active_page = 'blog';
$page_title = htmlspecialchars($article['title']) . ' — Rapture Therapy Centre';
$page_description = $article['meta_description'] ?: $article['excerpt'];

// Get related articles (same category, excluding current)
$relStmt = $db->prepare("SELECT * FROM articles WHERE category = ? AND id != ? AND is_published = 1 ORDER BY RANDOM() LIMIT 3");
$relStmt->execute([$article['category'], $article['id']]);
$related = $relStmt->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>

    <!-- Page Hero -->
    <section class="page-hero" style="background-image: url('assets/occupational_therapy.png');">
        <div class="page-hero-content">
            <h1>Learning Centre</h1>
            <div class="page-breadcrumbs">
                <a href="index.php">Home</a> / <a href="blog.php" style="color: rgba(255,255,255,0.7);">Learning Centre</a>
            </div>
        </div>
    </section>

    <!-- Article Header -->
    <header class="article-header-clean" style="padding-top: 80px; margin-top: 40px;">
        <div class="container">
            <h1><?= htmlspecialchars($article['title']) ?></h1>
            <div class="article-meta-clean">
                <span class="meta-date"><?= strtoupper(date('F j, Y', strtotime($article['published_date']))) ?></span>
                <span class="meta-dot">&bull;</span>
                <span class="meta-author"><?= htmlspecialchars($article['author']) ?></span>
                <span class="meta-dot">&bull;</span>
                <span class="meta-read-time"><?= htmlspecialchars($article['read_time']) ?></span>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <section class="section-padding">
        <div class="container">
            <div class="article-layout-grid">
                <!-- Sidebar -->
                <aside class="article-sidebar">
                    <?php if (!empty($related)): ?>
                    <div class="related-sidebar-widget">
                        <h3 class="related-sidebar-header">You May Also Like</h3>
                        <?php foreach ($related as $rel): ?>
                        <a href="article.php?slug=<?= htmlspecialchars($rel['slug']) ?>" class="related-sidebar-card">
                            <?php if ($rel['featured_image']): ?>
                                <img src="assets/<?= htmlspecialchars($rel['featured_image']) ?>" alt="<?= htmlspecialchars($rel['title']) ?>" class="related-thumb">
                            <?php endif; ?>
                            <div class="related-info">
                                <span class="related-meta"><?= htmlspecialchars($rel['category_label']) ?> &bull; <?= htmlspecialchars($rel['read_time']) ?></span>
                                <h4 class="related-title"><?= htmlspecialchars($rel['title']) ?></h4>
                                <span class="related-date"><?= strtoupper(date('j F, Y', strtotime($rel['published_date']))) ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </aside>

                <!-- Main Content -->
                <article class="article-main-content">
                    <?php if ($article['featured_image']): ?>
                    <div class="article-featured-image-container">
                        <img src="assets/<?= htmlspecialchars($article['featured_image']) ?>" alt="<?= htmlspecialchars($article['title']) ?>">
                    </div>
                    <?php endif; ?>

                    <?= $article['content'] ?>


                </article>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    <section class="featured-articles-section">
        <div class="container">
            <div class="featured-articles-header">
                <h2 class="featured-articles-title">Featured Articles</h2>
                <a href="blog.php" class="btn-outline-pill">Load More &rarr;</a>
            </div>
            <div class="featured-grid">
                <?php
                $featStmt = $db->prepare("SELECT * FROM articles WHERE id != ? AND is_published = 1 ORDER BY RANDOM() LIMIT 3");
                $featStmt->execute([$article['id']]);
                while ($feat = $featStmt->fetch()):
                ?>
                <a href="article.php?slug=<?= htmlspecialchars($feat['slug']) ?>" class="featured-card">
                    <div class="featured-card-image">
                        <?php if ($feat['featured_image']): ?>
                            <img src="assets/<?= htmlspecialchars($feat['featured_image']) ?>" alt="<?= htmlspecialchars($feat['title']) ?>">
                        <?php endif; ?>
                    </div>
                    <span class="featured-card-meta"><?= htmlspecialchars($feat['category_label']) ?> &bull; <?= htmlspecialchars($feat['read_time']) ?></span>
                    <h3 class="featured-card-title"><?= htmlspecialchars($feat['title']) ?></h3>
                    <span class="featured-card-date"><?= strtoupper(date('j F, Y', strtotime($feat['published_date']))) ?></span>
                </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
