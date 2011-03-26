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

	$sql1 = mysql_query("select count(f.film_ID) from films f, showings s where s.film_ID = f.film_ID and s.start_date <= '$today' and s.end_date >= '$today';");
	$count = mysql_fetch_assoc($sql1); 
	
	$sql2 = mysql_query("select film_title from films f, showings s where s.film_ID = f.film_ID and s.start_date <= '$today' and s.end_date >= '$today';");

	$connect->disc();
	
	$title = array();
	
	for( $i=0; $i< mysql_num_rows($sql2); $i++)
    $title[$i] = mysql_fetch_assoc($sql2);
	
	for( $i=0; $i< $count['count(f.film_ID)']; $i++)
    echo "<h6><a href='#'>" . $title[$i]['film_title'] ."</a></h5><div><p>INFO</p></div>";
	
	?>
	</div>

</div><!-- End demo -->

			
	</div>
