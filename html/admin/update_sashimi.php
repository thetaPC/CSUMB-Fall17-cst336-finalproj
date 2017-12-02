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
                    <a href="#" class="list-group-item" data-parent="#menu1">Sashimi</a>
                    <a href="#" class="list-group-item" data-parent="#menu1">Nigiri</a>
                    <a href="#" class="list-group-item" data-parent="#menu1">Uramaki</a>
                </div>
                <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-level-up"></i> <span class="d-none d-md-inline">Insert</span> </a>
                <div class="collapse" id="menu2">
                    <a href="#" class="list-group-item" data-parent="#menu2">Sashimi</a>
                    <a href="#" class="list-group-item" data-parent="#menu2">Nigiri</a>
                    <a href="#" class="list-group-item" data-parent="#menu2">Uramaki</a>
                </div>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-trash"></i> <span class="d-none d-md-inline">Delete</span> </a>
                <div class="collapse" id="menu3">
                    <a href="#" class="list-group-item" data-parent="#menu3">Sashimi</a>
                    <a href="#" class="list-group-item" data-parent="#menu3">Nigiri</a>
                    <a href="#" class="list-group-item" data-parent="#menu3">Uramaki</a>
                </div>
                <a href="#menu4" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-file-text-o "></i> <span class="d-none d-md-inline">Records</span> </a>
                <div class="collapse" id="menu4">
                    <a href="#" class="list-group-item" data-parent="#menu4">Ave. Price</a>
                    <a href="#" class="list-group-item" data-parent="#menu4">Site visits</a>
                    <a href="#" class="list-group-item" data-parent="#menu4">Most viewed</a>
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
            <div class="row">
                <div class="col-md-5">
                     <form>
                      <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"> Remember me
                        </label>
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
</body>