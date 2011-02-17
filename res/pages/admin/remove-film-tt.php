<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

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

<h2>

<table border="0">
<form method="POST" action="res/pages/admin/remove-f-tt.php">
	Please enter the details below of the showing you wish to remove:
<tr><td>Showing ID:</td>
<td>	<input type="text" value="" name="removeid" required> </td>
</tr>
<tr>	<td NOWRAP>Start Date	(yyyy-mm-dd):</td> 
	<td><input type="text" value="" name="newStartDate" required>	</td>
	
</tr>

<tr>	<td NOWRAP>End Date (yyyy-mm-dd): </td>
	<td> <input type="text" value="" name="newEndDate" required>	</td>
</tr>



<tr>	<td NOWRAP>Time (00:00:00): </td>
	<td> <input type="text" value="" name="newTime" required>	</td>
	
</tr>	
<tr>
	<td> <input type="submit" name="submit" id="submit" value="Submit">	</td>	<td> <input type="reset" name="reset" id="reset" value="Reset">		</td>
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
$query = "SELECT showings.screen_ID, showings.film_ID,  films.film_title, showings.start_time, films.film_rating FROM showings, films WHERE showings.film_ID = films.film_ID";
     
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

mysql_close($con);
//}
?>

</h2>
</center>
</div>
