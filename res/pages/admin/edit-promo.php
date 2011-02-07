<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Edit Promotions</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=promo-acs'" value='Promotions
Overview'>
	<input type=button onClick="location.href='admin.php?page=add-promo'" value='Add
Promotion'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit
Promotion'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove
Promotion'>
</div>
