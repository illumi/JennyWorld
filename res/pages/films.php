<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

include('res/lib/class_dbcon.php');
$connect = new doConnect();

?>
	
<script>
$(function() {
	$( "#accordion" ).accordion({
		autoHeight: false,
		collapsible: true
	});
});
</script>

<head>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/themes/base/jquery-ui.css" type="text/css" media="all" />

</head>

	
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
				//echo	"<tr><td><img src=\"" . addslashes($row['film_poster']) . "\" alt=\"poster\"/></td>";
				header("Content-type: image/jpeg");
				echo 	"<tr><td>".mysql_result($result, 0)."</td>";
				echo	"<td><table><div id='filmheaders'>Plot:</div><div id='filmdetails'>" . $row['film_plot'] . "</div><br/><br/>";
				echo	"<div id='filmheaders'>Length:</div><div id='filmdetails'>" . $row['film_length'] . "</div><br/>";
				echo	"<div id='filmheaders'>Genre:</div><div id='filmdetails'>" . $row['film_genre'] . "</div><br/>";
				echo	"<div id='filmheaders'>Rating:</div><div id='filmdetails'>" . $row['film_rating'] . "</div><br/></table>";
			}    
			
			 echo "</table></div>";
		}
		$connect->disc();
		?>
	</div>
</div>

