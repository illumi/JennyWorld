<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

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

$connect->disc();
header("location: admin.php?page=staff-acs");
?>
