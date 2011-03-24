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

?>

<div id="body">
<h1> Add Film to Timetable</h1>
<p>
<h2>

<section id="add film timetable">
	<form name="tt" method="POST" action="" > 
		<table border= "0" class="center">
			<tr>
				<td> Title:</td>	
				<td> 
					 <select name="newfilm_title"  required>
					 <option VALUE="0">Film Title
					  <?php echo $options?>
					 </select> 
				</td>
			</tr>

			<tr>	<td>Screen: </td>
				<td> <SELECT name="newScreen">
					<option value="0">Screen
					<?php echo $optionsScreen?>
					</select>
				</td>
			</tr>
			<!--Need to enforce the formatting of the date and time -->
			<tr>
				<td NOWRAP>Start Date:</td> 
				<td><input type="date" id="start" name="start" size="20" required/>	</td>
			</tr>

			<tr>
				<td NOWRAP>End Date: </td>
				<td><input type="date" id="end" name="end" size="20" required/>	</td>
			</tr>

			<tr>
				<td NOWRAP>Time: </td>
				<td> <input type="text" id="timepicker_1" value="" name="newTime" required></td>
			</tr>	
		<table border="0" class="center">				
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitAddTimetable(this);">
				<input type="reset" name="reset" id="reset" value="Reset">	
			</tr>
			</table>
		</table>
	</form>

</section>
</h2>
</div>
