<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$titleQuery = "SELECT promo_id FROM promotions";

$titleResult = mysql_query ($titleQuery);

$options="";
  
  while ($row=mysql_fetch_array($titleResult)) {
  
  	$promoid=$row["promo_id"];
  	$options.="<OPTION VALUE=\"$promoid\">".$promoid.'</option>';
}


?>

<div id="body">
	<h1>Remove Promotion</h1>

	<h3>
	<form method="POST" action="res/pages/admin/remove-pro.php">
		<table border= "0" class="center">			
			<tr>		
				<td> Select Promotion to remove: </td>	
				<td> 
					<select name="remove">
					<option value="0">Promotion ID</option>
					<?php echo $options ?>
					</select> 
				</td>
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

</div>

<?php
mysql_close($link);
?>

