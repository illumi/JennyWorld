<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'] == 1)
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

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

header("location:../../../admin.php?page=staff-acs");
mysql_close($link);

?>
