<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

if( !isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}
?>

	<div id="body">
		<h1>Administration</h1>

	<?php	
	echo "<h2>Welcome " . $_SESSION['login'] . ", thank you for logging in. </br></br>";	
	
	
	if($_SESSION['admin'] == 1  && $_SESSION['staff'] == 1){
		echo "Click <a href=\"admin.php?page=switchStaffView\">here</a> to go to manager view <p><p></h2>";
	} else if ($_SESSION['admin'] == 1) {
		echo "Click <a href=\"admin.php?page=switchStaffView\">here</a> to go to staff view <p><p></h2>";
	}
	
	?>
	
	

	</div>
	