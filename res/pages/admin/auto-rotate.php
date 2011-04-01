<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin&fail=');
}

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT * FROM bookingoverlaps;");

$connect->disc();

$ids = "";
$screens = "";
?>

<div id="body">
	<h1>Auto Rotate System</h1>
	<h3>
	<p>
		<table  class="center">
			<tr>
				<th>
					On Date
				</th>
				<th>
					Current Screen
				</th>
				<th>
					Proposed Screen
				</th>
				<th>
					For Film
				</th>
				<th>
					At Time
				</th>
				<th>
					Tickets sold
				</th>
			</tr>
		
		
		<?php 
			$i=1;
			while ($row = mysql_fetch_assoc($query)) {
				
				if ($i != $row['screen_ID']) {
					echo '
						<tr>
							<td>
								' .$row['start_date'] .'
							</td>
							<td>
								' .$row['screen_ID'] .'
							</td>
							<td>
								'.$i.'
							</td>
							<td>
								' .$row['filmtitle'] .'
							</td>
							<td>
								' .$row['start_time'] .'
							</td>
							<td>
								' .$row['tickets_sold'] .'
							</td>
						</tr>';
				$ids .=  $row['showing_id'].",";
				$screens .= $i.",";
				} 
			$i++;
			}
			$ids = substr($ids,0,-1);
			$screens = substr($screens,0,-1);
		?>
		</table>
		<form name="autoRotateForm" method="POST" action="admin.php?page=rotate-do" class="center">
			<table border="0" class="center">
				<input type="input" name="ids" id="ids" <?php echo "value=\"$ids\""?> style="visibility:hidden"/>
				<input type="input" name="screens" id="screens" <?php echo "value=\"$screens\""?> style="visibility:hidden"/> <p>
				<input type="submit" name="submit" id="submit" value="Make Changes!">
			</table>
		</form>

	</h3>
	<h2></h2>
</div>
