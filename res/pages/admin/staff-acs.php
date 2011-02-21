<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
include 'sql-connection.php';

?>

<div id="body">
<h1> Staff Overview</h1>
<center>
<h2>

<form name="staffForm" method="post">
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
        $i=2;
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $i . '" name="' . $row['role_type']. '">' . $row['user_name']. '</option>';
			$i++;
        }
		mysql_close($link);
    ?>

    </select>


	<!--<form method="POST" action="res/pages/admin/remove.php">-->
	<br />
	Login: <input type="text" value="" name="login" id="login" disabled="disabled"> <br />
	Password: <input type="text" value="" name="password" id="pass" disabled="disabled">  <br />
	Role: <input type="radio" name="editrole" value="manager" id="managerRole" disabled="disabled"> manager
	<input type="radio" name="editrole" value="staff" id="staffRole" disabled="disabled"> staff <br />
	<br />
	<br />
	<input type="submit" name="submit" id="buSubmit" value="Save Changes" disabled="disabled" onClick="onSubmit(this);">
	<input type="submit" name="reset" id="buDelete" value="Delete Staff Member" disabled="disabled" onClick="onDelete(this);"> 
	<br />
	
</form>

</h2>
<h3></h3>
</center>
</div>
