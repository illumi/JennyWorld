<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

$name = addslashes($_POST['newname']);
$password = md5($_POST['newpassword']);
$role = $_POST['newrole'];

include 'sql-connection.php';

if($role!="manager" && $role!="staff"){
d	ie("Role must be either manager or staff");
}

$sql="INSERT INTO staff (user_name,password,role_type)
VALUES
('$name','$password','$role')";
mysql_query($sql) or die(mysql_error());
header("location: ./admin.php?page=add-staff");

mysql_close($link);
?>
