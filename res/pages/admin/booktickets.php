<?php
	if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}


?>

<div id="body">
<h1>Book Tickets</h1>
<h2>

<center><form name="findForm" method="POST" action="admin.php?page=findbooking" class="center">
<table>
	<tr>
	<td>Booking Ref:</td> <td><input type="text" value="" name="ref" id="ref" required></td><br />
	</tr>
	<table>
	<p>
	<input type="submit" name="formSubmit" id="buFormSubmit" value="Find Booking!"> 
	</table>
</table>
</form></center>

	<center><form name="bookForm" method="POST" action="makebooking.php" class="center">
	<table>
	<tr>
	<td>Film:</td> <td><input type="text" value="" name="login" id="login" required></td><br />
	</tr>
	<tr>
	<td>Showing:</td> <td><input type="text" value="" name="login" id="login" required></td><br />
	</tr>
	<tr>
	<td>Customer name:</td><td><input type="text" value="" name="login" id="login" required></td><br />
	</tr>
	<tr>
	<td>Number of tickets:</td> <td><input type="text" value="" name="login" id="login" required></td><br />
	</tr>
	<table>
	<p>
	<input type="submit" name="formSubmit" id="buFormSubmit" value="Make Booking!"> 
	</table>
</table>	
</form></center>


<br />

</h2>
</div>
