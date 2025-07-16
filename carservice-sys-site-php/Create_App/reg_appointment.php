<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Create Appointment</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&family=Londrina+Sketch&family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">

    <!-- --------------------------------------------------------------- JS SCRIPT ------------------------------------------------------ -->

    <script></script>

    <!-- --------------------------------------------------------------- CSS ------------------------------------------------------ -->

    <style>

    *{
        margin: 0;
        padding: 0;
    }

    body{
        position: relative;
        height: 100vh;
        overflow: hidden;
        background-color: #284637;
    }

    </style>
    
    <!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

    <?php

        include '../pdo_conn.php';

        $id = $_POST['id'] ?? "";
        $date = $_POST['date'] ?? "";
        $time = $_POST['time'] ?? "";

        ?> <script>console.log('create App id : <?php echo($id); ?>');</script> <?php
        ?> <script>console.log('create App date : <?php echo($date); ?>');</script> <?php
        ?> <script>console.log('create App time : <?php echo($time); ?>');</script> <?php


        if ($id != "" && $_SERVER && $id != "" && $id != "") {

            // create appointment
            $sql = "INSERT INTO Appointments (ClientID, App_Date, App_Time, Cost, Status) VALUES($id, STR_TO_DATE('$date', '%Y-%m-%d'), '$time', 0, 'R')";
            ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
            $result = $pdo->query($sql);
            
            echo("<script>
                    alert('Appointment created successfully! 💾');
                    window.location.href = '../index.php';
                </script>");
        }

?>

<!-- --------------------------------------------------------------- MAIN HTML ------------------------------------------------------ -->

</head>
<body>
    <main>

    </main>
</body>
</html>

<!-- close connection -->
<?php
    $pdo = null;
?>