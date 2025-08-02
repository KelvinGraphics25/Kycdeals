<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // Redirect to user login page
exit();
