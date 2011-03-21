<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'] == 1)
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

$sql="INSERT INTO staff (cinema_id, user_name,password,role_type)
VALUES
('1','$name','$userpassword','$role')";
mysql_query($sql) or die(mysql_error());

mysql_close($link);
header("location: ../../../admin.php?page=staff-acs");
?>
