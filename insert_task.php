<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("
        INSERT INTO tasks 
        (name, description, start_date, end_date, priority, category, status, archived, project_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['priority'],
        $_POST['category'],
        $_POST['status'],
        $_POST['archived'],
        2
    ]);

    echo "Task added successfully";
}
?>