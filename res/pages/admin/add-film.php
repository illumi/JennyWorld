
<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1>Add Film</h1>
<h3><p>

<script type="text/javascript">
	$(document).ready(function() {

	$('#buSsearch').click(function(){
		
		$.ajax({ 
			url: "http://www.imdbapi.com/?t=" + $('#title').val() + "&y="+$('#year').val(), 
			dataType: "jsonp", 
			error: function(j,s,e) {
				alert("Error: "+e);
			}, success: function(d) {
				$('#title').val(d.Title);
				$('#year').val(d.Year);
				$('#filmdesc').val(d.Plot);

				var time, rawtime = d.Runtime.split(" ");
				if (rawtime.length == 4) {
					time = parseInt(rawtime[0]*60) + parseInt(rawtime[2]);
				} else if (rawtime[1] == "hrs") {
					time = parseInt(rawtime[0]*60);
				} else {
				time = parseInt(rawtime[0]);
				}

				$('#filmlength').val(time);
				$('#filmgenre').val(d.Genre);
				$('#filmrating').val(d.Rated);
				$('#filmposter').val(d.Poster);
				$('#imdb_id').val(d.ID);
			}
		});
		
		return false;
	});

	});

</script>

<form name="filmForm" method="POST" action="" class="center">
	<table border= "0" class="center">
		<tr>
			<td>Film Title:</td> 
			<td><input type="text" value="" name="title" id="title" required/></td>
		</tr>
		<tr>
			<td>Film Year:</td> 
			<td><input type="text" value="" name="year" id="year" required/></td>
		</tr>
		<tr>
			<td>Click to find:</td> 
			<td><input type="button" name="buSsearch" id="buSsearch" value="Find film"/></td>
		</tr>
		<tr>
			<td>Film Description:</td>
			<td><input type="text" value="" name="filmdesc" id="filmdesc" required/></td>
		</tr>
		<tr>
			<td>Film Length (mins):</td>
			<td><input type="text" value="" name="filmlength" id="filmlength" required/></td>
		</tr>
		<tr>
			<td>Film Genre:</td> 
			<td><input type="text" value="" name="filmgenre" id="filmgenre" required/></td>
		</tr>
		<tr>
			<td>Film Rating (BBFC):</td>
			<td><input type="text" value="" name="filmrating" id="filmrating" required/></td>
		</tr>
		<tr>
			<td>Film Poster (img):</td>
			<td><input type="text" value="" name="filmposter" id="filmposter" required/></td>
		</tr>
		<table border="0" class="center">
			<tr>
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitAddFilms(this);">
				<input type="reset" name="reset" id="reset" value="Reset">
			</tr>
	   	</table>
	</table>
	<input type="text" value="" name="imdb_id" id="imdb_id"  style="visibility:hidden"/>
</form>

</h3>
<h2></h2>
</div>
