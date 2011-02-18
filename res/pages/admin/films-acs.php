<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1>Film Records</h1>
<center>

<h3>
<?php

include 'sql-connection.php';

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


