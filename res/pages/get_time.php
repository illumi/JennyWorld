<?php
	if(isset($_POST['film']) && isset($_POST['fdate']))
	{
		$date = $_POST['fdate'];
		$film = $_POST['film'];
		
		include('../lib/class_dbcon.php');
		$connect = new doConnect();
		
		$option = '<option value="">-- Select Time --</option>';
		
		$query = mysql_query("SELECT start_time FROM showings WHERE film_ID = \"$film\" AND start_date = \"$date\";") or die(mysql_error());
		
		$connect->disc();
		
		while($row = mysql_fetch_assoc($query))
		{
			$option .= '<option value="' . $row['start_time'] . '">' . $row['start_time'] . '</option>';
		}
		
		echo $option;
	}
?>
