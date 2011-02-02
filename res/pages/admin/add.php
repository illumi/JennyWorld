<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$name = addslashes($_POST['newname']);
$password = md5($_POST['newpassword']);
$role = $_POST['newrole'];

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
echo "done1";
mysql_select_db('js230') or die(mysql_error());
echo "done2";

if($role!="manager" && $role!="staff"){
die("Role must be either manager or staff");
}

$sql="INSERT INTO staff (user_name,password,role_type)
VALUES
('$name','$password','$role')";
mysql_query($sql) or die(mysql_error());
header("location:../../../admin.php?page=add-staff");
?>
