<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

?>



<div id="body">
<h1>Add Promotion</h1>

    <h3>
	<form name="tt" method="POST" action="" class="center">
		<table border= "0" class="center">
			
			<tr>		
				<td> Film Name: </td>	
				<td> 
					<select name="id" style="width:200px;">
					<option value="0">--select film to add--</option>
					<?php
					$query = mysql_query("SELECT film_ID, film_title FROM films;");
					while ($row = mysql_fetch_assoc($query)) {
						echo '<option value="' . $row['film_ID'] . '">' . $row['film_title']. '</option>';
					}
					$connect->disc();
					?>
					</select> 
				</td>
			</tr>
			<tr>
			<td>Start Date:</td> 
			<td>
				<input type="date" id="start" name="start" size="20"/>				
			</td>
			</tr>
			<tr>
			<td>End Date:</td> 
			<td>
				<input type="date" id="end" name="end" size="20"/>				
			</td>
			</tr>
			<tr>		
				<td> Number of showings: </td>	
				<td> 
					<select name="numshowings">
					<option value="0">--select number of showings--</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					
					</select> 
				</td>
							<tr>
				<td NOWRAP>Time of first showing: </td>
				<td> <input type="text" id="timepicker_1" value="" name="newTime" required></td>
			</tr>	
			</tr>

	   		<table border="0" class="center">
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitAddTimetable(this);">
				<input type="reset" name="reset" id="reset" value="Reset"/>
				
	   		</table>
		</table>
	</form>
    </h3>
	
<h2></h2>
</div>
