<?php
session_start();
include "includes/sqllogin.php";


$result = mysqli_query($con,"SELECT ID, Username, Password FROM admins WHERE Username='$_POST[Username]'");

$row = mysqli_fetch_row($result);
$id = $row[0];
$username = $row[1];
$password = $row[2];

echo $id;
echo $username;
echo $password;


if ($_POST['Password'] != $password)
{
	echo "Bad Password";
}
else {
	// Create Sessions
	$_SESSION['userid'] = $id;
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	header("Location: ../../admin.php");
	exit;
}
?>