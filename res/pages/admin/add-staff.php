<div id="body">
<h1> Add Staff Members</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=staff-acs'" value='Staff Overview'>
	<input type=button onClick="location.href='admin.php?page=add-staff'" value='Add Staff 
Members'>
	<input type=button onClick="location.href='admin.php?page=edit-staff'" value='Edit Current 
Staff Members'>
	<input type=button onClick="location.href='admin.php?page=remove-staff'" value='Remove Staff 
Member'>

</div>
<section id="new staff info">
	<form method="POST action="add.php" type="application/x-www-urlencoded">
	Name: <input type="text" value="" id="newStafName" required> <br />
	Password: <input type="text" value="" id="newStaffPassword" required> <br />
	Role: <input type="text" value="" id="newStaffRole" required> <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</center>
</div>
