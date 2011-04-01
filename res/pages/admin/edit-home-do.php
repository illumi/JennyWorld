<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin&fail=');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$name = mysql_escape_string($_POST['TxtareaInput']);

mysql_query("UPDATE cinema SET description = '$name' WHERE id = '1'");

$connect->disc();

header("location: admin.php?page=edit-home");
?>
