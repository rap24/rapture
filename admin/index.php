<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

$db = getDB();
$admin_page = 'dashboard';
$admin_title = 'Dashboard';

$therapistCount = $db->query('SELECT COUNT(*) FROM therapists')->fetchColumn();
$availableCount = $db->query('SELECT COUNT(*) FROM therapists WHERE is_available = 1')->fetchColumn();
$articleCount = $db->query('SELECT COUNT(*) FROM articles')->fetchColumn();
$publishedCount = $db->query('SELECT COUNT(*) FROM articles WHERE is_published = 1')->fetchColumn();
$serviceCount = $db->query('SELECT COUNT(*) FROM services')->fetchColumn();

require_once __DIR__ . '/includes/header.php';
?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon teal"><i class="ri-user-heart-line"></i></div>
        <div>
            <div class="stat-value"><?= $therapistCount ?></div>
            <div class="stat-label">Therapists (<?= $availableCount ?> available)</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="ri-article-line"></i></div>
        <div>
            <div class="stat-value"><?= $articleCount ?></div>
            <div class="stat-label">Articles (<?= $publishedCount ?> published)</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon gold"><i class="ri-service-line"></i></div>
        <div>
            <div class="stat-value"><?= $serviceCount ?></div>
            <div class="stat-label">Services</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="ri-eye-line"></i></div>
        <div>
            <div class="stat-value">&mdash;</div>
            <div class="stat-label">Page Views (coming soon)</div>
        </div>
    </div>
</div>

<div class="admin-card">
    <h3><i class="ri-flashlight-line"></i> Quick Actions</h3>
    <div class="quick-actions">
        <a href="therapists.php?action=add" class="quick-action-card">
            <i class="ri-user-add-line"></i> Add Therapist
        </a>
        <a href="articles.php?action=add" class="quick-action-card">
            <i class="ri-file-add-line"></i> New Article
        </a>
        <a href="services.php?action=add" class="quick-action-card">
            <i class="ri-add-circle-line"></i> Add Service
        </a>
        <a href="../index.php" class="quick-action-card" target="_blank">
            <i class="ri-external-link-line"></i> View Live Site
        </a>
    </div>
</div>

<div class="admin-card">
    <h3><i class="ri-article-line"></i> Recent Articles</h3>
    <table class="admin-table">
        <thead>
            <tr><th>Title</th><th>Category</th><th>Status</th><th>Date</th></tr>
        </thead>
        <tbody>
            <?php
            $recent = $db->query('SELECT * FROM articles ORDER BY created_at DESC LIMIT 5');
            while ($row = $recent->fetch()):
            ?>
            <tr>
                <td><strong><?= htmlspecialchars($row['title']) ?></strong></td>
                <td><span class="badge badge-info"><?= htmlspecialchars($row['category_label']) ?></span></td>
                <td><?= $row['is_published'] ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-warning">Draft</span>' ?></td>
                <td><?= htmlspecialchars($row['published_date']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
