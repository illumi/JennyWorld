<?php

include 'sql-connection.php';

//New fields to change
$start_date = $_POST['start'];
$end_date =  $_POST['end'];
$start_time = $_POST['newTime'];
$screen = $_POST['newScreen'];

$film_title = $_POST['newfilm_title'];


//Fields that need to be found from other tables or calculated

$end_time = '0'; //Need to calculate the end time start time - length?


$filmIDD = "SELECT films.film_ID, showings.film_ID, films.film_title FROM films, showings WHERE films.film_ID = showings.film_ID";
$filmIDDD = mysql_query($filmIDD) or die(my_sql_error());


if ($filmIDDD = $film_title) {
echo "SUCCESS MATCH";
}
$sql= "INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID)
VALUES
('$start_date', '$end_date', '$start_time', '$end_time', '$filmIDDD', '$screen')";

$result = mysql_query($sql) or die(mysql_error());


echo "success";
header("location:../../../admin.php?page=add-film-tt");
mysql_close($link);


?>
