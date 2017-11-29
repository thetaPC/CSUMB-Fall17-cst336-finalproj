<?php
    
    session_start();
    include '../database/db_connection.php';
    
    if (isset($_SESSION["login"])) {  //Check whether the admin has logged in
        if ($_SESSION["login"] == "Y") {
            header('Location: admin.php');
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
  <link rel="stylesheet" href="../css/login.css" type="text/css" />
</head>
<body>
  
  <?php include 'header.html'; ?>

  <div class="container login">
      <div class="row justify-content-center">
          <div class="col-5">
              <h2>Admin Login</h2>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-5">
            <form method="POST" action="">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" id="username">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" class="form-control" id="pwd">
              </div>
                <div class="form-group row justify-content-center">
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </div>
                </div>
            </form> 
            
            <?php
                
                // $hashed_passworddb = password_hash($password, PASSWORD_DEFAULT);
                
                $sql = "SELECT name, password FROM admin WHERE name='" . $_POST['username'] . "'";
            
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($_POST['pwd'], $row["password"])) {
                        echo "works";
                        $_SESSION['login'] = "Y";
                        header('Location: admin.php');
                    } else {
                        echo "f off";
                        $_SESSION['login'] = "N";
                    }
                }
            ?>
        </div>
      </div>
     
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>