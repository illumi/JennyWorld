
<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1>Add Film</h1>
<center>

<section id="new film info">
    <h3>
	<form method="POST" action="res/pages/admin/add-flm.php">
		<table border= "0">
			<tr>
			<td>Film Title:</td> <td><input type="text" value="" name="filmtitle" required></td>
			</tr>
			<tr>
			<td>Film Length (minutes):</td> <td><input type="text" value="" name="filmlength" required></td>
			</tr>
			<tr>
			<td>Film Genre:</td> <td><select name="genre" value="" id="genre" required>
			<option value="action">Action</option>
			<option value="animation">Animation</option>
			<option value="comedy">Comedy</option>
			<option value="crime">Crime</option>
			<option value="documentary">Documentary</option>
			<option value="drama">Drama</option>
			<option value="fantasy">Fantasy</option>
			<option value="horror">Horror</option>
			<option value="romcom">Romantic Comedy</option
			<option value="thriller">Thriller</option>
			<option value="scifi">Science Fiction</option
			</select></td>
			</tr>
			<tr>
			<td>Film Rating (BBFC):</td> <td><select name="rating" value="" id="rating" required>
			<option value="U">U</option>
			<option value="PG">PG</option>
			<option value="12">12</option>
			<option value="12A">12A</option>
			<option value="15">15</option>
			<option value="18">18</option>
			<option value="R18">R18</option>
		        </select></td>
			</tr>
			<tr>
			<td>Year Released:</td> <td><input type="text" value="" name="year" required></td>
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
</section>

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
