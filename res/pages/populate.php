<?php
if (!empty($_POST['value'])) {
    // query for options based on value
    
    /*
    //$sql = mysql_query("SELECT start_time FROM showings s, films f WHERE f.film_ID = s.film_ID AND f.film_title = '". $_POST['value'] ."';");
    //$sql = mysql_query("SELECT start_date FROM showings s, films f WHERE f.film_ID = s.film_ID AND f.film_title = '". $_POST['value'] ."';");

    // iterate over your results and create HTML output here
    
    $html = '<option value="0">' . $row['start_date']. '</option>';
    while ($row = mysql_fetch_assoc($sql)) {
		$html .= '<option value="' . $j . '">' . $row['start_time']. '</option>';
	}*/

    // return HTML option output
    $html = '<option value="1">1</option>';
    $html .= '<option value="b">B</option';
    
    echo $html;
    
    die($html);
}
die('error');
?>
