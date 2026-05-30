<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

$db = getDB();
$admin_page = 'articles';
$admin_title = 'Manage Articles';
$message = '';
$msgType = '';

$action = $_GET['action'] ?? 'list';
$id = intval($_GET['id'] ?? 0);

// DELETE
if ($action === 'delete' && $id > 0) {
    $db->prepare('DELETE FROM articles WHERE id = ?')->execute([$id]);
    header('Location: articles.php?msg=deleted');
    exit;
}

// TOGGLE PUBLISH
if ($action === 'toggle' && $id > 0) {
    $db->prepare('UPDATE articles SET is_published = CASE WHEN is_published = 1 THEN 0 ELSE 1 END WHERE id = ?')->execute([$id]);
    header('Location: articles.php?msg=updated');
    exit;
}

// SAVE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'title' => trim($_POST['title'] ?? ''),
        'slug' => trim($_POST['slug'] ?? ''),
        'excerpt' => trim($_POST['excerpt'] ?? ''),
        'content' => $_POST['content'] ?? '',
        'featured_image' => trim($_POST['featured_image'] ?? ''),
        'category' => $_POST['category'] ?? 'speech',
        'category_label' => trim($_POST['category_label'] ?? ''),
        'author' => trim($_POST['author'] ?? 'Clinical Team'),
        'meta_description' => trim($_POST['meta_description'] ?? ''),
        'meta_keywords' => trim($_POST['meta_keywords'] ?? ''),
        'read_time' => trim($_POST['read_time'] ?? '10 MIN READ'),
        'is_published' => isset($_POST['is_published']) ? 1 : 0,
        'published_date' => $_POST['published_date'] ?? date('Y-m-d'),
    ];

    // Auto-generate slug from title
    if (empty($data['slug'])) {
        $data['slug'] = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $data['title']));
        $data['slug'] = trim($data['slug'], '-');
    }

    // Handle image upload
    if (!empty($_FILES['image_file']['name'])) {
        $uploadDir = __DIR__ . '/../assets/';
        $filename = 'article_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['image_file']['name']);
        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadDir . $filename)) {
            $data['featured_image'] = $filename;
        }
    }

    $editId = intval($_POST['edit_id'] ?? 0);
    if ($editId > 0) {
        $stmt = $db->prepare('UPDATE articles SET title=?, slug=?, excerpt=?, content=?, featured_image=?, category=?, category_label=?, author=?, meta_description=?, meta_keywords=?, read_time=?, is_published=?, published_date=?, updated_at=CURRENT_TIMESTAMP WHERE id=?');
        $stmt->execute(array_merge(array_values($data), [$editId]));
        header('Location: articles.php?msg=updated');
    } else {
        $stmt = $db->prepare('INSERT INTO articles (title, slug, excerpt, content, featured_image, category, category_label, author, meta_description, meta_keywords, read_time, is_published, published_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->execute(array_values($data));
        header('Location: articles.php?msg=added');
    }
    exit;
}

if (isset($_GET['msg'])) {
    $msgs = ['added' => 'Article created!', 'updated' => 'Article updated!', 'deleted' => 'Article deleted.'];
    $message = $msgs[$_GET['msg']] ?? '';
    $msgType = $_GET['msg'] === 'deleted' ? 'error' : 'success';
}

$editData = null;
if ($action === 'edit' && $id > 0) {
    $stmt = $db->prepare('SELECT * FROM articles WHERE id = ?');
    $stmt->execute([$id]);
    $editData = $stmt->fetch();
}

require_once __DIR__ . '/includes/header.php';
?>

<?php if ($message): ?>
    <div class="toast toast-<?= $msgType ?>"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<?php if ($action === 'add' || $action === 'edit'): ?>
