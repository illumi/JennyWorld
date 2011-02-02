<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Add Staff Members</h1>
<center>
<br />
<h2>
	<input type=button onClick="location.href='admin.php?page=staff-acs'" value='StaffOverview'>
	<input type=button onClick="location.href='admin.php?page=add-staff'" value='Add Staff Members'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current Staff Members'>
	<input type=button onClick="location.href='admin.php?page=remove-staff'" value='Remove Staff Member'>

<section id="new staff info">
	<form method="POST" action="res/pages/admin/add.php">
	Name:<input type="text" value="" name="newname" required> <br />
	Password:<input type="text" value="" name="newpassword" required> <br />
	Role:<br /><input type="radio" name="newrole" value="manager"/> manager
	      <input type="radio" name="newrole" value="staff"/> staff <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</h2>
</center>
</div>
