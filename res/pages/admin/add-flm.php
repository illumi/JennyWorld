<?php

	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$filmtitle = addslashes($_POST['filmtitle']);
$filmlength = $_POST['filmlength'];
$genre = $_POST['genre'];
$rating = $_POST['rating'];
$year = $_POST['year'];

print_r($_REQUEST);

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());

mysql_select_db('js230') or die(mysql_error());

$sql="INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) 
     VALUES('$filmtitle','$filmlength','$genre','$rating','$year')";
mysql_query($sql) or die(mysql_error());
header("location: ../../../admin.php?page=add-film");
?>