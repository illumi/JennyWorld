<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php'

?>

<div id="body">
<h1> Edit Promotions</h1>

<h3>
	<form name="editpromo" method="POST" action="res/pages/admin/editpro.php" class="center">
		<table border= "0" class="center">
			
			<tr>		
				<td> Promo ID: </td>	
				<td> 
					<select name="promoid">
					<option value="0">Promo ID</option>
					<?php
					$query = mysql_query("SELECT promo_id FROM promotions;");
					while ($row = mysql_fetch_assoc($query)) {
						echo '<option value="' . $row['promo_id'] . '">' . $row['promo_id']. '</option>';
					}
					?>
					</select> 
				</td>
			</tr>
			<tr>
			<td>Promo name:</td> 
			<td>
				<input type="text" id="name" name="name" size="20">				
			</td>
			</tr>
			<tr>
			<td>Start Date:</td> 
			<td>
				<input type="date" id="start" name="start" size="20">				
			</td>
			</tr>
			<tr>
			<td>End Date:</td> 
			<td>
				<input type="date" id="end" name="end" size="20">				
			</td>
			</tr>
			<tr>
			<td>Description:</td> <td><input type="text" value="" name="desc"></td>
			</tr>
			<tr height="10px"></tr>
	   		<table border="0" class="center">
				<tr>
				<td><input type="submit" name="submit" id="submit" value="Submit"></td>
				<td><input type="reset" name="reset" id="reset" value="Reset"></td>
				</tr>
	   		</table>
		</table>
	</form>
    </h3>
<p>

