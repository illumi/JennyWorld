<?php
    if(isset($_POST['film']))
    {
        include('../lib/class_dbcon.php');
        $connect = new doConnect();
		
		$film = $_POST['film'];
		
		echo $film;
		
        $option = '<option id="0">-- Select Date --</option>';
		
        $query = mysql_query("SELECT showing_ID, start_date FROM showings WHERE film_id = \"$film\";") or die(mysql_error());
		
        while($row = mysql_fetch_assoc($query))
        {
            $option .= '<option value="' . $row['start_date'] . '">' . $row['start_date'] . '</option>';
        }
        
        echo $option;
    }
?>
