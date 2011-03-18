<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
	<h1> Timetable Overview</h1>
	<center>
	<p>

	<h2>
	<?php

	include 'sql-connection.php';

	echo date("Y-m-d");


	$query = "SELECT showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating FROM showings, films WHERE showings.film_ID = films.film_ID"; //ORDER BY films.film_title";
		 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table border='1'>
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

	mysql_close($link);

	?> 
	</h2>
	</center>
</div>
