<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging out...</title>
    <script>
        // Clear localStorage for admin login persistence
        localStorage.removeItem('kyc_admin_logged_in');

        // Redirect to login page
        window.location.href = "admin_login.php";
    </script>
</head>
<body>
    <p style="text-align:center; font-family:sans-serif;">Logging out...</p>
</body>
</html>
