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

  <div class="container port-section">
      
      <div id="portfolio">
        <?php
        
            $types = array("sashimi", "nigiri", "uramaki");
            $current = [];
            $name = $_POST["searchName"];
            $name = strtolower($name);
            $name = ucfirst($name);
            
            if (sizeof($_POST["type"]) > 0) {
                foreach ($_POST["type"] as $value) {
                    $sql = "SELECT * FROM " . $value . " WHERE name='" . $name . "' OR description like '%" . $name . "%'";
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
                    $sql = "SELECT * FROM " . $value . " WHERE name='" . $name . "' OR description like '%" . $name . "%'";
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
            }
            
        ?>
        
      </div>
    </div> 

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