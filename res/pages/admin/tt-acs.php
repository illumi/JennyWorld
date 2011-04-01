<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Timetable Overview</h1>
<h2>

	<?php

	include('res/lib/class_dbcon.php');
	$connect = new doConnect();

	echo date("Y-m-d") . "<p>";

	$today= date('Y-m-d'); //todays date
	
	$sql = "SELECT film_title, start_time, duration FROM screenfilms WHERE start_date = '2011-04-07'";
	$result = mysql_query($sql) or die(mysql_error());

	
	
	$tmpname = "";
	while($row = mysql_fetch_array($result)) {
		$film = $row['film_title'];
		$duration = $row['duration'];
		if ($film != $tmpname) {
			if ($tmpname != "") {
				echo "</div>";
			}
			echo "<br><div class='film'>";
			echo "$film <div class='duration'>Film length: $duration</div>";
			echo "</div>";
			$tmpname = $film;
			echo "<div class='time'>";
			echo $row['start_time'] . " ";
		} else {
			echo $row['start_time'] . " ";
		}
	}
		
	$connect->disc();

	?> 
	
<p>
</h2>
	
</div>
