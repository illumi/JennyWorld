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
	<form name="testform" method="POST" action="res/pages/admin/add-pro.php" class="center">
		<table border= "0" class="center">
			
			<tr>		
				<td> Film ID: </td>	
				<td> 
					<select name="filmid">
					<option value="0">Film ID</option>
					<?php
					$query = mysql_query("SELECT film_ID FROM films;");
					while ($row = mysql_fetch_assoc($query)) {
						echo '<option value="' . $row['film_ID'] . '">' . $row['film_ID']. '</option>';
					}
					?>
					</select> 
				</td>
			</tr>
			<tr>
				<td>Pomotion Type:</td>
				<td>
					<select name="type" value="" id="type" required>
						<option value="2for1">2 For 1 Viewings</option>
						<option value="halfprice">Half Price</option>
						<option value="freedrink">Free Drink</option>
						<option value="freepop">Free Popcorn</option>
					</select>
				</td>
			</tr>
			<tr>
			<td>Start Date:</td> 
			<td>
				<input type="date" id="start" name="start" size="20" required/>				
			</td>
			</tr>
			<tr>
			<td>End Date:</td> 
			<td>
				<input type="date" id="end" name="end" size="20" required/>				
			</td>
			</tr>
			<tr>
			<td>Description:</td> <td><input type="text" value="" name="desc" required/></td>
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

<?php
mysql_close($link);
?>
