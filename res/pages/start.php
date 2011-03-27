<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 
include('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT description FROM cinema;");

$text = mysql_fetch_assoc($query);
$connect->disc();
?>

<script type="text/javascript">
	$(document).ready(function() {
	$('#loader').hide();

	$('#film').change(function(){

		$('#fdate').fadeOut();
		$('#ftime').fadeOut();
		$('#loader').show();

		$.post("res/pages/get_date.php", {
			film: $('#film').val()
		}, function(response){
			setTimeout("finishAjax('fdate', '"+escape(response)+"')", 400);
			setTimeout("finishAjax('ftime', '<option id=\"0\">-- Select Date --</option>')", 400); 
		});
		return false;
	});

	$('#fdate').change(function(){

		$('#ftime').fadeOut();
		$('#loader').show();

		$.post("res/pages/get_time.php", {
			film: $('#film').val(),
			fdate: $('#fdate').val()
		}, function(response){
			setTimeout("finishAjax('ftime', '"+escape(response)+"')", 400);
		});
		return false;
	});

	});

	function finishAjax(id, response){
	 $('#loader').hide();
	 $('#'+id).html(unescape(response));
	 $('#'+id).fadeIn();
	}
</script>


	<div id="body">
		<div id="booking">
		
			<form name="bookForm" method="POST" action="index.php?page=booking-do">
				<table>
					<tr>
						<th>Book Tickets</th>
					<tr>
						<td>		
							<label for="film">Film:</label>
								<select id="film" name="film" style="width:250px;">
									<option id="0">-- Select Film --</option>
									<?php
										$start_date = date('Y-m-d');
										$end_date = date('Y-m-d', strtotime("+10 days"));
										
										$connect = new doConnect();
							
										$q = mysql_query("SELECT DISTINCT f.film_ID, f.film_title FROM films f, showings s WHERE f.film_ID = s.film_ID AND s.start_date >= \"$start_date\" AND s.start_date <= \"$end_date\" ORDER BY film_title;");
										while($row = mysql_fetch_assoc($q))
										{
											echo '<option value="'.$row['film_ID'].'">'.$row['film_title'].'</option>';
										}
										$connect->disc();
									?>
								</select>
							<p>
							<label for="fdate">Date:</label>
								<select id="fdate" name="fdate" style="width:250px;">
									<option value="">-- Select Film --</option>
								</select>
							<p>
							<label for="ftime">Time:</label>
								<select id="ftime" name="ftime" style="width:250px;">
									<option value="">-- Select Film --</option>
								</select>
							<p>
							<input type="submit" name="submit" id="submit" value="Submit">
						</td>
					</tr>
				</table>
			</form>		
		</div>

		<div id="mainContent">
		
			<h1>Welcome to Jworld</h1>
				
			<h3>
			<?php
				echo $text['description'];
			?>
			</h3>
			<p>
			<h2></h2>
		</div>	

	</div>
