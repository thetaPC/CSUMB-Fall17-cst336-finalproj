<?php

    $server = "us-cdbr-iron-east-05.cleardb.net";
    $user = "b8940d759f4063";
    $pass = "919dcec9";
    $db = "heroku_09cdc34587d3665";
    
    $conn = mysqli_connect($server, $user, $pass, $db);
    
    if (!$conn) {
        die("Failed to connect" . mysqli_connect_error());
    }

?>