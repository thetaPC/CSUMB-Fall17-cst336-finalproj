<?php 

    include '../../database/db_connection.php';
    
    $sql = "DELETE FROM " . $_POST["table"] . " WHERE id=" . (int)$_POST["id"];

    if (mysqli_query($conn, $sql)) {
        // echo "Record deleted successfully";
    } else {
        // echo "Error deleting record: " . mysqli_error($conn);
    }
    

?>