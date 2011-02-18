<?php

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

//New fields to change
$showingID = $_POST['newShowingID'];
$screen = $_POST['newScreen'];
$start_date = $_POST['newStartDate'];
$end_date =  $_POST['newEndDate'];
$start_time = $_POST['newTime'];

echo "WTF <br />";

mysql_query("UPDATE showings SET showing_ID = '$showingID', screen_ID = '$screen', start_time='$start_time', start_date = '$start_date', end_date = '$end_date' WHERE showing_ID = '$showingID'") or die(mysql_error()) ;

echo "FFS <br />";

$check = mysql_query("SELECT * FROM showings") or die(mysql_error());

while($row = mysql_fetch_array($check)){
	echo " Stime -".$row['start_time']. " - Screen -". $row['screen_ID']. " - ShowingID -". $row['showing_ID'];
	echo "<br />";
}

echo "success";
//header("location:../../../admin.php?page=remove-film-tt");
mysql_close($con);


?>
