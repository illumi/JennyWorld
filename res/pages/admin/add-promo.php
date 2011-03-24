<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

?>



<div id="body">
<h1>Add Promotion</h1>

    <h3>
	<form name="promo" method="POST" action="" class="center">
		<table border= "0" class="center">
			
			<tr>		
				<td> Film Name: </td>	
				<td> 
					<select name="id">
					<option value="0">Film Name</option>
					<?php
					$query = mysql_query("SELECT film_ID, film_title FROM films;");
					while ($row = mysql_fetch_assoc($query)) {
						echo '<option value="' . $row['film_ID'] . '">' . $row['film_title']. '</option>';
					}
					?>
					</select> 
				</td>
			</tr>
			<tr>
				<td>Pomotion name:</td>
				<td>
					<input type="text" name="name" id="name"/>
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
			<td>Description:</td> <td><textarea rows="3" cols="26" name="desc"></textarea></td>
			</tr>

	   		<table border="0" class="center">
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitAddPromo(this);">
				<input type="reset" name="reset" id="reset" value="Reset"/>
				
	   		</table>
		</table>
	</form>
    </h3>
	
<h2></h2>
</div>
<?php
mysql_close($link);
?>
