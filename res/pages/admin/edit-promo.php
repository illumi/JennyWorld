<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin&fail=');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

?>

<div id="body">
<h1> Edit Promotions</h1>
<p>

<h3>
	<form name="promo" method="POST" action="" class="center">
		<table border= "0" class="center">
			
			<tr>		
				<td>Current Name: </td>	
				<td> 
					<select name="id">
					<option value="0">Promotion</option>
					<?php
					$query = mysql_query(" select promo_id, promo_name, film_title from promotions p, films f where p.film_ID = f.film_ID;");
					while ($row = mysql_fetch_assoc($query)) {
						echo '<option value="' . $row['promo_id'] . '">' . $row['promo_name']. " - " .$row['film_title']. '</option>';
					}
					$connect->disc();
					?>
					</select> 
				</td>
			</tr>
			<tr>
			<td>Promotion name:</td> 
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
			<td>Description:</td> <td><textarea rows="3" cols="26" name="desc"></textarea></td>
			</tr>

	   		<table border="0" class="center">
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitEditPromo(this);">
				<input type="reset" name="reset" id="reset" value="Reset">
	   		</table>
		</table>
	</form>
</h3>

<h2></h2>
</div>

