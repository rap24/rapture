<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

$db = getDB();
$admin_page = 'therapists';
$admin_title = 'Manage Therapists';
$message = '';
$msgType = '';

// Handle actions
$action = $_GET['action'] ?? 'list';
$id = intval($_GET['id'] ?? 0);

// DELETE
if ($action === 'delete' && $id > 0) {
    $db->prepare('DELETE FROM therapists WHERE id = ?')->execute([$id]);
    header('Location: therapists.php?msg=deleted');
    exit;
}

// SAVE (Add or Edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => trim($_POST['name'] ?? ''),
        'credential' => trim($_POST['credential'] ?? ''),
        'bio' => trim($_POST['bio'] ?? ''),
        'photo' => trim($_POST['photo'] ?? ''),
        'category' => $_POST['category'] ?? 'speech',
        'specialties' => trim($_POST['specialties'] ?? ''),
        'rating' => floatval($_POST['rating'] ?? 5.0),
        'is_available' => isset($_POST['is_available']) ? 1 : 0,
        'is_founder' => isset($_POST['is_founder']) ? 1 : 0,
        'founder_label' => trim($_POST['founder_label'] ?? ''),
        'sort_order' => intval($_POST['sort_order'] ?? 0),
    ];

    // Handle image upload
    if (!empty($_FILES['photo_file']['name'])) {
        $uploadDir = __DIR__ . '/../assets/';
        $filename = 'therapist_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['photo_file']['name']);
        if (move_uploaded_file($_FILES['photo_file']['tmp_name'], $uploadDir . $filename)) {
            $data['photo'] = $filename;
        }
    }

    $editId = intval($_POST['edit_id'] ?? 0);
    if ($editId > 0) {
        $stmt = $db->prepare('UPDATE therapists SET name=?, credential=?, bio=?, photo=?, category=?, specialties=?, rating=?, is_available=?, is_founder=?, founder_label=?, sort_order=? WHERE id=?');
        $stmt->execute(array_merge(array_values($data), [$editId]));
        header('Location: therapists.php?msg=updated');
    } else {
        $stmt = $db->prepare('INSERT INTO therapists (name, credential, bio, photo, category, specialties, rating, is_available, is_founder, founder_label, sort_order) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->execute(array_values($data));
        header('Location: therapists.php?msg=added');
    }
    exit;
}

// Toast messages
if (isset($_GET['msg'])) {
    $msgs = ['added' => 'Therapist added successfully!', 'updated' => 'Therapist updated!', 'deleted' => 'Therapist deleted.'];
    $message = $msgs[$_GET['msg']] ?? '';
    $msgType = $_GET['msg'] === 'deleted' ? 'error' : 'success';
}

// Load for edit
$editData = null;
if ($action === 'edit' && $id > 0) {
    $stmt = $db->prepare('SELECT * FROM therapists WHERE id = ?');
    $stmt->execute([$id]);
    $editData = $stmt->fetch();
}

require_once __DIR__ . '/includes/header.php';
?>

<?php if ($message): ?>
    <div class="toast toast-<?= $msgType ?>"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<?php if ($action === 'add' || $action === 'edit'): ?>
