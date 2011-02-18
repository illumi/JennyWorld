<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

/**
$startDateQuery = mysql_query ("SELECT start_date FROM showings");
$endDateQuery = mysql_query ("SELECT end_date FROM showings");
$currentDate = date("Y-m-d");



//$titleResult = mysql_query ($titleQuery);
//$screenResult= mysql_query ($screenQuery);

 $starts="";
 $ends="";
  /**
  while ($row=mysql_fetch_array($titleResult)) {
  
  	$filmid=$row["film_ID"];
  	$filmname=$row["film_title"];
  	$options.="<OPTION VALUE=\"$filmid\">".$filmname.'</option>';
  }

  while ($row=mysql_fetch_array($screenResult)) {
  
  	$screenID=$row["screen_ID"];
  	$optionsScreen.="<OPTION VALUE=\"$screenID\">".$screenID.'</option>';
  }
 

*/


?>


<div id="body">
<h1> Remove Film from Timetable</h1>
<center>
<p>

<div id="header">
	<table border="0">
	<tr>
		<td>	<input type=button onClick="location.href='admin.php?page=tt-acs'" value='Timetable Overview'>	</td>
		<td>	<input type=button onClick="location.href='admin.php?page=add-film-tt'" value='Add Film'>		</td>
		<td>	<input type=button onClick="location.href='admin.php?page=edit-film-tt'" value='Edit Current Timetable'></td>
		<td>	<input type=button onClick="location.href='admin.php?page=remove-film-tt'" value='Remove Film'>	</td>
	</tr>
</table>
</div>
<h2>

<table border="0">
<form method="POST" action="res/pages/admin/remove-f-tt.php">
	Please enter the details below of the showing you wish to remove:
<tr><td>Film Title:</td>
<td>	<input type="text" value="" name="remove_title" required> </td>
</tr>
<tr>	<td NOWRAP>Start Date	(yyyy-mm-dd):</td> 
	<td><input type="text" value="" name="startDate" required>	</td>
	
</tr>

<tr>	<td NOWRAP>End Date (yyyy-mm-dd): </td>
	<td> <input type="text" value="" name="endDate" required>	</td>
</tr>



<tr>	<td NOWRAP>Time (00:00:00): </td>
	<td> <input type="text" value="" name="time" required>	</td>
	
</tr>	

</table>
	<input type="submit" name="submit" id="submit" value="Submit"> <br />
</form>

<?php
echo date("Y-m-d");
/*
//if ($startDateQuery <= $currentDate >= $endDateQuery) {
echo " current date is: $startDateQuery";
echo "$endDateQuery";
echo "$currentDate";
//} else
$arr = array("zero","zero");
while ($row = mysql_fetch_assoc($startDateQuery)) {
    echo $row['start_date'];
$startDates = $row['start_date'];
//$arr = array($row['start_date']);
$starts.=$startDates;
	echo "<br>";
}

while ($row = mysql_fetch_assoc($endDateQuery)) {
    echo "END DATES " .$row['end_date'];
$endDates = $row['end_date'];
$ends.=$endDates;
	echo "<br>";
}

foreach( $startDateQuery as $id => $d){
	echo "id: $name, date: $d <br />";
}



//echo "options outside loop " .$starts;

//if ($starts <= $currentDate >= $ends) {
//echo "valid";
//}

**/

//$query = "SELECT * FROM showings";
$query = "SELECT  showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating, showings.start_date, showings.end_date, showings.end_time, showings.available_tickets,  showings.demand_for_more FROM showings, films WHERE showings.film_ID = films.film_ID";
    

$result = mysql_query($query) or die(mysql_error());

echo "
<table border='1'>
<tr>
<th>Screen</th>
<th>Film Title</th>
<th>Start Date</th>
<th>End Date</th>
<th>Start Time</th>


<th>Rating</th>
<th>available tickets</th>

</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
echo "<td>" . $row['screen_ID'] . "</td>";
echo "<td NOWRAP>" . $row['film_title'] . "</td>";
	echo "<td>" . $row['start_date'] . "</td>";
	echo "<td>" . $row['end_date'] . "</td>";
	echo "<td>" . $row['start_time'] . "</td>";
//	echo "<td>" . $row['end_time'] . "</td>";
	
	echo "<td>" . $row['film_rating'] . "</td>";
	
echo "<td>" . $row['available_tickets'] . "</td>";
//echo "<td>" . $row['demand_for_more'] . "</td>";
	echo "</tr>";
}
echo "</table>";

/**
while($row = mysql_fetch_array($result)){
	echo $row['name']. " - ". $row['age'];
	echo "<br />";
}
*/

$timetable = mysql_query("SELECT * from showings");
echo "<table border='1'>
<tr>
<th>Showing ID</th>
<th>Start Date</th>
<th>End Date</th>
<th>Start time</th>
<th>end time</th>
<th>Film ID</th>
<th>Screen ID</th>
<th>Available Tickets</th>
<th>Audience Size</th>
<th>Demand for More</th>
</tr>";

while($row = mysql_fetch_array($timetable))
{
	echo "<tr>";
	echo "<td>" . $row['showing_ID'] . "</td>";
	echo "<td>" . $row['start_date'] . "</td>";
	echo "<td>" . $row['end_date'] . "</td>";
	echo "<td>" . $row['start_time'] . "</td>";
	echo "<td>" . $row['end_time'] . "</td>";
	echo "<td>" . $row['film_ID'] . "</td>";
	echo "<td>" . $row['screen_ID'] . "</td>";
	echo "<td>" . $row['available_tickets'] . "</td>";
	echo "<td>" . $row['audience_size'] . "</td>";
	echo "<td>" . $row['demand_for_more'] . "</td>";
	echo"</tr>";
}
echo "</table>";
mysql_close($link);
//}
?>

</h2>
</center>
</div>
