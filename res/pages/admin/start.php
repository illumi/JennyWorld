<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

if( !isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT * FROM bookingsuggestion;");

$row = mysql_fetch_assoc($query);

$connect->disc();

if ($row == null) {
	header('Location: empty');
}
?>

	<div id="body">
		<h1>Administration</h1>

	<?php	
		echo "<h2>Welcome " . $_SESSION['login'] . ", thank you for logging in. </br></br>";	
	?>
	
	

	</div>
