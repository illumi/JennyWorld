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
	echo "<h2>Welcome " . $_SESSION['login'] . ", thank you for logging in. </br></br>";	
	
	
	if($_SESSION['admin'] == 1  && $_SESSION['staff'] == 1){
		echo "Click <a href=\"admin.php?page=staffViewOff\">here</a> to go to manager view </br></br></h2>";
	} else if ($_SESSION['admin'] == 1) {
		echo "Click <a href=\"admin.php?page=staffViewOn\">here</a> to go to staff view </br></br></h2>";
	}
	
	?>
	
	

	</div>
	