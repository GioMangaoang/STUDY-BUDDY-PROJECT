<?php
header('Content-Type: application/json');

include("database.php");

$title = $_POST['appointment_title'];
$text = $_POST['appointment_text'];
$email = $_POST['email'];
$stmt = $db->prepare("INSERT INTO lms_sched (appointment_title, appointment_text, email) VALUES (?, ?, ?)");
$result = $stmt->execute([$title, $text, $email]);

if($result){
    echo json_encode([
    'code' => '201'
    ]);
}
?>