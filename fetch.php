<?php
require 'db.php';

$user_id = 1;

$stmt = $conn->prepare("
    SELECT projects.name AS project_name, tasks.*
    FROM projects
    JOIN tasks ON projects.id = tasks.project_id
    WHERE projects.user_id = ?
");

$stmt->execute([$user_id]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo "Project: " . $row['project_name'] . "<br>";
    echo "➡ Task: " . $row['name'] . " (" . $row['status'] . ")<br><br>";
}
?>