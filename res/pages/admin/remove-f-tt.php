<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

//New fields to change
$film_title = $_POST['remove_title'];
$start_date = $_POST['startDate'];
$end_date =  $_POST['endDate'];
$start_time = $_POST['time'];


$query = "SELECT films.film_ID, showings.film_ID, films.film_title, showings.showing_ID FROM films, showings WHERE films.film_ID = '$film_title'";//films.film_ID = showings.film_ID";
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo $row['film_ID']. " - ". $row['film_title']. " - ". $row['showing_ID'];
	echo "<br />";
}

//needs to return the proper title..it can find the showing ID when a number is entered into the film title field. ..but it gets lost n finding the title so maybe a view or an IF...need to figure it out..if we change th3 database then it will be btter

$deleteQuery = mysql_query("SELECT showing_ID FROM showings WHERE start_date='$start_date' AND end_date = '$end_date' AND start_time = '$start_time' ") or die(mysql_error()); //  AND film_ID = '$film_title'


while($row = mysql_fetch_array($deleteQuery)){
	echo "DeleteQuery - " .$row['showing_ID'];
	echo "<br />";
}

echo "WTF <br />";

mysql_query("DELETE FROM `showings` WHERE `showing_ID` = '$deleteQuery'") or die(mysql_error()) ;


echo "FFS <br />";

$check = mysql_query("SELECT showing_ID FROM showings") or die(mysql_error());

while($row = mysql_fetch_array($check)){
	echo $row['showing_ID'];
	echo "<br />";
}




echo "success";
//header("location:../../../admin.php?page=remove-film-tt");
mysql_close($link);


?>
