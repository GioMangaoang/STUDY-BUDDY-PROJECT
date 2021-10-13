<?php
session_start();
header('Content-Type: application/json');

include("database.php");


$email = $_POST['email'];
$password = $_POST['password'];
$finalpassword =md5($password);
$stmt = $db->prepare("SELECT lms_role FROM lms_users WHERE email='$email' AND password = '$finalpassword'");
$stmt->execute();
$result = json_encode($stmt->fetch(PDO::FETCH_ASSOC));
$stmt2 = $db->prepare("SELECT lms_section1 FROM lms_users WHERE email='$email' AND password = '$finalpassword'");
$stmt2->execute();
$result2 = json_encode($stmt2->fetch(PDO::FETCH_ASSOC));
$arr = json_decode($result, true);
$arr2 = json_decode($result2, true);
echo $arr["lms_role"];
$_SESSION['current_section']=$arr2["lms_section1"];
if ($arr["lms_role"] == 'option1'){
    $_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
    header("location: student.php");
}
if ($arr["lms_role"] == 'option2'){
    $_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
    header("location: teacher.php");
}
if ($arr["lms_role"] == 'option3'){
    $_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
    header("location: admin.php");
}
?>
