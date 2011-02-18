<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

$editid=$_POST['editid'];
$editname=addslashes($_POST['editname']);
$editpassword=md5($_POST['editpassword']);
$editrole=$_POST['editrole'];

include 'sql-connection.php';

if($editrole!="manager" && $editrole!="staff"){
die("role must be either manager or staff");
header("location:../../../admin.php?page=staff-acs");
}

mysql_query("UPDATE staff SET user_name = '$editname', password='$editpassword', 
role_type = '$editrole' WHERE staff_ID = '$editid'");
echo "success";
header("location:../../../admin.php?page=edit-staff");
mysql_close($link);
?>
