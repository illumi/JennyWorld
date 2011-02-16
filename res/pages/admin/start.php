<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

if( (!isset($_SESSION['login']) && !isset($_SESSION['admin'])))
{
	header('Location: ./index.php?page=adminLogin');
}
?>
	

<div id="body">
	<center><h1>Administration</h1></center>

	<h1>Thank You for logging in.</h1>

</div>
