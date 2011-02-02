<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Add Staff Members</h1>
<center>
<p>
<div id="header">
	<input type=button 
onClick="location.href='admin.php?page=staff-acs'" value='Staff
Overview'>
	<input type=button onClick="location.href='admin.php?page=add-staff'" value='Add Staff 
Members'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current 
Staff Members'>
	<input type=button onClick="location.href='admin.php?page=remove-staff'" value='Remove Staff 
Member'>

</div>
<section id="new staff info">
	<form method="POST" action="res/pages/admin/add.php">
	Name: <input type="text" value="" name="newname" required> <br />
	Password: <input type="text" value="" name="newpassword" required> <br />
	Role:	 <input type="radio" name="newrole" value="manager"/> manager <br />
	&nbsp&nbsp      <input type="radio" name="newrole" value="staff"/> staff <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</center>
</div>
