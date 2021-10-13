<?php
header('Content-Type: application/json');

include("database.php");

$email = $_POST['email'];
$lms_section_num = $_POST['lms_section_num'];
$lms_section= $_POST['lms_section'];
if($lms_section_num == "lms_section1"){
    $stmt = $db->prepare("UPDATE lms_users SET lms_section1=? WHERE email=?");
    $stmt->execute([$section, $email]);
    $result = json_encode($stmt->fetch(PDO::FETCH_ASSOC));
if($result){
    header('location: admin.php');
}
}
else if($lms_section_num == "lms_section2"){
    $stmt = $db->prepare("UPDATE lms_users SET lms_section2=? WHERE email=?");
    $stmt->execute([$section, $email]);
    $result = json_encode($stmt->fetch(PDO::FETCH_ASSOC));}
if($result){
    header('location: admin.php');
}





?>