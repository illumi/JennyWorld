<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

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
 



?>

<div id="body">
<h1> Add Film to Timetable</h1>
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
<section id="add film timetable">
	<form method="POST" action="res/pages/admin/add-f-tt.php">
  
<table border= "0">
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
<!--Need to enforce the formatting of the date and time -->
<tr>	<td NOWRAP>Start Date:</td> 
	<td>
			<?php
			include('calendar/calendar.html');
			?>
	</td>
	
</tr>

<tr>	<td NOWRAP>End Date: </td>
	<td>
			<?php
			include('calendar/calendar.html');
			?>
	</td>
</tr>



<tr>	<td NOWRAP>Time (00:00:00): </td>
	<td> <input type="text" value="" name="newTime" required>	</td>
	
</tr>	
<tr>
	<td> <input type="submit" name="submit" id="submit" value="Submit">	</td>
	<td> <input type="reset" name="reset" id="reset" value="Reset">		</td>
</tr>
</table>
	</form>


<?php

$films = mysql_query("SELECT * FROM films");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Title</th>
<th>length</th>
<th>Genre</th>
<th>Rating</th>
<th>Year</th>
</tr>";

while($row = mysql_fetch_array($films))
{
	echo "<tr>";
	echo "<td>" . $row['film_ID'] . "</td>";
	echo "<td>" . $row['film_title'] . "</td>";
	echo "<td>" . $row['film_length'] . "</td>";
	echo "<td>" . $row['film_genre'] . "</td>";
	echo "<td>" . $row['film_rating'] . "</td>";
	echo "<td>" . $row['film_year'] . "</td>";

	echo"</tr>";
}

echo "</table>";
mysql_close($con);
?>

	</section>
</h2>
</center>
</div>
