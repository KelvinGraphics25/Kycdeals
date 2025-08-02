<?php
// ✅ Move this to the top, BEFORE session_start
$lifetime = 60 * 60 * 24 * 30; // 30 days
session_set_cookie_params([
    'lifetime' => $lifetime,
    'path' => '/',
    'domain' => '', // default to current
    'secure' => true, // set to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Lax'
]);

session_start();
date_default_timezone_set("Africa/Nairobi");

// ✅ If already logged in, redirect to correct dashboard
if (isset($_SESSION['phone']) && isset($_SESSION['role'])) {
    echo "<script>
        localStorage.setItem('kyc_user_logged_in', 'true');
        window.location.href = '" . ($_SESSION['role'] === 'admin' ? 'admin.php' : 'dashboard.php') . "';
    </script>";
    exit();
}

// ✅ Login processing
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];

    $file = 'members.json';
    $members = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach ($members as $member) {
        if ($member['phone'] === $phone && password_verify($password, $member['password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['phone'] = $phone;
            $_SESSION['role'] = $member['role'];
            $_SESSION['login_time'] = date("d F Y, h:i A");

            // ✅ Set localStorage for PWA to remember login
            echo "<script>
                localStorage.setItem('kyc_user_logged_in', 'true');
                window.location.href = '" . ($member['role'] === 'admin' ? 'admin.php' : 'dashboard.php') . "';
            </script>";
            exit();
        }
    }

    $error = "Invalid phone number or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - KYC Deals</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #000;
      font-family: 'Segoe UI', sans-serif;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .form-container {
      background: #111;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px #00bfff55;
      max-width: 400px;
      width: 100%;
    }
    h2 {
      text-align: center;
      color: #00bfff;
      margin-bottom: 20px;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background: #222;
      color: white;
    }
    button {
      width: 100%;
      padding: 12px;
      background: transparent;
      border: 2px solid #00bfff;
      color: #00bfff;
      font-weight: bold;
      border-radius: 30px;
      transition: 0.3s;
      cursor: pointer;
      box-shadow: 0 0 10px #00bfff, 0 0 20px #00bfff3a;
    }
    button:hover {
      background: #00bfff;
      color: black;
    }
    .message {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
    .link {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #00bfff;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p class='message'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="phone" placeholder="WhatsApp Number" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <a class="link" href="signup.php">Don't have an account? Sign up</a>
  </div>

  <script>
  // Optional: log the user login flag to debug
  console.log("Login flag:", localStorage.getItem("kyc_user_logged_in"));
</script>

</body>
</html>
