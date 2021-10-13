<?php
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database.php");

$stmt = $db->prepare("SELECT * FROM lms_users");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>