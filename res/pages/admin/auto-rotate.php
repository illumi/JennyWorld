<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$query = mysql_query("SELECT * FROM bookingsuggestion;");

?>

<div id="body">
	<h1>Auto Rotate System</h1>
	<h2>
	<p>
		<form name="autoRotateForm" method="POST" action="res/pages/admin/rotate-do.php" class="center">
			
		</form>
		
		<table>
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
		

	</h2>
</div>
