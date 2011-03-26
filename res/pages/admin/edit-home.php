<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}
include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT description FROM cinema;");

$text = mysql_fetch_assoc($query);

$connect->disc();
?>

<div id="body">
	<h1>Edit Home Page</h1>
	<h2>
	<p>
		<form name="homeForm" method="POST" action="res/pages/admin/edit-home-do.php" class="center">

			<textarea rows="5" cols="75" name="TxtareaInput" id="TxtareaInput" class="txtBox"
				onfocus="SetMsg(this, true);"
				onblur="SetMsg(this, false);"
	></textarea>
			<table border="0" class="center">
			<p>
			<input type="submit" name="formSubmit" id="buFormSubmit" value="Save!">
			</table> 
			</table>
		</form>

	</h2>
</div>
