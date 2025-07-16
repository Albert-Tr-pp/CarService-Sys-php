<?php
session_start();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Cost Appointment</title>

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

        $app_id = $_SESSION['app_id'] ?? "";
        $cost = $_SESSION['sum'] ?? "";

        $allow = $_GET['allow'] ?? false;

        ?> <script>console.log('app_id : <?php echo($app_id); ?>');</script> <?php
        ?> <script>console.log('cost : <?php echo($sum); ?>');</script> <?php

        function decrease_part_qty ($pdo) {
            foreach ($_SESSION['parts_ids'] ?? [] as $part_id) {
                //reduce qty for added parts
                $sql = "UPDATE Parts SET Quantity = Quantity - 1 WHERE PartID = $part_id";
                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $result = $pdo->query($sql);
            }
        }

        function update_partsUsed ($pdo) {
            foreach ($_SESSION['parts_ids'] ?? [] as $part_id) {
                //reduce qty for added parts
                $app_id = $_SESSION['app_id'];
                $sql = "INSERT INTO partsUsed (AppointmentID, PartID) VAlUES ($app_id, $part_id)";
                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $result = $pdo->query($sql);
            }
        }

        function update_cost ($pdo) {

            $app_id = $_SESSION['app_id'] ?? "";
            $cost = $_SESSION['sum'] ?? "";


            // cost appointment
            $sql = "UPDATE Appointments SET Cost = $cost WHERE AppointmentID = $app_id";
            ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
            $result = $pdo->query($sql);

            decrease_part_qty($pdo);

            update_partsUsed($pdo);

            session_destroy();

            echo("<script>
            alert('Appointment cost updated successfully! 💾');
            window.location.href = '../index.php';
            </script>");
        }

        if ($allow) {
            update_cost($pdo);
        } elseif ($app_id != "" && $cost > 0) {
            echo("<script>
                if (confirm(\"Confirm Appointment's cost Update? 💾\")) {
                    window.location.href = 'cost_app_method.php?allow=true';
                } else {
                    document.write('<?php session_destroy(); ?>');
                    window.location.href = '../index.php';
                }
            </script>");
        } else {
            session_destroy();

            echo("<script>
            alert('Appointment cost can not be zero! 💾');
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