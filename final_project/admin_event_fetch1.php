<?php
header('Content-Type: application/json');

include("database.php");

$title = $_POST['event_title'];
$text = $_POST['event_text'];
$stmt = $db->prepare("INSERT INTO lms_events (event_title, event_text) VALUES (?, ?)");
$result = $stmt->execute([$title, $text]);

if($result){
    echo json_encode([
    'code' => '201'
    ]);
}



?>