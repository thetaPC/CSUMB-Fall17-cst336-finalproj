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
  <link rel="stylesheet" href="../css/sashimi.css">
</head>
<body>
  
  <?php include 'header.html'; ?>

  <div class="container port-section">
      
      <div id="portfolio">
        <div class="tile scale-anm all">
          <a data-fancybox data-caption="Single yet not Lonely" href="https://pre00.deviantart.net/4129/th/pre/i/2016/051/7/f/single_yet_not_lonely_by_sketch_and_smile-d9sitn9.jpg">
            <img class="resize" src="https://pre00.deviantart.net/4129/th/pre/i/2016/051/7/f/single_yet_not_lonely_by_sketch_and_smile-d9sitn9.jpg" alt="" />
          </a>
        </div>
        <div class="tile scale-anm all">
          <a data-fancybox data-caption="Yourself" href="https://pre00.deviantart.net/3dd4/th/pre/f/2015/271/f/0/20150716_130550_1_by_sketch_and_smile-d9b9q5v.jpg">
            <img class="resize" src="https://pre00.deviantart.net/3dd4/th/pre/f/2015/271/f/0/20150716_130550_1_by_sketch_and_smile-d9b9q5v.jpg" alt="" />
          </a>
        </div>
        <div class="tile scale-anm all">
          <a data-fancybox data-caption="" href="">
            <img class="resize" src="" alt="" />
          </a>
        </div>
        
      </div>
    </div> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script src="../js/fancybox/jquery.fancybox.min.js"></script>
  
  <script>
      $("[data-fancybox]").fancybox({
      		// Options will go here
      		// loop : true,
      	});
  </script>
</body>