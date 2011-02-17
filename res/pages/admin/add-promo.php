

<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

$titleQuery = "SELECT film_ID FROM films";

$titleResult = mysql_query ($titleQuery);

$options="";
  
  while ($row=mysql_fetch_array($titleResult)) {
  
  	$filmid=$row["film_ID"];
  	$options.="<OPTION VALUE=\"$filmid\">".$filmid.'</option>';
}


?>



<div id="body">
<h1>Add Promotion</h1>
<center>

    <h3>
	<form name="testform" method="POST" action="res/pages/admin/add-pro.php">
		<table border= "0">
			
			<tr>		
				<td> Film ID: </td>	
				<td> 
					<select NAME="filmid"  required>
					<option VALUE="0">Film ID
					<? echo $options?>
					</select> 
				</td>
			</tr>
			<tr>
			<td>Pomotion Type:</td> <td><select name="type" value="" id="type" required>
			<option value="2for1">2 For 1 Viewings</option>
			<option value="halfprice">Half Price</option>
			<option value="freedrink">Free Drink</option>
			<option value="freepop">Free Popcorn</option>
			</select></td>
			</tr>
			<tr>
			<td>Start Date:</td> 
			<td>
			<?php
			include('calendar/calendar.html');
			?>
			</td>
			</tr>
			<tr>
			<td>End Date:</td> 
			<td>
			<?php
			include('calendar/calendar2.html');
			?>
			</td>
			</tr>
			<tr>
			<td>Description:</td> <td><input type="text" value="" name="desc" required></td>
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
