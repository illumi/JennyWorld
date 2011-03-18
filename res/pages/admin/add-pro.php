<?php
session_start();

	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$filmid = $_POST['filmid'];
$promotype = $_POST['type'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = mysql_escape_string($_POST['desc']);

$sql="INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description) VALUES('$filmid','$promotype','$start','$end','$description')";
mysql_query($sql) or die(mysql_error());



header("location: ../../../admin.php?page=promo-acs");
mysql_close($link);

?>
