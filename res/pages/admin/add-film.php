
<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1>Add Film</h1>
<h3>
<section id="new film info">
	<form name="addfilm" method="POST" action="">
		<table border= "0" class="center">
			<tr>
				<td>Film Title:</td> <td><input type="text" value="" name="filmtitle" required></td>
			</tr>
			<tr>
				<td>Film Length (minutes):</td> <td><input type="text" value="" name="filmlength" required></td>
			</tr>
			<tr>
				<td>Film Genre:</td> 
				<td><select name="genre" value="" id="genre" required>
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
				</select></td>
			</tr>
			<tr>
				<td>Film Rating (BBFC):</td>
				<td><select name="rating" value="" id="rating" required>
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
			<td>Year Released:</td>
				<td><input type="text" value="" name="year" required></td>
			</tr>
	   		<table border="0" class="center">
				<tr>
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitAddFilms(this);">
				<input type="reset" name="reset" id="reset" value="Reset">
				</tr>
	   		</table>
		</table>
	</form>
</section>

</h3>
</div>
