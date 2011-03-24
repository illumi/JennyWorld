<?php

if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include ('../../lib/class_dbcon.php');
$connect = new doConnect();

$id = $_POST['unique_id'];

mysql_query("DELETE FROM staff WHERE staff_ID='$id'");

header("location:../../../admin.php?page=staff-acs");

$connect->disc();

?>
