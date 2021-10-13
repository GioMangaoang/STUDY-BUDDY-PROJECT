<?php
header('Content-Type: application/json');

include("database.php");

$stmt = $db->prepare("SELECT event_title, event_text FROM lms_events");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);



?>