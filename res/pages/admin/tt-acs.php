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

	//Query finds all showings in the future
	$query = "SELECT s.screen_ID, s.film_ID,  f.film_title, s.start_time, f.film_rating, s.start_date, f.film_length FROM showings s, films f WHERE s.film_ID = f.film_ID AND start_date >= $today";	 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table border='1' class=\"center\">
	<tr>
	<th>Screen ID</th>
	<th>Film Title</th>
	<th>Start Time</th>
	<th>Runtime</th>
	<th>Start</th>
	<th>Rating</th>
	</tr>";

	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>" .$row['screen_ID']. " </td> ";
		echo "<td NOWRAP>" . $row['film_title'] . "</td>";
		echo "<td>" . $row['start_time'] . "</td>";
		echo "<td>" . $row['film_length'] . "</td>";
		echo "<td>" . $row['start_date'] . "</td>";
		echo "<td>" . $row['film_rating'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
		
		
	$connect->disc();

	?> 
	
<p>
</h2>
	
</div>
