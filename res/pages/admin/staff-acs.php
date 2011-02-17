<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>
<div id="body">
<h1> Staff Overview</h1>
<center>
<h2>
<?php

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

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
	echo"</tr>";
}
echo "</table>";
mysql_close($con);

?>
</h2>
<h3></h3>
</center>
</div>
