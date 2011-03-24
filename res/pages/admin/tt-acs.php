<?php
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Timetable Overview</h1>
<h3>

	<?php


	include 'sql-connection.php';

	echo date("Y-m-d") . "<p>";
	$date = date("Y-m-d");
	$dateW = date("W");
	echo $date . "<p>";
	echo $dateW . "<p>";
	$current_tt = "SELECT * FROM showings WHERE start_date between date('2011-03-26') AND date('2011-04-03')";
$ctt = mysql_query($current_tt) or die(mysql_error());
	
	$query = "SELECT showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating FROM showings, films WHERE showings.film_ID = films.film_ID"; //ORDER BY films.film_title";
		 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table border='1' class=\"center\">
	<tr>
	<th>Screen ID</th>
	<th>Film Title</th>
	<th>Start Time</th>
	<th>Rating</th>
	</tr>";
	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>" .$row['screen_ID']. " </td> ";
		echo "<td>" . $row['film_title'] . "</td>";
		echo "<td>" . $row['start_time'] . "</td>";
		echo "<td>" . $row['film_rating'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";


echo "<table border='1' class=\"center\">
	<tr>
		<th>filmid</th>
	<th>Startdate</th>
	<th>enddate</th>
	</tr>";
	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($ctt)){
		echo "<tr>";
		echo "<td>" .$row['film_ID']. " </td> ";
		echo "<td>" . $row['start_date'] . "</td>";
		echo "<td>" . $row['end_date'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysql_close($link);

	?> 
</h3>
	
</div>
