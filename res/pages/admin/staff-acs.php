<div id="body">
<h1> Staff Overview</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=staff-acs'" value='Staff 
Overview'>
	<input type=button onClick="location.href='admin.php?page=add-staff'" value='Add Staff 
Members'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current 
Staff Members'>
	<input type=button onClick="location.href='admin.php?page=remove-staff'" value='Remove Staff 
Member'>
</div>
<?php

include 'sql-connection.php';

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

$query = mysql_query("SELECT * FROM staff");

echo "<table border='1'>
<tr>
<th>Staff ID</th>
<th>Name</th>
<th>Password</th>
<th>Role</th>
</tr>";

while($row = mysql_fetch_array($query))
{
	echo "<tr>";
	echo "<td>" . $row['staff_ID'] . "</td>";
	echo "<td>" . $row['user_name'] . "</td>";
	echo "<td>" . $row['password'] . "</td>";
	echo "<td>" . $row['role_type'] . "</td>";
	echo"</tr>";
}
echo "</table>";
mysql_close($con);

?>
</center>
</div>
