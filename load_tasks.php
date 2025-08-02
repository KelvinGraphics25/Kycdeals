<?php
$tasksFile = "tasks.json";
$tasks = [];

if (file_exists($tasksFile)) {
    $content = file_get_contents($tasksFile);
    $tasks = json_decode($content, true);
}

header('Content-Type: application/json');
echo json_encode($tasks);
