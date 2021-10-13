<?php
header('Content-Type: application/json');

include("database.php");

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$lms_role = $_POST['lms_role'];
$finalpassword = md5($password);
$stmt = $db->prepare("INSERT INTO lms_users (first_name, last_name, email, password, lms_role) VALUES (?, ?, ?, ?, ?)");
$result = $stmt->execute([$firstname, $lastname, $email, $finalpassword, $lms_role]);

if($result){
    echo json_encode([
    'code' => '201'
    ]);
}



?>