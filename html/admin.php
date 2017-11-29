<?php
    
    session_start();
    include '../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sushi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css" type="text/css" />
</head>
<body>
  
    <?php include 'header.html'; ?>
  
    <?php
        if (isset($_SESSION["login"])) {  //Check whether the admin has logged in
            if ($_SESSION["login"] !== "Y") {
                header('Location: login.php');
            }
        }
        
    ?>

  <div class="container">
     <h>Cools</h> 
     
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>