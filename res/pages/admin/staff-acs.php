<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
include 'sql-connection.php';

?>

<div id="body">
<h1> Staff Overview</h1>
<h2>

<form name="staffForm" method="POST" action="" class="center">
	Staff Select: <select name="sector_list" id="selector" class="inputstandard" onChange="enableFields(this);" autofocus>
	<script>
	if (!("autofocus" in document.createElement("select"))) {
		document.getElementById("selector").focus();
	}
	</script>

	<option value="0">...</option>
	<option value="1">New Staff Member</option>

    <?php
		$query = mysql_query("SELECT * FROM staff;");
        while ($row = mysql_fetch_assoc($query)) {
			echo '<option value="' . $row['role_type'] . '" label="' . $row['user_name']. '" id="' . $row['staff_ID'] . '">' . $row['user_name']. '</option>';
        }
		mysql_close($link);
    ?>

    </select>

	<br />
	Login: <input type="text" value="" name="login" id="login" disabled="disabled" required> <br />
	Password: <input type="password" value="" name="password" id="pass" disabled="disabled">  <br />
	Role: <input type="radio" name="editrole" value="manager" id="managerRole" disabled="disabled"> manager
	<input type="radio" name="editrole" value="staff" id="staffRole" disabled="disabled"> staff <br />
	<input type="text" value="" name="unique_id" id="unique_id" style="visibility:hidden">  <br />
	<br />
	<input type="button" name="submit" id="buSubmit" value="Save Changes" disabled="disabled" onClick="onSubmit(this);">
	<input type="button" name="reset" id="buDelete" value="Delete Staff Member" disabled="disabled" onClick="onDelete(this);"> 
	<br />
	<input type="submit" name="formSubmit" id="buFormSubmit" value="empty" style="visibility:hidden"> 
	<br />
	
</form>

</h2>
</div>
