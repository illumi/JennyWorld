<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT * FROM bookingoverlaps;");

$connect->disc();
?>

<div id="body">
	<h1>Auto Rotate System</h1>
	<h3>
	<p>
		<form name="autoRotateForm" method="POST" action="res/pages/admin/rotate-do.php" class="center">
			
		</form>

		<table>
			<tr>
				<th>
					Move This Show
				</th>
				<th>
					From this Screen
				</th>
				<th>
					To This Screen
				</th>
				<th>
					to_this_screen
				</th>
				<th>
					currently_booked_for
				</th>
				<th>
					displaying_movie
				</th>
				<th>
					starting_on_this_date
				</th>
				<th>
					starting_this_time
				</th>
			</tr>
		
		
		<?php 
			while ($row = mysql_fetch_assoc($query)) {
			echo '
			<tr>
				<td>
					' .$row['move_this_film'] .'
				</td>
				<td>
					' .$row['move_this_show'] .'
				</td>
				<td>
					' .$row['from_this_screen'] .'
				</td>
				<td>
					' .$row['to_this_screen'] .'
				</td>
				<td>
					' .$row['currently_booked_for'] .'
				</td>
				<td>
					' .$row['displaying_movie'] .'
				</td>
				<td>
					' .$row['starting_on_this_date'] .'
				</td>
				<td>
					' .$row['starting_this_time'] .'
				</td>
			</tr>
			';
			}
		?>
		</table>
		

	</h3>
	<h2></h2>
</div>
