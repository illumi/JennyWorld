<?php

$username="js230"; /*username*/
$password="js230"; /*password*/
$database="js230"; /*database name*/
$host = "anubis.macs.hw.ac.uk";  /*host name*/

$link = mysql_connect($host,$username,$password) or die(mysql_error()); /*connects to sql or throws error*/
mysql_select_db($database, $link) or die(mysql_error()); /*connects specified database or throws 
connection error */

//mysql_close($link);   /* closes connection to the sql database */


?>
