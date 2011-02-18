<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/
if( isset($_SESSION['login']) && isset($_SESSION['admin']))
{
    header('Location: ./admin.php');
}
?>


<!DOCTYPE html>

<?php 
	include 'res/config/headder.php'; //loads the logo and the nav bar
?>

	<div id="maincontent"> <!-- define whatever gets loaded here as "mainconnent"-->
    
    <?php
	//parse URL to load content
	if(isset($_GET['page'])) {
		if(file_exists('res/pages/'.$_GET['page'].'.php')) {
			include('res/pages/'.$_GET['page'].'.php');
		} else {
			include 'res/pages/error.php';
		} 
	} else {
			include('res/pages/start.php');
	}	
    ?>
    
	</div>
    
<?php 	
	include 'res/config/footer.php'; //loads the footer file
?>

</html>
