
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
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Promotion'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove Promotion'>

</div>
<section id="new film info">
	<form method="POST" action="res/pages/admin/add-flm.php">
	Film ID: <input type="text" value="" id="filmid" required> <br />
	Film Title: <input type="text" value="" id="filmtitle" required> <br />
	Film Length (minutes): <input type="text" value="" id="filmlength" required> <br />
	Film Genre: <input type="text" value="" id="end" required> <br />
	Film Rating: <input type="text" value="" id="desc" required> <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</center>
</div>
