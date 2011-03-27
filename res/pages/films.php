<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

include('res/lib/class_dbcon.php');
$connect = new doConnect();

?>

	

	<div id="body">
	
			<script>
	$(function() {
		$( "#accordion" ).accordion();
	});
	</script>
	
	<div class="demo">

	<div id="accordion">
	
	<?php
	
	$today = date('Y-m-d');

	$sql1 = mysql_query("select count(distinct f.film_ID) from films f, showings s where s.film_ID = f.film_ID and s.start_date <= '$today' and s.end_date >= '$today';");
	$count = mysql_fetch_assoc($sql1); 
	
	$sql2 = mysql_query("select distinct film_title from films f, showings s where s.film_ID = f.film_ID and s.start_date <= '$today' and s.end_date >= '$today';");
	
	$title = array();
	
	for( $i=0; $i< mysql_num_rows($sql2); $i++)
    $title[$i] = mysql_fetch_assoc($sql2);
    
    
	
	for( $i=0; $i< $count['count(distinct f.film_ID)']; $i++)
	{
		
		$film = $title[$i]['film_title'];
			
		echo "<h5><a href='#'>" . $title[$i]['film_title'] ."</a></h5><div><table>";
		
		$query = "SELECT * FROM films where film_title = '$film'";
		$result = mysql_query($query) or die(mysql_error());
		
		// Print out the contents of each row into a table 
		while($row = mysql_fetch_array($result))
		{
			echo	"<tr><td>Title</td><td>" . $row['film_title'] . "</td></tr>";
			echo	"<tr><td>Plot</td><td>" . $row['film_plot'] . "</td></tr>";
			echo	"<tr><td>Length</td><td>" . $row['film_length'] . "</td></tr>";
			echo	"<tr><td>Genre</td><td>" . $row['film_genre'] . "</td></tr>";
			echo	"<tr><td>Rating</td><td>" . $row['film_rating'] . "</td></tr>";
		}    
		
		 echo "</table></div>";
	}
	$connect->disc();
	?>
	</div>

</div><!-- End demo -->

			
	</div>
