<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $project_name = $_POST['project_name'];
    $user_id = 1;

    $stmt = $conn->prepare("INSERT INTO projects (name, user_id) VALUES (?, ?)");
    $stmt->execute([$project_name, $user_id]);

    echo "Project added successfully";
}
?>