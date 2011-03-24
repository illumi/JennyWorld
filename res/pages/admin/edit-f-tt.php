<?php

include 'sql-connection.php';

//New fields to change
$showingID = $_POST['newShowingID'];
$screen = $_POST['newScreen'];
$start_date = $_POST['start'];
$end_date =  $_POST['end'];
$start_time = $_POST['newTime'];

mysql_query("UPDATE showings SET showing_ID = '$showingID', screen_ID = '$screen', start_time='$start_time', start_date = '$start_date', end_date = '$end_date' WHERE showing_ID = '$showingID'") or die(mysql_error()) ;

$check = mysql_query("SELECT * FROM showings") or die(mysql_error());

while($row = mysql_fetch_array($check)){
	echo " Stime -".$row['start_time']. " - Screen -". $row['screen_ID']. " - ShowingID -". $row['showing_ID'];
	echo "<br />";
}

header("location:../../../admin.php?page=remove-film-tt");
mysql_close($link);


?>
