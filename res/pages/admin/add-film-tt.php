<?php
	if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

?>



<div id="body">
<h1>Add Film to Timetable</h1>

    <h3>
        <script type="text/javascript">
            $(document).ready(function() {

            $('#butFind').click(function(){
                $.ajax({
                            url: "http://www.imdbapi.com/?t=" + $('#txtAddMovieTitle').val() + "&y="+$('#txtFilmYear').val(),
                            dataType: "jsonp",
                            error: function(j,s,e) {
                                    alert("Error: "+e);
                            }, success: function(d) {
                                    $('#txtFilmDesc').val(d.Plot);

                                    var time, rawtime = d.Runtime.split(" ");
                                    if (rawtime.length == 4) {
                                            time = parseInt(rawtime[0]*60) + parseInt(rawtime[2]);
                                    } else if (rawtime[1] == "hrs") {
                                            time = parseInt(rawtime[0]*60);
                                    } else {
                                    time = parseInt(rawtime[0]);
                                    }

                                    $('#txtFilmLength').val(time);
                                    $('#txtFilmGenre').val(d.Genre);
                                    $('#txtFilmRating').val(d.Rated);
                                    $('#txtFilmPoster').val(d.Poster);
                                    $('#imdbID').val(d.ID);
                            }
                    });

                    return false;
            });

            });
        </script>
        
	<form name="tt" method="POST" action="" class="center" >
                <table border="0" id="tabSelectFilm" class="center">
			
			<tr>
                                <td> Film Name:</td>
				<td>
                                    <select name="id" id="lstMovies" style="width:200px;" onChange="displayAdd(this);">
                                    <option value="0">--select film to add--</option>
                                    <?php
                                    $query = mysql_query("SELECT film_ID, film_title FROM films;");
                                    while ($row = mysql_fetch_assoc($query)) {
                                            echo '<option value="' . $row['film_ID'] . '">' . $row['film_title']. '</option>';
                                    }
                                    $connect->disc();
                                    ?>
                                    <option value="add">Add a new film ...</option>
                                    </select><br/>
                                    <input type="text" name="txtAddMovieTitle" id="txtAddMovieTitle" style="width:200px; display: none;" />
				</td>
			</tr>
                        <tr id="rowFilmYear" style="display: none;">
                            <td>Film Year:</td>
                            <td>
                                <input type="text" name="txtFilmYear" id="txtFilmYear" style="width:200px;" />
                                <input type="button" name="butFind" id="butFind" value="Find Film"/>
                            </td>
                        </tr>
                        <tr id="rowFilmDesc" style="display: none">
                            <td>Film Description:</td>
                            <td>
                                <input type="text" name="txtFilmDesc" id="txtFilmDesc" style="width:200px;"/>
                            </td>
                        </tr>
                        <tr id="rowFilmLength" style="display: none">
                            <td>Film length (mins):</td>
                            <td>
                                <input type="text" name="txtFilmLength" id="txtFilmLength" style="width:200px;"/>
                            </td>
                        </tr>
                        <tr id="rowFilmGenre" style="display: none">
                            <td>Film genre:</td>
                            <td>
                                <input type="text" name="txtFilmGenre" id="txtFilmGenre" style="width:200px;"/>
                            </td>
                        </tr>
                        <tr id="rowFilmRating" style="display: none">
                            <td>Film rating:</td>
                            <td>
                                <input type="text" name="txtFilmRating" id="txtFilmRating" style=width:200px;"/>
                            </td>
                        </tr>
                        <tr id="rowFilmPoster" style="display: none">
                            <td>Film poster (IMG):</td>
                            <td>
                                <input type="text" name="txtFilmPoster" id="txtFilmPoster" style="width:200px;"/>
                            </td>
                        </tr>
			<tr>
                            <td>Start Date:</td>
                            <td>
				<input type="date" id="start" name="start" size="20"/>				
                            </td>
			</tr>
			<tr>
                            <td>End Date:</td>
                            <td>
				<input type="date" id="end" name="end" size="20"/>				
                            </td>
			</tr>
			<tr>		
                            <td> Number of showings: </td>
                            <td>
                                    <select name="numshowings">
                                    <option value="0">--select number of showings--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>

                                    </select>
                            </td>
                        </tr>
                        <tr>
				<td NOWRAP>Time of first showing: </td>
				<td> <input type="text" id="timepicker_1" value="" name="newTime" required></td>
			</tr>	
		</table>
                <table border="0" class="center">
                    <p>
                    <input type="submit" name="submit" id="submit" value="Submit" onClick="onSubmitAddTimetable(this);">
                    <input type="reset" name="reset" id="reset" value="Reset"/>
                    </p>
                </table>

                <input type="hidden" id="imdbID" name="imdbID"/>
	</form>
    </h3>
	
<h2></h2>
</div>
