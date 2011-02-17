<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

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
<center>
	<div id="header">
	<input type=button onClick="location.href='admin.php?page=promo-acs'" value='Promotions Overview'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Promotion'>
	<input type=button onClick="location.href='admin.php?page=add-promo'" value='Add Promotion'>
	</div>

    <h3>
	<form method="POST" action="res/pages/admin/remove-pro.php">
		<table border= "0">			
			<tr>		
				<td> Select Promotion to remove: </td>	
				<td> 
					<select NAME="removeid">
					<option VALUE="0">Promotion ID
					<? echo $options?>
					</select> 
				</td>
			</tr>
			<tr height="10px"></tr>
	   		<table border="0">
				<tr>
				<td><input type="submit" name="submit" id="submit" value="Submit"></td>
				<td><input type="reset" name="reset" id="reset" value="Reset"></td>
				</tr>
	   		</table>
		</table>
	</form>
    <h3>


<h3>
<?php
mysql_close($con);
?>

