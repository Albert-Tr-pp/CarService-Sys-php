<?php
$username = "";
$servername = "localhost";
$dbname = "carservice";

try {
  $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . '; charset=utf8', 'root', '');
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // echo "Connected successfully";
  ?> <script>console.log("Connected successfully to <?php echo($dbname) ?> "); </script> <?php

} catch(PDOException $e) {
  // echo "Connection failed: " . $e->getMessage();
  ?> <script> colsole.log("Connection to DB failed"); </script> <?php

  exit();
}
?>