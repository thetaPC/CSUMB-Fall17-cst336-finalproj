<?php 

    include '../../database/db_connection.php';
    
    if (trim($_POST["name"]) != "" && trim($_POST["cost"]) != "" && trim($_POST["img"]) != "") {
        $sql = "UPDATE " . $_POST["table"] . " SET name='" . $_POST["name"] . "', description='" . $_POST["description"] . "', cost='" . $_POST["cost"] . "', img='" . $_POST["img"] . "' WHERE id=" . (int)$_POST["id"];

        if (mysqli_query($conn, $sql)) {
            // echo "Record updated successfully";
        } else {
            // echo "Error updating record: " . mysqli_error($conn);
        }
    }
    

?>