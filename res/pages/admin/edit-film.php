<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

?>


<div id="body">
<h1>Edit Film</h1>
<h3>

<section id="edit info">

    <P>Please enter new details (enter old values for unchanged fields)</p>
	<form name="editfilm" method="POST" action="">
	<table border="0" class="center">
		<tr>
		<td>Film Name:</td>
			<td>
					<select name="id">
					<option value="0">Film Name</option>
					<?php
					$query = mysql_query("SELECT film_ID, film_title FROM films;");
					while ($row = mysql_fetch_assoc($query)) {
						echo '<option value="' . $row['film_ID'] . '">' . $row['film_title']. '</option>';
					}
					$connect->disc();
					?>
					</select> 
				</td>
		</tr>
		<tr>
		<td>Film Title: </td>	
		<td> 
 			 <input type="text" value="" name="edit_filmtitle" required>
		</td>
	</tr>
		<tr>
			<td>Film Length (minutes):</td> <td><input type="text" value="" name="edit_filmlength" required></td>
		</tr>
		<tr>
			<td>Film Genre:</td> <td><select name="edit_genre" value="" id="genre" required>
					<option value="0">Genre</option>
					<option value="action">Action</option>
					<option value="animation">Animation</option>
					<option value="comedy">Comedy</option>
					<option value="crime">Crime</option>
					<option value="documentary">Documentary</option>
					<option value="drama">Drama</option>
					<option value="fantasy">Fantasy</option>
					<option value="horror">Horror</option>
					<option value="romcom">Romantic Comedy</option>
					<option value="thriller">Thriller</option>
					<option value="scifi">Science Fiction</option>
			</select><br /></td>
		</tr>
		<tr>
			<td>Film Rating:</td> 
			<td><select name="edit_rating" value="" id="rating" required>
				<option value="0">Rating</option>
				<option value="U">U</option>
				<option value="PG">PG</option>
				<option value="12">12</option>
				<option value="12A">12A</option>
				<option value="15">15</option>
				<option value="18">18</option>
				<option value="R18">R18</option>
			</select></td>
		</tr>
		<tr>
			<td>Year Released:</td> <td><input type="text" value="" name="edit_year" required></td>
		</tr>
		<table border="0" class="center">
			<tr>
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitEditFilms(this);">
				<input type="reset" name="reset" id="reset" value="Reset">
			</tr>
		</table>
	</table>
	</form>
</section>
</div>
