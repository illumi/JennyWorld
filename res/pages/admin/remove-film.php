<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Remove Film</h1>
<center>
	<div id="header">
		<input type=button onClick="location.href='admin.php?page=films-acs'" value='Film Records'>
		<input type=button onClick="location.href='admin.php?page=add-film'" value='Add Film'>
		<input type=button onClick="location.href='admin.php?page=edit-film'" value='Edit Film'>
	</div>	
<section id="remove info">
    <h3>
	<form method="POST" action="res/pages/admin/rm-flm.php">
	   <table border="0">
		<tr>
		<td>Enter the ID of the film you wish to remove:</td>
		<td><input type="text" value="" name="removefilm" required></td>
		<tr height="10px"></tr>
	   </table>
	   <table border="0">
		<td><input type="submit" name="submit" id="submit" value="Submit"></td>
		<td><input type="reset" name="reset" id="reset" value="Reset"></td>
		</tr>
	   </table>
        </form>
    </h3>
</section>
<h3>
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
</h3>
</center>
</div>
