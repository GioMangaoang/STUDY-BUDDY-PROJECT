<?php
session_start();
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database.php");
$email = $_SESSION['email'];
$stmt = $db->prepare("SELECT * FROM lms_users WHERE email='$email'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>