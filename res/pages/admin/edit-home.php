<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}
include 'sql-connection.php';

$query = mysql_query("SELECT description FROM cinema;");

$text = mysql_fetch_assoc($query)

?>

<div id="body">
<h1>Edit Home Page</h1>
<h2>

	<form name="homeForm" method="POST" action="res/pages/admin/edit-home-do.php" class="center">
		<input type="text" value="<?php echo $text['description']?>" name="text" id="text" required>
		
		<input type="submit" name="formSubmit" id="buFormSubmit" value="Save!"> 
	</form>

</h2>
</div>