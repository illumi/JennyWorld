<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

if( !isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin&fail=');
}

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT * FROM bookingoverlaps;");

$row = mysql_fetch_assoc($query);

$connect->disc();

?>

	<div id="body">
		<h1>Administration</h1>

	<?php	
		echo "<h2>Welcome " . $_SESSION['login'] . ", thank you for logging in. <p><p>";	
		
		if($_SESSION['admin'] == 1  && $_SESSION['staff'] == 1){
			echo "Click below to return to Manager Mode.";
		} else if ($_SESSION['admin'] == 1) {
			if ($row == !null) {
				echo "There are sugested rotations available. Click <a href=\"admin.php?page=auto-rotate\">here</a> to view them.<p><p>";
			}
			echo "Click below to enter Staff Mode.";
		}
	?>
	
	

	</div>
