<?php
session_start();

	if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$filmid = $_POST['id'];
$promoname = $_POST['name'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = mysql_escape_string($_POST['desc']);

$sql="INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description) VALUES('$filmid','$promoname','$start','$end','$description')";
mysql_query($sql) or die(mysql_error());



header("location: ../../../admin.php?page=promo-acs");
mysql_close($link);

?>
