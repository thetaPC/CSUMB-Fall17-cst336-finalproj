<?php
    
    session_start();
    
    if (isset($_SESSION["login"])) {  //Check whether the admin has logged in
        if ($_SESSION["login"] == "N") {
            header('Location: ../login.php');
        }
    } else {
        header('Location: ../login.php');
    }
    include '../../database/db_connection.php';
    
    if (trim($_POST["name"]) != "" && trim($_POST["cost"]) != "" && trim($_POST["img"]) != "") {
        $sql = "INSERT INTO uramaki (name, description, cost, img) VALUES ('" . $_POST["name"] . "', '" . $_POST["description"] . "', '" . $_POST["cost"] . "', '" . $_POST["img"] . "')";
            
        if (mysqli_query($conn, $sql)) {
            // echo "New record created successfully";
        } else {
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sushi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/admin.css" type="text/css" />
</head>
<body>
  
    <?php include '../header.html'; ?>
  
    <div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
                <div class="list-group border-0 card text-center text-md-left">
                <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-pencil"></i> <span class="d-none d-md-inline">Update</span> </a>
                <div class="collapse" id="menu1">
                    <?php include 'menu1.php'; ?>
                </div>
                <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-level-up"></i> <span class="d-none d-md-inline">Insert</span> </a>
                <div class="collapse" id="menu2">
                    <?php include 'menu2.php'; ?>
                </div>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-file-text-o"></i> <span class="d-none d-md-inline">Records
                </span> </a>
                <div class="collapse" id="menu3">
                    <?php include 'menu3.php'; ?>
                </div>
            </div>
        </div>
        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>
            <div class="page-header">
                <h2>Hello, Admin</h2>
            </div>
            <p class="lead"><a href="../logout.php">Log out</a></p>
            <hr>
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <form method="POST" action="">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                      </div>
                      <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" name="description" class="form-control" id="desc">
                      </div>
                      <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" name="cost" class="form-control" id="cost">
                      </div>
                      <div class="form-group">
                        <label for="img">Image URL</label>
                        <input type="url" name="img" class="form-control" id="img">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </main>
    </div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script>
      
        
        
  </script>
</body>