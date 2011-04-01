<?php

	if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ../../../index.php?page=adminLogin&fail=');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

	$title = mysql_escape_string($_POST['title']);
	$year =	mysql_escape_string($_POST['year']);
	$desc =	mysql_escape_string($_POST['filmdesc']);
	$length = mysql_escape_string($_POST['filmlength']);
	$genre = mysql_escape_string($_POST['filmgenre']);
	$rating	= mysql_escape_string($_POST['filmrating']);
	$poster	= mysql_escape_string($_POST['filmposter']);	
	$imdbid = mysql_escape_string($_POST['imdb_id']);
		 
	$sql="INSERT INTO films (film_title, film_year, film_plot, film_length, film_genre, film_rating, film_poster, imdb_id) VALUES ('$title', '$year', '$desc', '$length', '$genre', '$rating', '$poster', '$imdbid')";
		 
	mysql_query($sql) or die(mysql_error());

$connect->disc();
header("location: admin.php?page=films-acs");
?>
