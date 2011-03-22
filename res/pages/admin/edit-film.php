<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

?>


<div id="body">
<h1>Edit Film</h1>
<h3>

<section id="edit info">

    <P>Please enter new details (enter old values for unchanged fields)</p>
	<form method="POST" action="res/pages/admin/edt-flm.php">
	<table border="0" class="center">
		<tr>
		<td>Film ID:</td>
			<td>
 		<input type="text" value="" name="edit_filmid" required>
				</td>
		</tr>
		<tr>
		<td>Film Title: </td>	
		<td> 
 			 <input type="text" value="" name="edit_filmtitle" required>
		</td>
	</tr>
		<tr>
			<td>Film Length (minutes):</td> <td><input type="text" value="" name="edit_filmlength" required></td>
		</tr>
		<tr>
			<td>Film Genre:</td> <td><select name="edit_genre" value="" id="genre" required>
				<option value="action">Action</option>
				<option value="crime">Crime</option>
				<option value="fantasy">Fantasy</option>
				<option value="horror">Horror</option>
			</select><br /></td>
		</tr>
		<tr>
			<td>Film Rating:</td> 
			<td><select name="edit_rating" value="" id="rating" required>
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
			<td>Year Released:</td> <td><input type="text" value="" name="edit_year" required></td>
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
</section>
<h3>
<?php

include 'sql-connection.php';

$query = mysql_query("SELECT * FROM films");


echo "<table border='1' class=\"center\">
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
</div>
