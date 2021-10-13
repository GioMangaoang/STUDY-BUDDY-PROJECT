<?php
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database.php");

$stmt = $db->prepare("SELECT * FROM lms_user");//it should be same as its respective section
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>