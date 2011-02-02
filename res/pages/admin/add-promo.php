<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Add Promotions</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=promo-acs'" value='Promotion Overview'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Promotion'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove Promotion'>

</div>
<section id="new promotion info">
	<form method="POST" action="res/pages/admin/add-pro.php">
	Film ID: <input type="text" value="" id="filmid" required> <br />
	Name: <input type="text" value="" id="promoname" required> <br />
	Start Date: (Format: YYYY-MM-DD) <input type="text" value="" id="start" required> <br />
	End Date: (Format: YYYY-MM-DD) <input type="text" value="" id="end" required> <br />
	Description: <input type="text" value="" id="desc" required> <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</center>
</div>