<!-- ADD/EDIT FORM -->
<div class="admin-card">
    <h3><i class="ri-<?= $action === 'edit' ? 'edit' : 'user-add' ?>-line"></i> <?= $action === 'edit' ? 'Edit' : 'Add' ?> Therapist</h3>
    <form method="POST" class="admin-form" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" value="<?= $editData['id'] ?? 0 ?>">
        
        <div class="form-row-admin">
            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($editData['name'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="credential">Credential / Title</label>
                <input type="text" id="credential" name="credential" value="<?= htmlspecialchars($editData['credential'] ?? '') ?>" placeholder="e.g. B.Sc SLP (Speech & Hearing)">
            </div>
        </div>

        <div class="form-group">
            <label for="bio">Bio / Description</label>
            <textarea id="bio" name="bio" placeholder="Brief professional biography..."><?= htmlspecialchars($editData['bio'] ?? '') ?></textarea>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="photo">Photo Filename (in /assets/)</label>
                <input type="text" id="photo" name="photo" value="<?= htmlspecialchars($editData['photo'] ?? '') ?>" placeholder="e.g. therapist_photo.png">
            </div>
            <div class="form-group">
                <label for="photo_file">Or Upload Photo</label>
                <input type="file" id="photo_file" name="photo_file" accept="image/*">
            </div>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="speech" <?= ($editData['category'] ?? '') === 'speech' ? 'selected' : '' ?>>Speech & Language</option>
                    <option value="ot" <?= ($editData['category'] ?? '') === 'ot' ? 'selected' : '' ?>>Occupational Therapy</option>
                    <option value="education" <?= ($editData['category'] ?? '') === 'education' ? 'selected' : '' ?>>Special Education</option>
                    <option value="physio" <?= ($editData['category'] ?? '') === 'physio' ? 'selected' : '' ?>>Physiotherapy</option>
                </select>
            </div>
            <div class="form-group">
                <label for="specialties">Specialties (comma separated)</label>
                <input type="text" id="specialties" name="specialties" value="<?= htmlspecialchars($editData['specialties'] ?? '') ?>" placeholder="e.g. Pediatric Speech, Autism, ADHD">
            </div>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" id="rating" name="rating" value="<?= htmlspecialchars($editData['rating'] ?? '5.0') ?>" min="0" max="5" step="0.1">
            </div>
            <div class="form-group">
                <label for="sort_order">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="<?= htmlspecialchars($editData['sort_order'] ?? '0') ?>">
            </div>
        </div>

        <div class="form-row-admin">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_available" <?= ($editData['is_available'] ?? 1) ? 'checked' : '' ?>> Currently Available
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_founder" <?= ($editData['is_founder'] ?? 0) ? 'checked' : '' ?>> Founder / Leadership
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="founder_label">Founder Label (if applicable)</label>
            <input type="text" id="founder_label" name="founder_label" value="<?= htmlspecialchars($editData['founder_label'] ?? '') ?>" placeholder="e.g. Founder & Senior Therapist">
        </div>

        <div class="admin-modal-actions" style="justify-content: flex-start;">
            <button type="submit" class="btn-admin btn-admin-primary"><i class="ri-save-line"></i> <?= $action === 'edit' ? 'Update' : 'Add' ?> Therapist</button>
            <a href="therapists.php" class="btn-admin btn-admin-outline">Cancel</a>
        </div>
    </form>
</div>

<?php else: ?>
<!-- LIST VIEW -->
<div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
    <a href="therapists.php?action=add" class="btn-admin btn-admin-primary"><i class="ri-user-add-line"></i> Add Therapist</a>
</div>

<div class="admin-card">
    <h3><i class="ri-user-heart-line"></i> All Therapists</h3>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $therapists = $db->query('SELECT * FROM therapists ORDER BY sort_order ASC, name ASC');
            while ($t = $therapists->fetch()):
                $catLabels = ['speech' => 'Speech', 'ot' => 'OT', 'education' => 'Education', 'physio' => 'Physio'];
            ?>
            <tr>
                <td>
                    <?php if ($t['photo']): ?>
                        <img src="../assets/<?= htmlspecialchars($t['photo']) ?>" alt="" class="thumb">
                    <?php else: ?>
                        <div class="thumb" style="background: #e6f4f4; display:flex; align-items:center; justify-content:center; color:#3d878a; font-weight:700; font-size:0.8rem;"><?= strtoupper(substr($t['name'], 0, 2)) ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <strong><?= htmlspecialchars($t['name']) ?></strong><br>
                    <small style="color: #527c7e;"><?= htmlspecialchars($t['credential']) ?></small>
                </td>
                <td><span class="badge badge-info"><?= $catLabels[$t['category']] ?? $t['category'] ?></span></td>
                <td><?= $t['is_available'] ? '<span class="badge badge-success">Available</span>' : '<span class="badge badge-danger">Unavailable</span>' ?></td>
                <td><?= $t['is_founder'] ? '<span class="badge badge-warning">Founder</span>' : 'Team' ?></td>
                <td>
                    <div class="action-btns">
                        <a href="therapists.php?action=edit&id=<?= $t['id'] ?>" class="btn-admin btn-admin-outline btn-admin-sm"><i class="ri-edit-line"></i></a>
                        <a href="therapists.php?action=delete&id=<?= $t['id'] ?>" class="btn-admin btn-admin-danger btn-admin-sm" onclick="return confirm('Delete this therapist?')"><i class="ri-delete-bin-line"></i></a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
