<?php
	if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}


?>

<div id="body">
<h1>Book Tickets</h1>
<h2>

<form name="findForm" method="POST" action="findbooking.php" class="center">
	Booking Ref: <input type="text" value="" name="login" id="login" required><br />
	<input type="submit" name="formSubmit" id="buFormSubmit" value="Find Booking!"> 
</form>

<br />
<form name="bookForm" method="POST" action="makebooking.php" class="center">
	
	Film: <input type="text" value="" name="login" id="login" required><br />
	Showing: <input type="text" value="" name="login" id="login" required><br />
	
	Customer name:<input type="text" value="" name="login" id="login" required><br />
	
	Number of tickets: <input type="text" value="" name="login" id="login" required><br />
	
	<input type="submit" name="formSubmit" id="buFormSubmit" value="Make Booking!"> 
</form>

<br />

</h2>
</div>