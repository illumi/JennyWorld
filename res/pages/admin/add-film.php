
<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1>Add Film</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=films-acs'" value='Film Records'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Film'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove Film'>

</div>
<section id="new film info">
	<form method="POST" action="res/pages/admin/add-flm.php">
	Film Title: <input type="text" value="" name="filmtitle" required> <br />
	Film Length (minutes): <input type="text" value="" name="filmlength" required> <br />
	Film Genre: <select name="genre" value="" id="genre" required>
			<option value="action">Action</option>
			<option value="crime">Crime</option>
			<option value="fantasy">Fantasy</option>
			<option value="horror">Horror</option>
		    </select><br />
	Film Rating: <select name="rating" value="" id="rating" required>
			<option value="U">U</option>
			<option value="PG">PG</option>
			<option value="12">12</option>
			<option value="12A">12A</option>
			<option value="15">15</option>
			<option value="18">18</option>
			<option value="R18">R18</option>
		    </select><br />
	Year Released: <input type="text" value="" name="year" required> <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
</section>
</center>
</div>
