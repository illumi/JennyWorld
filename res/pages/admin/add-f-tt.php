<?php

include('res/lib/class_dbcon.php');
$connect = new doConnect();


$film = $_POST['id'];
$start_date = strtotime($_POST['start']); //convert to timestamp
$end_date = strtotime($_POST['end']); //convert to timestamp
$showings = $_POST['numshowings'];
$start_time = $_POST['newTime']; 

//$mins = substr($start_time, -2);
//$hours = substr($start_time, 0, -3);

$interval = (($end_date-$start_date)/60/60/24); //gets number of days between two dates. Not as nice as php5.3 though.
$end_date = date('Y-m-d', $end_date);//translate end_date abck into correct format

echo "interval: ". $interval . "<p><p>";
// in order to know if the user wants to add a new film or not
if(!empty($_POST['txtFilmYear']) && !empty($_POST['txtAddMovieTitle']))
{
    
}

$length = "SELECT film_length FROM films WHERE film_ID = '$film'";
$res1 = mysql_query($length) or die(mysql_error());

$row1 = mysql_fetch_array($res1);
$length = $row1['film_length'];

	
	for( $i=0; $i <= $interval; $i++) { //loop for every day the film should be shown
	$mins = substr($start_time, -2);		//Reset time for each day
	$hours = substr($start_time, 0, -3);
	
	$day = date('Y-m-d', strtotime(date("Y-m-d", $start_date) . " +" . $i . " day")); //calc day here
	
		for( $j=0; $j < $showings; $j++) {	//loop for number of times per day it should be shown
			if ($j == 0) { //if first showing
				
				$endTime = date("H:i", strtotime('+96 minutes', strtotime($start_time)));
				
				//Below checks which screen is free at this time and date then use that value
				$screens = "SELECT * FROM screens WHERE screen_ID NOT IN (SELECT screen_ID FROM screenshows WHERE end_date >= '$day' AND end_time >= '$start_time' AND end_date <= '$day' AND end_time <= '$endTime' UNION SELECT screen_ID FROM screenshows WHERE start_date >= '$day' AND start_time >= '$start_time' AND start_date <= '$day' AND start_time <= '$endTime' UNION SELECT screen_ID FROM screenshows WHERE start_date <= '$day' AND start_time <= '$start_time' AND end_date >= '$day' AND end_time >= '$endTime') ORDER BY capacity DESC";

				$res2 = mysql_query($screens); 
				$row2 = mysql_fetch_assoc($res2);
				$screen = $row2['screen_ID'];
				
				$sql= "INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) 
						VALUES ('$screen', '$film', '$day', '$end_date', '$start_time', '$endTime')";
				$result = mysql_query($sql) or die(mysql_error());

			}
			else { //next showings
				
				$length = $length + 30; //add 30 mins after film to allow for cleaning of screen
				$temp = round($length / 60); //find next start time
				
				if ($hours < 22) {
					$hours = $hours + $temp;
					$time = $hours . ":" . $mins; //new start_time
					$endTime = date("H:i", strtotime('+'.$length.' minutes', strtotime($time)));
					
					//Below checks which screen is free at this time and date then use that value
					$screens = "SELECT * FROM screens WHERE screen_ID NOT IN (SELECT screen_ID FROM screenshows WHERE end_date >= '$day' AND end_time >= '$time' AND end_date <= '$day' AND end_time <= '$endTime' UNION SELECT screen_ID FROM screenshows WHERE start_date >= '$day' AND start_time >= '$time' AND start_date <= '$day' AND start_time <= '$endTime' UNION SELECT screen_ID FROM screenshows WHERE start_date <= '$day' AND start_time <= '$time' AND end_date >= '$day' AND end_time >= '$endTime') ORDER BY capacity DESC";
					
					$res3 = mysql_query($screens); 
					$row3 = mysql_fetch_assoc($res3);
					$screen = $row3['screen_ID'];

					$sql= "INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('$screen', '$film', '$day', '$end_date', '$time', '$endTime')";
					$result = mysql_query($sql) or die(mysql_error());

				}
			}
		}
	}

$connect->disc();
header("location: admin.php?page=tt-acs");

?>
