<?php
session_start();
header('Content-Type: application/json');

include("database.php");
$email = $_SESSION['email'];
$password = md5($_POST['password']);
$stmt = $db->prepare("UPDATE lms_users SET password=? WHERE email='$email'");
$result = $stmt->execute([$password]);

if($result){
    echo json_encode([
    'code' => '201'
    ]);
}
?>