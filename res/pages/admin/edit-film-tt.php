<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$showingIdQuery = "SELECT showing_ID FROM showings";
//$titleQuery = "SELECT film_ID, film_title FROM films";
$screenQuery = "SELECT screen_ID FROM screens";


$showingResult= mysql_query ($showingIdQuery);
//$titleResult = mysql_query ($titleQuery);
$screenResult= mysql_query ($screenQuery);


 $optionsShowings="";
// $options="";
 $optionsScreen="";


while ($row=mysql_fetch_array($showingResult)) {
  
  	$showingID=$row["showing_ID"];
  	$optionsShowings.="<OPTION VALUE=\"$showingID\">".$showingID.'</option>';
  }
/**
  while ($row=mysql_fetch_array($titleResult)) {
  
  	$filmid=$row["film_ID"];
  	$filmname=$row["film_title"];
  	$options.="<OPTION VALUE=\"$filmid\">".$filmname.'</option>';
  }
*/
  while ($row=mysql_fetch_array($screenResult)) {
  
  	$screenID=$row["screen_ID"];
  	$optionsScreen.="<OPTION VALUE=\"$screenID\">".$screenID.'</option>';
  }
 

 

/**
Ideal Editting - need to move films currently playing to different time/dates/screen so need to select a showing which can display the details of the film dynamically maybe next to the editing boxes - the details that arent changed are automatcally the same - maybe check a box to confirm the details or something like that

todo - drop down menu for the film IDs that go along with the film name perhaps? i dunno
details changed entered
and then applied

*/

?>

<div id="body">
<h1> Edit Film in Timetable</h1>
<p>

<h2>

<form name="tt" method="POST" action="">
	<table border="0" class="center">
	<tr>
		<tr>	<td>Showing: </td>
			<td> <SELECT Name="newShowingID">
				<option value="0">Showings
				<?php echo $optionsShowings?>
				</select>
			</td>
		</tr>
		<tr>	<td>Screen: </td>
			<td> <SELECT Name="newScreen">
				<option value="0">Screen
				<?php echo $optionsScreen?>
				</select>
			</td>
		</tr>
	<tr>
				<td NOWRAP>Start Date:</td> 
				<td><input type="date" id="start" name="start" size="20" required/>	</td>
			</tr>

			<tr>
				<td NOWRAP>End Date: </td>
				<td><input type="date" id="end" name="end" size="20" required/>	</td>
			</tr>
	<tr><td NOWRAP>Time (00:00:00): </td>
		<td> <input type="text" value="" name="newTime" required>	</td>
	</tr>
	<table border="0" class="center">
				<p>
				<input type="submit" name="submit" id="submit" value="Submit">
				<input type="reset" name="reset" id="reset" value="Reset">
	   		</table>
	</table>
</form>


<?php

echo date("Y-m-d");

$query = "SELECT showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating, showings.start_date, showings.end_date, showings.showing_ID FROM showings, films WHERE showings.film_ID = films.film_ID";
     
$result = mysql_query($query) or die(mysql_error());

echo "<table border='1' class=\"center\">
<tr>
<th>Screen ID</th>
<th>Film Title</th>
<th>Start Time</th>
<th>Rating</th>
<th>Start</th>
<th>End</th>
<th>Showing ID</th>
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
	echo "<td>" . $row['showing_ID'] . "</td>";

	echo "</tr>";
}
echo "</table>";

$connect->disc();

?>

</h2><p>
</div>
