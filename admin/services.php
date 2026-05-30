<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

$db = getDB();
$admin_page = 'services';
$admin_title = 'Manage Services';
$message = '';
$msgType = '';

$action = $_GET['action'] ?? 'list';
$id = intval($_GET['id'] ?? 0);

// DELETE
if ($action === 'delete' && $id > 0) {
    $db->prepare('DELETE FROM services WHERE id = ?')->execute([$id]);
    header('Location: services.php?msg=deleted');
    exit;
}

// SAVE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'title' => trim($_POST['title'] ?? ''),
        'slug' => trim($_POST['slug'] ?? ''),
        'badge_text' => trim($_POST['badge_text'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'sub_sections' => $_POST['sub_sections'] ?? '[]',
        'conditions_list' => $_POST['conditions_list'] ?? '[]',
        'red_flags' => $_POST['red_flags'] ?? '[]',
        'card_title' => trim($_POST['card_title'] ?? ''),
        'icon' => trim($_POST['icon'] ?? 'ri-heart-pulse-line'),
        'category_color' => $_POST['category_color'] ?? 'speech',
        'sort_order' => intval($_POST['sort_order'] ?? 0),
    ];

    if (empty($data['slug'])) {
        $data['slug'] = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $data['title']));
        $data['slug'] = trim($data['slug'], '-');
    }

    $editId = intval($_POST['edit_id'] ?? 0);
    if ($editId > 0) {
        $stmt = $db->prepare('UPDATE services SET title=?, slug=?, badge_text=?, description=?, sub_sections=?, conditions_list=?, red_flags=?, card_title=?, icon=?, category_color=?, sort_order=? WHERE id=?');
        $stmt->execute(array_merge(array_values($data), [$editId]));
        header('Location: services.php?msg=updated');
    } else {
        $stmt = $db->prepare('INSERT INTO services (title, slug, badge_text, description, sub_sections, conditions_list, red_flags, card_title, icon, category_color, sort_order) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->execute(array_values($data));
        header('Location: services.php?msg=added');
    }
    exit;
}

if (isset($_GET['msg'])) {
    $msgs = ['added' => 'Service added!', 'updated' => 'Service updated!', 'deleted' => 'Service deleted.'];
    $message = $msgs[$_GET['msg']] ?? '';
    $msgType = $_GET['msg'] === 'deleted' ? 'error' : 'success';
}

$editData = null;
if ($action === 'edit' && $id > 0) {
    $stmt = $db->prepare('SELECT * FROM services WHERE id = ?');
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
    <h3><i class="ri-<?= $action === 'edit' ? 'edit' : 'add-circle' ?>-line"></i> <?= $action === 'edit' ? 'Edit' : 'Add' ?> Service</h3>
    <form method="POST" class="admin-form">
        <input type="hidden" name="edit_id" value="<?= $editData['id'] ?? 0 ?>">

        <div class="form-row-admin">
            <div class="form-group">
                <label for="title">Service Title *</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($editData['title'] ?? '') ?>" required placeholder="e.g. Speech & Language Therapy">
            </div>
            <div class="form-group">
                <label for="slug">URL Slug</label>
                <input type="text" id="slug" name="slug" value="<?= htmlspecialchars($editData['slug'] ?? '') ?>" placeholder="Auto-generated if blank">
            </div>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="badge_text">Badge Text</label>
                <input type="text" id="badge_text" name="badge_text" value="<?= htmlspecialchars($editData['badge_text'] ?? '') ?>" placeholder="e.g. SLP Specialties">
            </div>
            <div class="form-group">
                <label for="card_title">Card Title</label>
                <input type="text" id="card_title" name="card_title" value="<?= htmlspecialchars($editData['card_title'] ?? '') ?>" placeholder="Short card heading">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"><?= htmlspecialchars($editData['description'] ?? '') ?></textarea>
        </div>

        <div class="form-group">
            <label for="sub_sections">Sub-Sections (JSON array: [{"title":"...","content":"..."}])</label>
            <textarea id="sub_sections" name="sub_sections" style="font-family: monospace; font-size: 0.85rem;"><?= htmlspecialchars($editData['sub_sections'] ?? '[]') ?></textarea>
        </div>

        <div class="form-group">
            <label for="conditions_list">Conditions List (JSON array: ["item1","item2"])</label>
            <textarea id="conditions_list" name="conditions_list" style="font-family: monospace; font-size: 0.85rem;"><?= htmlspecialchars($editData['conditions_list'] ?? '[]') ?></textarea>
        </div>

        <div class="form-group">
            <label for="red_flags">Red Flags (JSON array: ["flag1","flag2"])</label>
            <textarea id="red_flags" name="red_flags" style="font-family: monospace; font-size: 0.85rem;"><?= htmlspecialchars($editData['red_flags'] ?? '[]') ?></textarea>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="icon">Remix Icon Class</label>
                <input type="text" id="icon" name="icon" value="<?= htmlspecialchars($editData['icon'] ?? 'ri-heart-pulse-line') ?>" placeholder="ri-heart-pulse-line">
            </div>
            <div class="form-group">
                <label for="category_color">Category Color</label>
                <select id="category_color" name="category_color">
                    <option value="speech" <?= ($editData['category_color'] ?? '') === 'speech' ? 'selected' : '' ?>>Speech (Teal)</option>
                    <option value="occupational" <?= ($editData['category_color'] ?? '') === 'occupational' ? 'selected' : '' ?>>Occupational (Green)</option>
                    <option value="education" <?= ($editData['category_color'] ?? '') === 'education' ? 'selected' : '' ?>>Education (Purple)</option>
                    <option value="physio" <?= ($editData['category_color'] ?? '') === 'physio' ? 'selected' : '' ?>>Physio (Blue)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="sort_order">Sort Order</label>
            <input type="number" id="sort_order" name="sort_order" value="<?= htmlspecialchars($editData['sort_order'] ?? '0') ?>">
        </div>

        <div class="admin-modal-actions" style="justify-content: flex-start;">
            <button type="submit" class="btn-admin btn-admin-primary"><i class="ri-save-line"></i> <?= $action === 'edit' ? 'Update' : 'Add' ?> Service</button>
            <a href="services.php" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>

<?php else: ?>
<div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
    <a href="services.php?action=add" class="btn-admin btn-admin-primary"><i class="ri-add-circle-line"></i> Add Service</a>
</div>

<div class="admin-card">
    <h3><i class="ri-service-line"></i> All Services</h3>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Title</th>
                <th>Badge</th>
                <th>Category</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $services = $db->query('SELECT * FROM services ORDER BY sort_order ASC');
            while ($s = $services->fetch()):
            ?>
            <tr>
                <td><i class="<?= htmlspecialchars($s['icon']) ?>" style="font-size: 1.4rem; color: #3d878a;"></i></td>
                <td><strong><?= htmlspecialchars($s['title']) ?></strong></td>
                <td><span class="badge badge-info"><?= htmlspecialchars($s['badge_text']) ?></span></td>
                <td><?= htmlspecialchars($s['category_color']) ?></td>
                <td><?= $s['sort_order'] ?></td>
                <td>
                    <div class="action-btns">
                        <a href="services.php?action=edit&id=<?= $s['id'] ?>" class="btn-admin btn-admin-outline btn-admin-sm"><i class="ri-edit-line"></i></a>
                        <a href="services.php?action=delete&id=<?= $s['id'] ?>" class="btn-admin btn-admin-danger btn-admin-sm" onclick="return confirm('Delete this service?')"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
