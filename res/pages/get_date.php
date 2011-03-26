<?php
    if(isset($_POST['film']))
    {

		$start_date = date('Y-m-d');
		$end_date = date('Y-m-d', strtotime("+10 days"));
		
		
        include('../lib/class_dbcon.php');
        $connect = new doConnect();
		
		$film = $_POST['film'];
		
		echo $film;
		
        $option = '<option id="0">-- Select Date --</option>';
		
        $query = mysql_query("SELECT showing_ID, start_date FROM showings WHERE film_id = \"$film\" AND start_date >= \"$start_date\" AND start_date <= \"$end_date\";") or die(mysql_error());
		
		$connect->disc();
		
        while($row = mysql_fetch_assoc($query))
        {
            $option .= '<option value="' . $row['start_date'] . '">' . $row['start_date'] . '</option>';
        }
        
        echo $option;
    }
?>
