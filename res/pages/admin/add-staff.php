<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Add Staff Members</h1>
<center>
<h2>
	<input type=button onClick="location.href='admin.php?page=staff-acs'" value='Staff
Overview'>
	<input type=button onClick="location.href='admin.php?page=add-staff'" value='Add Staff
Members'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current
staff Members'>
	<input type=button onClick="location.href='admin.php?page=remove-staff'" value='Remove Staff
Member'>

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
<section id="new staff info">
	<form method="POST" action="res/pages/admin/add.php">
	Name:<input type="text" value="" name="newname" required> <br />
	Password:<input type="password" value="" name="newpassword" required> <br />
	Role:<br /><input type="radio" name="newrole" value="manager"/> manager
	      <input type="radio" name="newrole" value="staff"/> staff <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</h2>
</center>
</div>
