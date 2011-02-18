<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$titleQuery = "SELECT film_ID, film_title FROM films";
$screenQuery = "SELECT screen_ID FROM screens";

$titleResult = mysql_query ($titleQuery);
$screenResult= mysql_query ($screenQuery);

 $options="";
 $optionsScreen="";
  
  while ($row=mysql_fetch_array($titleResult)) {
  
  	$filmid=$row["film_ID"];
  	$filmname=$row["film_title"];
  	$options.="<OPTION VALUE=\"$filmid\">".$filmname.'</option>';
  }

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
<center>
<p>

<h2>

<table border="0">
<form method="POST" action="res/pages/admin/edit-f-tt.php">
	

<tr>
		
		<td> Title: </td>	
		<td> 
			 <select NAME="newfilm_title"  required>
 			 <option VALUE="0">Film Title
			  <? echo $options?>
 			 </select> 
		</td>
	</tr>

	<tr>	<td>Screen: </td>
		<td> <SELECT Name="newScreen">
			<option value="0">Screen
			<? echo $optionsScreen?>
			</select>
		</td>
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

include 'sql-connection.php';

$my_t=getdate(date("U"));
print("$my_t[year]-$my_t[mon]-$my_t[mday]");

echo date("Y-m-d");



$query = "SELECT showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating, showings.start_date, showings.end_date, showings.screen_ID FROM showings, films WHERE showings.film_ID = films.film_ID";
     
$result = mysql_query($query) or die(mysql_error());

echo "<table border='1'>
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
	echo "<td>" . $row['screen_ID'] . "</td>";

	echo "</tr>";
}
echo "</table>";

mysql_close($link);

?></h2>
</center>
</div>
