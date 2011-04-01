<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1> Timetable Overview</h1>
<h2>
<table class="center">
<td>	

	<?php

	include('res/lib/class_dbcon.php');
	$connect = new doConnect();

	$date = $_GET['date'];
	
	echo $date . "<p>";
	
	$sql = "SELECT film_title, start_time, duration, screen_ID FROM screenfilms WHERE start_date = '$date'";
	$result = mysql_query($sql) or die(mysql_error());

	
	
	$tmpname = "";
	while($row = mysql_fetch_array($result)) {
		$film = $row['film_title'];
		$duration = $row['duration'];
		if ($film != $tmpname) {
			if ($tmpname != "") {
				echo "</div>";
			}
			echo "<br><table class='center'><td><div class='film'>";
			echo "$film <div class='duration'>Film length: $duration</div>";
			echo "</div></td></table>";
			$tmpname = $film;
			echo "<div class='time'>";
			echo $row['start_time'] . " - Screen: " . $row['screen_ID'] . "<br>";
		} else {
			echo $row['start_time'] . " - Screen: " . $row['screen_ID'] . "<br>";
		}
	}
		
	$connect->disc();
	
	
	$timstamp = strtotime($date);
	
	$prevdate = date('Y-m-d', strtotime(date("Y-m-d", $timstamp) . " -1 day"));
	$nextdate = date('Y-m-d', strtotime(date("Y-m-d", $timstamp) . " +1 day"));
	
	echo "<p><a href=\"admin.php?page=tt-acs&date=$prevdate\">Previous Day</a> ";
	echo "<a href=\"admin.php?page=tt-acs&date=$nextdate\">Next Day</a>";
	
	echo "
	<form method=\"post\" action=\"\">
		<table class=\"table-std\">
			<tr>
				<td>Go to Date:</td> 
				<td><input type=\"date\" name=\"date\" id=\"date\" required /></td>
			</tr>
			<table>
				<input type=\"button\" value=\"Search!\" onClick=\"onClickTtButton(this);\"/>
			</table>
		</table>
	</form>
	";
	?> 


</td>	
</table>	
	
<p>
</h2>
	
</div>
