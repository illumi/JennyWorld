<?php

if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

	//New fields to change
	$showingID = $_POST['ShowingID'];
	$screen = $_POST['newScreen'];
///$screen = $_POST['newFilm'];
	$start_date = $_POST['start'];
	$end_date =  $_POST['end'];
	$start_time = $_POST['newTime'];

$sql="UPDATE showings SET screen_ID = '$screen', start_date = '$start_date', end_date = '$end_date', start_time='$start_time' WHERE showing_ID = '$showingID'");


mysql_query($sql) or die(mysql_error()) ;
/**
	$check = mysql_query("SELECT * FROM showings") or die(mysql_error());

	while($row = mysql_fetch_array($check)){
		echo " Stime -".$row['start_time']. " - Screen -". $row['screen_ID']. " - ShowingID -". $row['showing_ID'];
		echo "<br />";
	}
*/
$connect->disc();
header("location: admin.php?page=tt-acs");

?>
