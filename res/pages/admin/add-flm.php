<?php

	if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ../../../index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

	$filmtitle = addslashes($_POST['filmtitle']);
	$filmlength = $_POST['filmlength'];
	$genre = $_POST['genre'];
	$rating = $_POST['rating'];
	$year = $_POST['year'];

	$sql="INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) 
		 VALUES('$filmtitle','$filmlength','$genre','$rating','$year')";
	mysql_query($sql) or die(mysql_error());

$connect->disc();
header("location: admin.php?page=add-film");
?>
