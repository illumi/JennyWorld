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

<form name="staffForm" method="POST" action="view_project.php">
	<!--<input type="hidden" name="sector" value="sector_list">-->
	Staff Select: <select name="sector_list" class="inputstandard" onChange="enableFields()">
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
	<!--<input type="submit" value="Go!">-->
	
	    
    
	<!--<form method="POST" action="res/pages/admin/remove.php">-->
	<br />
	Login: <input type="text" value="" name="login" id="login"> <br />
	Password: <input type="text" value="" name="password">  <br />
	Role: <input type="radio" name="editrole" value="manager"> manager
	<input type="radio" name="editrole" value="staff"> staff <br />
	<br />
	<br />
	<input type="submit" name="submit" id="submit" value="Save Changes">
	<input type="submit" name="submit" id="submit" value="Delete Staff Member"> 
	<br />
	 
	<!--</form>-->
	
</form>

</h2>
<h3></h3>
</center>
</div>
