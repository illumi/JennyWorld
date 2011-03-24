<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include ('../../lib/class_dbcon.php');
$connect = new doConnect();

$editid = $_POST['unique_id'];
$editname= mysql_escape_string($_POST['login']);
$temppass = $_POST['password'];
$editpassword= md5($temppass);
$editrole= $_POST['editrole'];

if($editrole!="manager" && $editrole!="staff"){
die("role must be either manager or staff");
header("location:../../../admin.php?page=staff-acs");
}

if (strlen($temppass) > 0) { //change password
mysql_query("UPDATE staff SET user_name = '$editname', password='$editpassword', role_type = '$editrole' WHERE staff_ID = '$editid'");
} else { //dont change password
mysql_query("UPDATE staff SET user_name = '$editname', role_type = '$editrole' WHERE staff_ID = '$editid'");
}

$connect->disc();
header("location:../../../admin.php?page=staff-acs");

?>
