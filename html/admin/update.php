<?php 

    include '../../database/db_connection.php';
    
    echo $_POST["id"];
    echo $_POST["description"];
    echo $_POST["name"];
    echo $_POST["img"];
    
    $sql = "UPDATE " . $_POST["table"] . " SET name='" . $_POST["name"] . "', description='" . $_POST["description"] . "', img='" . $_POST["img"] . "' WHERE id=" . (int)$_POST["id"];

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

?>