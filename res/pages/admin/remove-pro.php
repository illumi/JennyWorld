<?php
session_start();

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

// check if the $POST variable exists
if(isset($_POST['delete']))
{
    $delete= $_POST['delete'];
    $nElement = count($delete);
    // check that the user has selected at least one checkbox
    
    if(is_array($delete) && ($nElement > 0))
    {
        include 'sql-connection.php';

        $query= "DELETE FROM promotions WHERE promo_id=";

        foreach($delete as $key => $id)
        {
            // if there is only one checkbox that has been selected or if this is the last row of our array.
            if(($nElement - 1) == $key || $key == $nElement)
                $query= $query.$id.";";

            else
                $query= $query.$id." OR promo_id=";

        }

        mysql_query($query);
        mysql_close($link);

        header("location: ../../../admin.php?page=remove-promo");
    }
}

?>
