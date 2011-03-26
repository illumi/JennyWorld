<?php
session_start();

	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ../../../index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$promoid = $_POST['id'];
$name = $_POST['name'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = mysql_escape_string($_POST['desc']);

$sql="UPDATE promotions SET promo_name = '$name', start_date = '$start', 
end_date = '$end', description = '$description' WHERE promo_id = '$promoid'";
mysql_query($sql) or die(mysql_error());



header("location: admin.php?page=promo-acs");
$connect->disc();

?>
