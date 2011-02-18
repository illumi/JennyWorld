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

<form method="POST" action="view_project.php" onclick="view_project.php" onselect="view_project.php">
	<!--<input type="hidden" name="sector" value="sector_list">-->
	<select name="sector_list" class="inputstandard" onclick="view_project.php" onselect="view_project.php">
	<option value="default" onclick="view_project.php" onselect="view_project.php">Staff Select</option>

    <?php
		$query = mysql_query("SELECT * FROM staff;");
        $i=1;
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $i . '" name="' . $row['role_type']. '" onclick="view_project.php" onselect="view_project.php">' . $row['user_name']. '</option>';
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
