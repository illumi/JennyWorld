<div id="body">
<h1> Promotions Overview</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=add-promo'" value='Add Promotion'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Promotion'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove Promotion'>
</div>
<?php

$username="js230"; /*username*/
$password="js230"; /*password*/
$database="js230"; /*database name*/
$host = "anubis.macs.hw.ac.uk";  /*host name*/

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

$query = mysql_query("SELECT * FROM promotions");

echo "<table border='1'>
<tr>
<th>Promo ID</th>
<th>Film ID</th>
<th>Promo Name</th>
<th>Start</th>
<th>End</th>
<th>Description</th>
</tr>";

while($row = mysql_fetch_array($query))
{
	echo "<tr>";
	echo "<td>" . $row['promo_id'] . "</td>";
	echo "<td>" . $row['film_ID'] . "</td>";
	echo "<td>" . $row['promo_name'] . "</td>";
	echo "<td>" . $row['start_date'] . "</td>";
	echo "<td>" . $row['end_date'] . "</td>";
	echo "<td>" . $row['description'] . "</td>";
	echo"</tr>";
}
echo "</table>";
mysql_close($link);

?>
</center>
</div>
