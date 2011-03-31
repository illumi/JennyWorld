<?php

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$film = $_POST['id'];
$start_date = strtotime($_POST['start']);
$end_date =  strtotime($_POST['end']);
$showings = $_POST['numshowings'];
$start_time = $_POST['newTime']; 

$time = explode(':', $start_time, 2); //array of size 2 with hours in [0] and mins in [1]

$interval = (($end_date-$start_date)/60/60/24); //gets number of days between two dates. Not as nice as php5.3 though.

//$var = date('Y-m-d', strtotime("+10 days"));

// in order to know if the user wants to add a new film or not
if(!empty($_POST['txtFilmYear']) && !empty($_POST['txtAddMovieTitle']))
{
    
}

$length = "select film_length from films where film_ID = '$film'";
$run = mysql_query($length) or die(mysql_error());

while($row = mysql_fetch_array($run)){
	  
		$length = $row['film_length'];
	} 
	
	for( $i=0; $i < $interval; $i++) { //loop for every day the film should be shown
		for( $j=0; $j < $showings; $j++) {	//loop for number of times per day it should be shown
		
			if ($j == 0) { //if first showing

				//TO-DO check which screen is free at this time and date then use that value

				$sql= "INSERT INTO showings (start_date, end_date, start_time, film_ID, screen_ID) 
					   VALUES('$start_date', '$end_date', '$start_time', '$film', '1')";
				$result = mysql_query($sql) or die(mysql_error());

			}
			else {
				
				//TO-DO increment day by 1
				
				$length = $length + 30; //add 30 mins after film to allow for cleaning of screen
				$temp = round($length / 60); //find next start time
				
				if ($hours < 22) {
					$hours = $hours + $temp;
					$time = $hours . ":" . $mins;
					
					$sql= "INSERT INTO showings (start_date, end_date, start_time, film_ID, screen_ID) 
						   VALUES('$start_date', '$end_date', '$time', '$film', '1')";
					$result = mysql_query($sql) or die(mysql_error());

				}
			}
				
		}
	}

$connect->disc();
header("location: admin.php?page=tt-acs");

?>
