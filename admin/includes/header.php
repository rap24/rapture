<?php
/**
 * Admin Dashboard Header — Sidebar Navigation
 */
if (!isset($admin_page)) $admin_page = 'dashboard';
if (!isset($admin_title)) $admin_title = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($admin_title) ?> — Rapture Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap');
        
        :root {
            --primary: #3d878a;
            --primary-light: #f0f8f8;
            --primary-medium: #54a6a9;
            --text-dark: #1d3b3c;
            --text-muted: #527c7e;
            --sidebar-bg: #0c1819;
            --sidebar-hover: #122425;
            --card-bg: #ffffff;
            --body-bg: #f4f9f9;
            --success: #076c18;
            --danger: #dc3545;
            --warning: #ffb547;
            --border: #e2eced;
            --shadow: 0 2px 12px rgba(61, 135, 138, 0.08);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--body-bg);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            padding: 24px 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 24px 28px;
            border-bottom: 1px solid rgba(142, 187, 189, 0.12);
            margin-bottom: 20px;
            text-decoration: none;
        }

        .sidebar-brand img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(142, 187, 189, 0.2);
        }

        .sidebar-brand-text {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 900;
            font-size: 1.2rem;
            color: #e8f4f4;
            letter-spacing: -0.03em;
        }

        .sidebar-brand-sub {
            display: block;
            font-size: 0.65rem;
            color: #8ebbbd;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar-nav { list-style: none; flex: 1; }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 24px;
            color: #8ebbbd;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav li a:hover {
            background: var(--sidebar-hover);
            color: #e8f4f4;
        }

        .sidebar-nav li a.active {
            background: var(--sidebar-hover);
            color: #e8f4f4;
            border-left-color: var(--primary-medium);
        }

        .sidebar-nav li a i {
            font-size: 1.2rem;
            width: 22px;
            text-align: center;
        }

        .sidebar-section {
            padding: 16px 24px 8px;
            font-size: 0.7rem;
            color: #527c7e;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .sidebar-bottom {
            padding: 16px 24px;
            border-top: 1px solid rgba(142, 187, 189, 0.12);
            margin-top: auto;
        }

        .sidebar-bottom a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #8ebbbd;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 8px 0;
            transition: color 0.2s;
        }

        .sidebar-bottom a:hover { color: #dc3545; }

        /* Main Content */
        .admin-main {
            margin-left: 260px;
            flex: 1;
            padding: 32px 40px;
            min-height: 100vh;
        }

        .admin-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .admin-topbar h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--text-dark);
            letter-spacing: -0.03em;
        }

        .admin-topbar .breadcrumb {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .admin-topbar .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        /* Cards */
        .admin-card {
            background: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 28px;
            margin-bottom: 24px;
        }

        .admin-card h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        /* Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(61, 135, 138, 0.12);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .stat-icon.teal { background: #e6f4f4; color: #3d878a; }
        .stat-icon.green { background: #e8f5e9; color: #076c18; }
        .stat-icon.gold { background: #fff8e1; color: #f59e0b; }
        .stat-icon.blue { background: #e3f2fd; color: #1976d2; }

        .stat-value {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-dark);
            letter-spacing: -0.04em;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-top: 4px;
        }

        /* Table */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th {
            text-align: left;
            padding: 12px 16px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            font-weight: 700;
            border-bottom: 2px solid var(--border);
        }

        .admin-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
            font-size: 0.92rem;
            vertical-align: middle;
        }

        .admin-table tr:hover td {
            background: var(--primary-light);
        }

        .admin-table .thumb {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            object-fit: cover;
        }

        /* Buttons */
        .btn-admin {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 0.88rem;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-admin-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-admin-primary:hover {
            background: var(--primary-medium);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(61, 135, 138, 0.25);
        }

        .btn-admin-outline {
            background: transparent;
            color: var(--primary);
            border: 1.5px solid var(--border);
        }

        .btn-admin-outline:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .btn-admin-danger {
            background: transparent;
            color: var(--danger);
            border: 1.5px solid #fce4e4;
        }

        .btn-admin-danger:hover {
            background: #fce4e4;
        }

        .btn-admin-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 8px;
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        /* Status badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .badge-success { background: #e8f5e9; color: #076c18; }
        .badge-warning { background: #fff8e1; color: #f59e0b; }
        .badge-danger { background: #fce4e4; color: #dc3545; }
        .badge-info { background: #e6f4f4; color: #3d878a; }

        /* Forms */
        .admin-form .form-group {
            margin-bottom: 20px;
        }

        .admin-form label {
            display: block;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .admin-form input,
        .admin-form select,
        .admin-form textarea {
            width: 100%;
            padding: 11px 16px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.92rem;
            color: var(--text-dark);
            background: #fff;
            transition: border-color 0.2s;
        }

        .admin-form input:focus,
        .admin-form select:focus,
        .admin-form textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(61, 135, 138, 0.1);
        }

        .admin-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row-admin {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        /* Toast notifications */
        .toast {
            position: fixed;
            top: 24px;
            right: 24px;
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 9999;
            animation: slideIn 0.3s ease;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .toast-success { background: #076c18; color: #fff; }
        .toast-error { background: #dc3545; color: #fff; }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Modal */
        .admin-modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(12, 24, 25, 0.6);
            backdrop-filter: blur(4px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .admin-modal-overlay.active { display: flex; }

        .admin-modal {
            background: #fff;
            border-radius: 20px;
            padding: 36px;
            width: 90%;
            max-width: 600px;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 24px 80px rgba(0,0,0,0.2);
        }

        .admin-modal h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.4rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 24px;
        }

        .admin-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        /* Quick actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .quick-action-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 20px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            transition: all 0.2s;
        }

        .quick-action-card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(61, 135, 138, 0.12);
        }

        .quick-action-card i {
            font-size: 1.3rem;
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .admin-sidebar { width: 220px; }
            .admin-main { margin-left: 220px; padding: 20px; }
            .form-row-admin { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <aside class="admin-sidebar">
        <a href="../index.php" class="sidebar-brand" target="_blank">
            <img src="../assets/logo.png" alt="Rapture">
            <div>
                <span class="sidebar-brand-text">Rapture</span>
                <span class="sidebar-brand-sub">Admin Panel</span>
            </div>
        </a>

        <div class="sidebar-section">Main</div>
        <ul class="sidebar-nav">
            <li><a href="index.php" class="<?= $admin_page === 'dashboard' ? 'active' : '' ?>"><i class="ri-dashboard-3-line"></i> Dashboard</a></li>
        </ul>

        <div class="sidebar-section">Content Management</div>
        <ul class="sidebar-nav">
            <li><a href="therapists.php" class="<?= $admin_page === 'therapists' ? 'active' : '' ?>"><i class="ri-user-heart-line"></i> Therapists</a></li>
            <li><a href="articles.php" class="<?= $admin_page === 'articles' ? 'active' : '' ?>"><i class="ri-article-line"></i> Articles</a></li>
            <li><a href="services.php" class="<?= $admin_page === 'services' ? 'active' : '' ?>"><i class="ri-service-line"></i> Services</a></li>
        </ul>

        <div class="sidebar-bottom">
            <a href="../index.php" target="_blank"><i class="ri-external-link-line"></i> View Site</a>
            <a href="logout.php"><i class="ri-logout-box-line"></i> Logout</a>
        </div>
    </aside>

    <main class="admin-main">
        <div class="admin-topbar">
            <div>
                <h1><?= htmlspecialchars($admin_title) ?></h1>
                <div class="breadcrumb">
                    <a href="index.php">Admin</a> / <?= htmlspecialchars($admin_title) ?>
                </div>
            </div>
        </div>
