<div id="body">
<h1> Promotions Overview</h1>
<center>
<p>
<div id="header">
	<table border="0">
	<tr>
		<td>	<input type=button onClick="location.href='admin.php?page=add-promo'" value='Add Promotion'> </td>
		<td>	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Promotion'> </td>
		<td>	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove Promotion'> </td>
	</tr>
	</table>
</div>
<h3>
<?php

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

echo date("Y-m-d");


$query = "SELECT promotions.promo_id, films.film_title,  promotions.promo_name, promotions.start_date, promotions.end_date, promotions.description FROM promotions, films WHERE promotions.film_ID = films.film_ID";
     
$result = mysql_query($query) or die(mysql_error());

echo "<table border='1'>
<tr>
<th>Promo ID</th>
<th>Film Title</th>
<th>Promotion Type</th>
<th>Start Date</th>
<th>End Date</th>
<th>Description</th>
</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
	echo "<td>" .$row['promo_id']. " </td> ";
	echo "<td>" . $row['film_title'] . "</td>";
	echo "<td>" . $row['promo_name'] . "</td>";
	echo "<td>" . $row['start_date'] . "</td>";
	echo "<td>" . $row['end_date'] . "</td>";
	echo "<td>" . $row['description'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysql_close($con);

?> 
</h3>
</center>
</div>


