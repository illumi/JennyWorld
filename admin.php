<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

session_start();
?>


<!DOCTYPE html>

<?php 
	if( (!isset($_SESSION['login']) && !isset($_SESSION['admin'])) || !$_SESSION['admin'])
	{
		header('location: ./index.php');
	}

	
	include 'res/config/admin/headder.php'; //loads the admin logo and the nav bar
?>

	<div id="maincontent"> <!--define whatever gets loaded here as "mainconnent"-->
	<?php
	
	echo 'Welcome : '.$_SESSION['login'];
	
	//parse URL to load content
	if(isset($_GET['page'])) {
		if(file_exists('res/pages/admin/'.$_GET['page'].'.php')) {
			include('res/pages/admin/'.$_GET['page'].'.php');
		} else {
			include 'res/pages/error.php';
		} 
	} else {
			include('res/pages/admin/start.php');
	}	
	?>

</div>
<?php 	
	include 'res/config/footer.php'; //loads the admin footer file
?>

</html>
