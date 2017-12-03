<?php
    
    include 'database/db_connection.php';
    
    $sql = "UPDATE visits SET total=  total + 1 where id= 1";

    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
    } else {
        // echo "Error updating record: " . mysqli_error($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sushi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  
  <?php include 'html/header.html'; ?>

  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-8">
        <img id="salmon-main" src="https://www.manusmenu.com/wp-content/uploads/2016/05/1-Salmon-Sashimi-with-Ponzu-3-1-of-1.jpg" />
      </div>
      <div class="col-md-4">
        <img id="roll-main" src="https://i.pinimg.com/736x/9b/fc/b5/9bfcb57cfc568c2a266f6ee383213d4a--tuna-sushi-recipe-sushi-recipes.jpg" />
      </div>
    </div>
    
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>