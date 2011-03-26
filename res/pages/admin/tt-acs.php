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
	
	/*
Find out start and end date of current week.
assuming that week starts at sunday and ends at saturday.
so a typical week will look like this: sun,mon,tue,wed,thu,fri,sat
*/

//sunday = start of week
$sat = 6; //saturday = end of week
$current_day=date('w');
$days_remaining_until_sat = $sat - $current_day;

$ts_start = strtotime("-$current_day days");
$ts_end = strtotime("+$days_remaining_until_sat days");

$sdate= date('Y-m-d',$ts_start); //start date
$edate = date('Y-m-d',$ts_end); //end date

	
$query = "SELECT showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating, showings.start_date, showings.end_date FROM showings, films WHERE showings.film_ID = films.film_ID AND start_date between '$sdate' AND '$edate' ORDER BY showings.screen_ID";
     
$result = mysql_query($query) or die(mysql_error());

echo "<table border='1' class=\"center\">
<tr>
<th>Screen ID</th>
<th>Film Title</th>
<th>Start Time</th>
<th>Rating</th>
<th>Start</th>
<th>End</th>

</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
	echo "<td>" .$row['screen_ID']. " </td> ";
	echo "<td NOWRAP>" . $row['film_title'] . "</td>";
	echo "<td>" . $row['start_time'] . "</td>";
	echo "<td>" . $row['film_rating'] . "</td>";
	echo "<td>" . $row['start_date'] . "</td>";
	echo "<td>" . $row['end_date'] . "</td>";

	echo "</tr>";
}
	echo "</table>";
	
	$connect->disc();

	?> 
</h2>
	
</div>
