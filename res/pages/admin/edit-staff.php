
<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Edit Current Staff Members</h1>
<center>
	<input type=button onClick="location.href='admin.php?page=staff-acs'" value='Staff 
Overview'>
	<input type=button onClick="location.href='admin.php?page=add-staff'" value='Add Staff 
Members'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current 
Staff Members'>
	<input type=button onClick="location.href='admin.php?page=remove-staff'" value='Remove Staff 
Member'>
<h3>
<form method="POST" action="res/pages/admin/edit.php">
please enter the ID of the staff member you would like to edit:
<input type="text" value="" name="editid" required> <br />
Please enter new details (enter old values for unchanged fields) <br />
Name: <input type="text" value="" name="editname" required> <br />
Role(either staff or manager): <br /> 
<input type="radio" name="editrole" value="manager"> manager
<input type="radio" name="editrole" value="staff"> staff <br />
<input type="submit" name="submit" id="submit" value="Submit">
<input type="reset" name="reset" id="reset" value="Reset"> <br />

</form>
</h3>
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
<h3>
<form method="POST" action="res/pages/admin/editpw.php">
IF you wish to edit a user password, please enter the staff ID here:
<input type="text" value="" name="editid" required> <br />
Please enter the new password:<br />
<input type="password" value="" name="editpw" required> <br />
<input type="submit" name="submit" id="submit" value="Submit">
<input type="reset" name="reset" id="reset" value="Reset"> <br />

</form>

</h3>
</center>
</div>
