<?php
// Extend session lifetime to 30 days
$cookie_lifetime = 60 * 60 * 24 * 30; // 30 days
session_set_cookie_params([
    'lifetime' => $cookie_lifetime,
    'path' => '/',
    'domain' => '',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Lax'
]);

session_start();

// Redirect if already logged in
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header("Location: admin_dashboard.php");
    exit();
}

// Hardcoded credentials (plain text)
$admin_whatsapp = "admin";
$admin_password_plain = "adminKYC25";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_whatsapp = trim($_POST['whatsapp']);
    $input_password = $_POST['password'];

    if ($input_whatsapp === $admin_whatsapp && $input_password === $admin_password_plain) {
        session_regenerate_id(true);
        $_SESSION['admin'] = true;
        $_SESSION['admin_login_time'] = date("d F Y, h:i A");

        echo "<script>
            localStorage.setItem('kyc_admin_logged_in', 'true');
            window.location.href = 'admin_dashboard.php';
        </script>";
        exit();
    } else {
        $error = "Invalid admin credentials!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - KYC Deals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: #000;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 15px;
            margin: 0;
        }
        form {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.05);
            padding: 30px 20px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #0ff;
            color: #000;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #00cccc;
        }
        .error {
            color: #ff4c4c;
            text-align: center;
            margin-top: 10px;
            font-size: 0.95rem;
        }

        @media (max-width: 400px) {
            form {
                padding: 20px 15px;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<form method="POST">
    <h2>Admin Login</h2>
    <input type="text" name="whatsapp" placeholder="ADMIN ID" required />
    <input type="password" name="password" placeholder="SECRET KEY" required />
    <button type="submit">Login</button>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</form>


<script>
// Check localStorage to auto-login admin
if (localStorage.getItem('kyc_admin_logged_in') === 'true') {
    window.location.href = "admin_dashboard.php";
}
</script>

</body>
</html>
