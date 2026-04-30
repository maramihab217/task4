<?php
require 'db.php';

$user_id = $_GET['user_id'];
$priority = $_GET['priority'];

$stmt = $conn->prepare("
    SELECT tasks.*
    FROM tasks
    JOIN projects ON tasks.project_id = projects.id
    WHERE projects.user_id = ?
    AND tasks.priority = ?
    AND tasks.archived = 0
");

$stmt->execute([$user_id, $priority]);

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($tasks as $task) {
    echo "okay" . $task['name'] . " - " . $task['priority'] . "<br>";
}
?>