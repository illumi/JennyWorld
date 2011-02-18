<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
include 'sql-connection.php';

?>

<SCRIPT TYPE="text/javascript">
<!--
function loadUser(form)
{
   
}
//-->
</SCRIPT>



<div id="body">
<h1> Staff Overview</h1>
<center>
<h2>

<form method="POST" action="view_project.php">
	<!--<input type="hidden" name="sector" value="sector_list">-->
	<select name="sector_list" class="inputstandard" onChange="return confirm('place holder for JS function')">
	<option value="default">Staff Select</option>

    <?php
		$query = mysql_query("SELECT * FROM staff;");
        $i=1;
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $i . '" name="' . $row['role_type']. '">' . $row['user_name']. '</option>';
			$i++;
        }
		mysql_close($link);
    ?>

    </select>
	<!--<input type="submit" value="Go!">-->
</form>

</h2>
<h3></h3>
</center>
</div>