<div class="admin-card">
    <h3><i class="ri-<?= $action === 'edit' ? 'edit' : 'file-add' ?>-line"></i> <?= $action === 'edit' ? 'Edit' : 'New' ?> Article</h3>
    <form method="POST" class="admin-form" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?= $editData['id'] ?? 0 ?>">

        <div class="form-group">
            <label for="title">Article Title *</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($editData['title'] ?? '') ?>" required placeholder="Enter a compelling title">
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="slug">URL Slug (auto-generated if blank)</label>
                <input type="text" id="slug" name="slug" value="<?= htmlspecialchars($editData['slug'] ?? '') ?>" placeholder="e.g. gestalt-language-processing">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($editData['author'] ?? 'Clinical Team') ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt / Preview Text</label>
            <textarea id="excerpt" name="excerpt" style="min-height: 80px;" placeholder="Brief summary for blog cards..."><?= htmlspecialchars($editData['excerpt'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label for="content">Full Content (HTML)</label>
            <textarea id="content" name="content" style="min-height: 300px; font-family: monospace; font-size: 0.85rem;"><?= htmlspecialchars($editData['content'] ?? '') ?></textarea>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="featured_image">Featured Image Filename (in /assets/)</label>
                <input type="text" id="featured_image" name="featured_image" value="<?= htmlspecialchars($editData['featured_image'] ?? '') ?>" placeholder="e.g. article_image.png">
            </div>
            <div class="form-group">
                <label for="image_file">Or Upload Image</label>
                <input type="file" id="image_file" name="image_file" accept="image/*">
            </div>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="speech" <?= ($editData['category'] ?? '') === 'speech' ? 'selected' : '' ?>>Speech & Language</option>
                    <option value="ot" <?= ($editData['category'] ?? '') === 'ot' ? 'selected' : '' ?>>Occupational Therapy</option>
                    <option value="opt" <?= ($editData['category'] ?? '') === 'opt' ? 'selected' : '' ?>>Oral Placement Therapy</option>
                    <option value="parenting" <?= ($editData['category'] ?? '') === 'parenting' ? 'selected' : '' ?>>Parenting Tips</option>
                    <option value="lifestyle" <?= ($editData['category'] ?? '') === 'lifestyle' ? 'selected' : '' ?>>Lifestyle</option>
                    <option value="wellness" <?= ($editData['category'] ?? '') === 'wellness' ? 'selected' : '' ?>>Social Wellness</option>
                    <option value="child-dev" <?= ($editData['category'] ?? '') === 'child-dev' ? 'selected' : '' ?>>Child Development</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_label">Category Display Label</label>
                <input type="text" id="category_label" name="category_label" value="<?= htmlspecialchars($editData['category_label'] ?? '') ?>" placeholder="e.g. SPEECH & LANGUAGE">
            </div>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="read_time">Read Time</label>
                <input type="text" id="read_time" name="read_time" value="<?= htmlspecialchars($editData['read_time'] ?? '10 MIN READ') ?>">
            </div>
            <div class="form-group">
                <label for="published_date">Published Date</label>
                <input type="date" id="published_date" name="published_date" value="<?= htmlspecialchars($editData['published_date'] ?? date('Y-m-d')) ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="meta_description">SEO Meta Description</label>
            <textarea id="meta_description" name="meta_description" style="min-height: 60px;"><?= htmlspecialchars($editData['meta_description'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label for="meta_keywords">SEO Keywords (comma separated)</label>
            <input type="text" id="meta_keywords" name="meta_keywords" value="<?= htmlspecialchars($editData['meta_keywords'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" <?= ($editData['is_published'] ?? 1) ? 'checked' : '' ?>> Publish immediately
            </label>
        </div>

        <div class="admin-modal-actions" style="justify-content: flex-start;">
            <button type="submit" class="btn-admin btn-admin-primary"><i class="ri-save-line"></i> <?= $action === 'edit' ? 'Update' : 'Publish' ?> Article</button>
            <a href="articles.php" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>

<?php else: ?>
<div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
    <a href="articles.php?action=add" class="btn-admin btn-admin-primary"><i class="ri-file-add-line"></i> New Article</a>
</div>

<div class="admin-card">
    <h3><i class="ri-article-line"></i> All Articles</h3>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $articles = $db->query('SELECT * FROM articles ORDER BY published_date DESC, created_at DESC');
            while ($a = $articles->fetch()):
            ?>
            <tr>
                <td>
                    <?php if ($a['featured_image']): ?>
                        <img src="../assets/<?= htmlspecialchars($a['featured_image']) ?>" alt="" class="thumb">
                    <?php else: ?>
                        <div class="thumb" style="background: #e6f4f4; display:flex; align-items:center; justify-content:center;"><i class="ri-article-line" style="color:#3d878a;"></i></div>
                    <?php endif; ?>
                </td>
                <td>
                    <strong><?= htmlspecialchars($a['title']) ?></strong><br>
                    <small style="color: #527c7e;">/article.php?slug=<?= htmlspecialchars($a['slug']) ?></small>
                </td>
                <td><span class="badge badge-info"><?= htmlspecialchars($a['category_label']) ?></span></td>
                <td><?= $a['is_published'] ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-warning">Draft</span>' ?></td>
                <td><?= htmlspecialchars($a['published_date']) ?></td>
                <td>
                    <div class="action-btns">
                        <a href="articles.php?action=edit&id=<?= $a['id'] ?>" class="btn-admin btn-admin-outline btn-admin-sm" title="Edit"><i class="ri-edit-line"></i></a>
                        <a href="articles.php?action=toggle&id=<?= $a['id'] ?>" class="btn-admin btn-admin-outline btn-admin-sm" title="Toggle Publish"><i class="ri-toggle-line"></i></a>
                        <a href="articles.php?action=delete&id=<?= $a['id'] ?>" class="btn-admin btn-admin-danger btn-admin-sm" onclick="return confirm('Delete this article?')" title="Delete"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
