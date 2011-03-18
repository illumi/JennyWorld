<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$name = mysql_escape_string($_POST['login']);
$userpassword = md5($_POST['password']);
$role = $_POST['editrole'];

if($role!="manager" && $role!="staff"){
die("Role must be either manager or staff");
}

$sql="INSERT INTO staff (user_name,password,role_type)
VALUES
('$name','$userpassword','$role')";
mysql_query($sql) or die(mysql_error());
header("location: ../../../admin.php?page=staff-acs");

mysql_close($link);
?>
