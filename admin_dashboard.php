<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Set time to Kenya (Nairobi)
date_default_timezone_set("Africa/Nairobi");

$tasksFile = "tasks.json";
$tasks = [];

if (file_exists($tasksFile)) {
    $content = file_get_contents($tasksFile);
    $tasks = json_decode($content, true);
}

// Handle task posting
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $newTask = [
        "text" => $_POST['task'],
        "status" => "active",
        "time" => date("Y-m-d H:i:s") // Kenyan time
    ];
    array_unshift($tasks, $newTask);
    file_put_contents($tasksFile, json_encode($tasks, JSON_PRETTY_PRINT));
    header("Location: admin_dashboard.php");
    exit();
}

// Mark as expired
if (isset($_GET['expire'])) {
    $index = $_GET['expire'];
    if (isset($tasks[$index])) {
        $tasks[$index]['status'] = 'expired';
        file_put_contents($tasksFile, json_encode($tasks, JSON_PRETTY_PRINT));
        header("Location: admin_dashboard.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<div style="text-align:right; margin-bottom:10px;">
  <a href="admin_logout.php" style="color: #0ff; font-weight: bold;">Logout</a>
</div>

    <meta charset="UTF-8">
    <title>Admin Dashboard - KYC Deals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #0f0f0f;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }
        h2 { text-align: center; }
        form {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            resize: vertical;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        button {
            background: #0ff;
            color: #000;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .task {
            background: rgba(255,255,255,0.05);
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        .task.expired {
            opacity: 0.5;
            text-decoration: line-through;
        }
        .task small {
            display: block;
            font-size: 0.8em;
            color: #aaa;
        }

        @media (max-width: 600px) {
            body { padding: 10px; }
            textarea { font-size: 14px; }
        }
    </style>
</head>
<body>

<h2>Admin Dashboard</h2>

<form method="POST">
    <label for="task">Post New Task:</label>
    <textarea name="task" rows="3" required></textarea>
    <button type="submit">Post Task</button>
</form>

<h3>All Tasks</h3>

<?php foreach ($tasks as $index => $task): ?>
    <div class="task <?= $task['status'] === 'expired' ? 'expired' : '' ?>">
        <?= htmlspecialchars($task['text']) ?>
        <small>Posted on: <?= $task['time'] ?></small>
        <?php if ($task['status'] === 'active'): ?>
            <a href="?expire=<?= $index ?>"><button>Mark as Expired</button></a>
        <?php else: ?>
            <em>Expired</em>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>
