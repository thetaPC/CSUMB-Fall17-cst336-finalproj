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
                    <?php include 'menu1.php'; ?>
                </div>
                <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-level-up"></i> <span class="d-none d-md-inline">Insert</span> </a>
                <div class="collapse" id="menu2">
                    <?php include 'menu2.php' ?>
                </div>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-trash"></i> <span class="d-none d-md-inline">Delete</span> </a>
                <div class="collapse" id="menu3">
                    <?php include 'menu3.php' ?>
                </div>
                <a href="#menu4" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-file-text-o "></i> <span class="d-none d-md-inline">Records</span> </a>
                <div class="collapse" id="menu4">
                    <?php include 'menu4.php' ?>
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
                     <?php
                        $sql = "SELECT * FROM uramaki";
                        
                        $res = mysqli_query($conn, $sql);
                        
                        echo "<div class='all'>";
                            
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "
                                    <div class='update-uram'>
                                    
                                        <p>" . $row["name"] . "\t\t$" . $row["cost"] . " <button id='" . $row["id"] . "' type='button' class='btn btn-link uramaki'>Select</button></p>
                                    
                                    </div>";
                            }
                        }
                        echo "</div>";
                    ?>
                </div>
                <div class="col-md-5">
                    <?php
                        $sql = "SELECT * FROM uramaki";
                        
                        $res = mysqli_query($conn, $sql);
                            
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "
                                    <div class='hidden' id='uramaki" . $row["id"] . "'>
                                    
                                        <form id='update" . $row['id'] . "' method='POST' action=''>
                                            <div class='form-group'>
                                                <label for='name'>Name</label>
                                                <input name='name' type='text' class='form-control' value='" . $row["name"] . "' id='name" . $row["id"] . "'>
                                              </div>
                                              <div class='form-group'>
                                                <label for='desc'>Description</label>
                                                <input name='description' type='text' class='form-control' value='" . $row["description"] . "' id='desc" . $row["id"] . "'>
                                              </div>
                                              <div class='form-group'>
                                                <label for='desc'>Cost</label>
                                                <input name='cost' type='text' class='form-control' value='" . $row["cost"] . "' id='cost" . $row["id"] . "'>
                                              </div>
                                              <div class='form-group'>
                                                <label for='img'>Image URL</label>
                                                <input name='img' type='url' class='form-control' value='" . $row["img"] . "' id='img" . $row["id"] . "'>
                                              </div>
                                        </form>
                                        <button id='sub" . $row['id'] . "' class='btn btn-primary'>Update</button>
                                        <button id='can" . $row['id'] . "' type='button' class='btn btn-danger'>Cancel</button>
                                    </div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </main>
    </div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script>
      let name;
      let id;
       $(".uramaki").click(function() {
           name = "uramaki" + $(this).attr('id');
           id = $(this).attr('id');
           $("#"+name).removeClass('hidden');
           $(".all").addClass('hidden');
           
           $("#sub"+id).click(function(e) {
               e.preventDefault();
               
               $.ajax({
                    type: "POST",
                    url: "update.php",
                    dataType: "json",
                    data: {
                        "id": id,
                        "name": $("#name"+id).val(),
                        "description": $("#desc"+id).val(),
                        "cost": $("#cost"+id).val(),
                        "img": $("#img"+id).val(),
                        "table": "uramaki"
                    },
                    success: function(data,status) {
                        // alert("ADDED!");
                      },
                      complete: function(data,status) { //optional, used for debugging purposes
                          //alert(status);
                      }
               });//AJAX 
               
               $("#"+name).addClass('hidden');
               $(".all").removeClass('hidden');
            });
            
            $("#can"+id).click(function(e) {
               e.preventDefault();
               $("#"+name).addClass('hidden');
               $(".all").removeClass('hidden');
            });
        });
        
        
  </script>
</body>