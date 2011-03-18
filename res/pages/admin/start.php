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
		<h1>Administration</h1>

	<?php	
	echo "<h2>Welcome " . $_SESSION['login'] . ", thank you for logging in.</h2>";	
	?>
	
	


	</div>
