<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>
<div id="body">
<h1> Remove Staff Members</h1>
<center>
<h2>

<form method="POST" action="res/pages/admin/remove.php">
	Please enter the staff ID of the member you wish to remove:
	<input type="text" value="" name="removeid" required>
	<input type="submit" name="submit" id="submit" value="Submit"> <br />
</form>
<?php

include 'sql-connection.php';

$query = mysql_query("SELECT * FROM staff");

echo "<table border='1'>
<tr>
<th>Staff ID</th>
<th>Name</th>
<th>Role</th>
</tr>";

while($row = mysql_fetch_array($query))
{
	echo "<tr>";
	echo "<td>" . $row['staff_ID'] . "</td>";
	echo "<td>" . $row['user_name'] . "</td>";
	echo "<td>" . $row['role_type'] . "</td>";
	echo "</tr>";
}
echo "</table>";

mysql_close($link);

?>
</h2>
</center>
</div>
