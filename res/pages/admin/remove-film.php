<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>
<div id="body">
<h1> Remove Film</h1>
<center>
<small>
<p>
	<input type=button onClick="location.href='admin.php?page=films-acs'" value='Film Records'>
	<input type=button onClick="location.href='admin.php?page=add-film'" value='Add Film'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current 
Staff Members'>
	

<form method="POST" action="res/pages/admin/rm-flm.php">
	Please enter the ID of the film you wish to remove:
	<input type="text" value="" name="removefilm" required>
	<input type="submit" name="submit" id="submit" value="Submit"> <br />
</form>

<small>
<?php

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

$query = mysql_query("SELECT * FROM films");


echo "<table border='1'>
<tr>
<th>Film ID</th>
<th>Film Title</th>
<th>Film Length</th>
<th>Film Genre</th>
<th>Film Rating</th>
<th>Film Year</th>
</tr>";

while($row = mysql_fetch_array($query))
{
	echo "<tr>";
	echo "<td>" . $row['film_ID'] . "</td>";
	echo "<td>" . $row['film_title'] . "</td>";
	echo "<td>" . $row['film_length'] . "</td>";
	echo "<td>" . $row['film_genre'] . "</td>";
	echo "<td>" . $row['film_rating'] . "</td>";
	echo "<td>" . $row['film_year'] . "</td>";
	echo"</tr>";
}
echo "</table>";
mysql_close($link);
?>
</small>
</center>
</div>