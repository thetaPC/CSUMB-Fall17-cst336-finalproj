<?php
    
    include '../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sushi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="../css/gallery.css">
</head>
<body>
  
  <?php include 'header.html'; ?>
 
  
        <?php
        
            $name = $_POST["searchName"];
            $name = trim($name);
        
            if(empty($name)) {
                // do something
                echo "
                <div class='row justify-content-md-center'>
                    <div class='col-md-4'>
                ";
                    echo "<img class='img-fluid' style='width: 400px' src='http://cdn.playbuzz.com/cdn/9fb0a1ed-ec62-47b2-b8e1-b8c2c9e76597/b69b62cc-6419-48c8-80ab-d11ab4e73742.png' />";
                echo "
                    </div>
                </div>
                ";
                echo "
                <div class='row justify-content-md-center'>
                    <div class='col-md-3'>
                ";
                    echo "<h4>Please enter a proper word.</h4>";  
                echo "
                    </div>
                </div>
                ";
            } else {
        
                $types = array("sashimi", "nigiri", "uramaki");
                $current = [];
                $name = strtolower($name);
                $name = ucfirst($name);
                
                echo "
                <div class='container port-section'>
  
                    <div id='portfolio'>
                ";
            
                
                if (sizeof($_POST["type"]) > 0) {
                    foreach ($_POST["type"] as $value) {
                        // $sql = "SELECT * FROM " . $value . " WHERE name='" . $name . "' OR description like '%" . $name . "%'";
                        $sql = "SELECT * FROM " . $value . " WHERE name like '%" . $name . "%' OR description like '%" . $name . "%'";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "
                                    <div class='tile scale-anm all'>
                                        <a data-fancybox data-caption='" . $row["description"] . "' href='" . $row["img"] . "'>
                                            <img id='" . $row["id"] . "' class='resize' src='" . $row["img"] . "' alt='" . $row["name"] . "' />
                                        </a>
                                        <p>" . $row["name"] . " - $" . $row["cost"] . "</p>
                                    </div>";
                            }
                        }
                    }
                } else {
                    foreach ($types as $value) {
                        $sql = "SELECT * FROM " . $value . " WHERE name like '%" . $name . "%' OR description like '%" . $name . "%'";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "
                                    <div class='tile scale-anm all'>
                                        <a data-fancybox data-caption='" . $row["description"] . "' href='" . $row["img"] . "'>
                                            <img id='" . $row["id"] . "' class='resize' src='" . $row["img"] . "' alt='" . $row["name"] . "' />
                                        </a>
                                        <p>" . $row["name"] . " - $" . $row["cost"] . "</p>
                                    </div>";
                            }
                        }
                    }
                    
                    echo "
                        </div>
                    </div> 
                    ";
                }
            }
        ?>
        
      

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script src="../js/fancybox/jquery.fancybox.min.js"></script>
  
  <script>
      $("[data-fancybox]").fancybox({
      		// Options will go here
      	});
  </script>
</body>