<?php

header('Content-Type: image/jpeg');
if(isset($_GET["imgUrl"])) {
    $img = file_get_contents($_GET["imgUrl"]);
        echo $img;
}

?>
