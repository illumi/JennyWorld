<<<<<<< HEAD
=======
<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
?>

>>>>>>> 3c6a49ffb508fc52b395258bf060a3c998f7052d
<div id="body">
<h1>Remove Promo</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=add-promo'" value='Add Promotion'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit Promotion'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove Promotion'>
</div>
