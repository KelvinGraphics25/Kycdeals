<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $role = "user"; // default role

    if (!preg_match('/^(07|01|\+254)[0-9]{8}$/', $phone)) {
        $error = "Invalid WhatsApp number format.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $file = 'members.json';
        $members = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        foreach ($members as $member) {
            if ($member['phone'] === $phone) {
                $error = "WhatsApp number already exists.";
                break;
            }
        }

        if (!isset($error)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $members[] = ['phone' => $phone, 'password' => $hashed, 'role' => $role];
            file_put_contents($file, json_encode($members, JSON_PRETTY_PRINT));
            header("Location: login.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - KYC Deals</title>
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
    <h2>Sign Up</h2>
    <?php if (isset($error)) echo "<p class='message'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="phone" placeholder="WhatsApp Number" required>
      <input type="password" name="password" placeholder="Password (min 6 chars)" required>
      <button type="submit">Register</button>
    </form>
    <a class="link" href="login.php">Already have an account? Login</a>
  </div>
</body>
</html>
