<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    $db = getDB();
    $stmt = $db->prepare('SELECT * FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    
    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Rapture Therapy Centre</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap');
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #0c1819 0%, #122425 50%, #1d3b3c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at 30% 20%, rgba(61, 135, 138, 0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 70% 80%, rgba(7, 108, 24, 0.1) 0%, transparent 50%);
            animation: bgFloat 20s ease-in-out infinite;
        }
        @keyframes bgFloat {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-2%, -2%) rotate(2deg); }
        }
        .login-card {
            position: relative;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 28px;
            padding: 48px 44px;
            width: 420px;
            max-width: 92vw;
            box-shadow: 
                inset 0 1px 0 0 rgba(255, 255, 255, 0.15),
                0 32px 80px rgba(0, 0, 0, 0.4);
        }
        .login-brand {
            text-align: center;
            margin-bottom: 36px;
        }
        .login-brand img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 2px solid rgba(142, 187, 189, 0.3);
            margin-bottom: 16px;
        }
        .login-brand h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: #e8f4f4;
            letter-spacing: -0.04em;
        }
        .login-brand p {
            font-size: 0.9rem;
            color: #8ebbbd;
            margin-top: 6px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            font-weight: 700;
            font-size: 0.8rem;
            color: #8ebbbd;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .form-group input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.07);
            border: 1.5px solid rgba(142, 187, 189, 0.2);
            border-radius: 14px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            color: #e8f4f4;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: #3d878a;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 4px rgba(61, 135, 138, 0.15);
        }
        .form-group input::placeholder { color: rgba(142, 187, 189, 0.5); }
        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 100%), #3d878a;
            color: #fff;
            border: none;
            border-radius: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.2), 0 4px 16px rgba(61, 135, 138, 0.3);
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.25), 0 8px 28px rgba(61, 135, 138, 0.4);
        }
        .error-msg {
            background: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff6b7a;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.88rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-brand">
            <img src="../assets/logo.png" alt="Rapture">
            <h1>Rapture Admin</h1>
            <p>Sign in to manage your website</p>
        </div>

        <?php if ($error): ?>
            <div class="error-msg"><i class="ri-error-warning-line"></i> <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn">Sign In <i class="ri-arrow-right-line"></i></button>
        </form>
    </div>
</body>
</html>
