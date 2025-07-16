<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Add/Update Part</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&family=Londrina+Sketch&family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">

    <!-- --------------------------------------------------------------- JS SCRIPT ------------------------------------------------------ -->

    <script>
        window.onload = function() {
            document.querySelector('header').addEventListener('click', function() {
            location.href='../index.php';
            });
            document.getElementById('home').addEventListener('click', function() {
            location.href='../index.php';
            });
        };
    
    </script>

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

    body::before{
        content: "";
        position: absolute;
        background-color: #21382D;
        top: 0; bottom: 0; left: 20vw; right: 0;
        z-index: -1;
    }

    body::after{
        content: "";
        position: absolute;
        background-image: url(../img/car_icon.png);
        background-size: 48px;
        top: 0; bottom: 0; left: 0; right: 80vw;
        opacity: 0.2;
        z-index: -1;
    }

    main{
        content: "";
        width: 60%;
        height: 100%;
        margin: auto;
        display: flex;
        flex-direction: column;
        border-left: 10px solid #c8cbbd;
        border-right: 10px solid #c8cbbd;
    }

    header{
        position: relative;
        content: "";
        flex-grow: 1;
        background-image: url(../img/header_footer.png);
        background-position: center;
        background-size: cover;
        border-top-left-radius: 100px;
        background-size: 100% auto;
        background-position-y: 48%;
        transition: 2s;
    }

    header:hover{
        background-size: 105% auto;
        background-position: center;
        background-position-y: 48%;

    }

    header::before{
        position: absolute;
        content: "";
        background-color: #c8cbbd;
        top: 0; bottom: 0; left: 0; right: 0;
        z-index: -1;
        border: 5px solid #c8cbbd;
    }

    #add-up_part_form{
        background-color: #c8cbbd;
        flex-basis: auto;
    }

    form{
        display: flex;
        flex-direction: column;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1vw;
        background-color: #c8cbbd;
        height: 100%;
        margin-bottom: 10px;
        
    }

    form input{
        background-color: #c8cbbd;
        color: rgb(126, 121, 121);
        padding: 10px;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        border: none;
        box-shadow: inset 0px 0px 2px 2px #0000002a;

    }

    #submit{
        padding: 10px 0 10px 0;
        height: 12vh;
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.3s;
    }

    #submit:hover {
        opacity: 1
    }

    #home{
        position: absolute;
        bottom: 25px;
        right: 25px;
        width: 64px;
        opacity: 0.6;
        transition: 1s;
    } #home:hover{opacity: 1;}

    </style>

    <!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

    <?php

    //get all vars
    $id = $_GET['id'] ?? '';
    $action = strtolower($_GET['update_part'] ?? 'add');       

    echo("<script type='text/javascript'> console.log('$id'); </script>");
    echo("<script type='text/javascript'> console.log('$action'); </script>");

    if ($id != '' && $action == "update") {
        //select all parts from DB
        include '../pdo_conn.php';

        $sql = "SELECT * FROM Parts WHERE PartID = $id AND Status = 'R'";
        ?> <script>console.log("<?php echo($sql); ?>");</script> <?php
        $result = $pdo->query($sql);

        while ($row = $result->fetch())  {
            $info = array($row['Type'], $row['Compatibility'], $row['Supplier'], $row['Manufacturer'], $row['Quantity'], $row['Price']);
        }

        echo("<script type='text/javascript'> console.log('info array generated!'); </script>");
    }

    

    if (isset($_POST['submit_form'])) {

        $type = trim($_POST['type']);
        $compatibility = trim($_POST['compatibility']);
        $supplier = trim($_POST['supplier']);
        $manufacturer = trim($_POST['manufacturer']);
        $quantity = trim($_POST['quantity']);
        $price = trim($_POST['price']);

        //validation
        if ($type == '' || $compatibility == '' || $supplier == '' || $manufacturer == '' || $quantity == '' || $price == '') {
            echo('<script> alert("Validation Error! All filds must be entered! ❌;"); </script>');
        }

        elseif (!preg_match('/[a-zA-Z]/', $compatibility)) {
            echo('<script> alert("Validation Error! Compatibility field must be letters only! ❌;"); </script>');
            
        }

        elseif (!preg_match('/[a-zA-Z0-9 _]/', $type) || !preg_match('/[a-zA-Z0-9 _]/', $compatibility)) {
            echo('<script> alert("Validation Error! Type and Compatibility fields can not contain special charachers! ❌;"); </script>');
        }
        //nubers validated by html <input> parameters!
            
        else {
            $usedTimes = 0;
            $status = 'R';

            include '../pdo_conn.php';

            if ($_POST['id'] == "" || $_POST['action'] == "add") {
                $sql = 'INSERT INTO Parts (type, compatibility, supplier, manufacturer, quantity, price, usedTimes, status) VALUES(:type, :compatibility, :supplier, :manufacturer, :quantity, :price, 0, "R")';
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':type', $type);
                $stmt->bindValue(':compatibility', $compatibility);
                $stmt->bindValue(':supplier', $supplier);
                $stmt->bindValue(':manufacturer', $manufacturer);
                $stmt->bindValue(':quantity', $quantity);
                $stmt->bindValue(':price', $price);

                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $stmt->execute();

                echo("<script>
                    alert('Part Added! 💾');
                    window.location.href = '../index.php';
                </script>");
            }
            else {
                ?> <script>console.log('<?php echo($_POST['id'] . ' / ' . $_POST['action']); ?>');</script> <?php
                $sql = 'UPDATE Parts SET type = :type, compatibility = :compatibility, supplier = :supplier, manufacturer = :manufacturer, quantity = :quantity, price = :price' . ' WHERE PartID = ' . $_POST["id"];
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':type', $type);
                $stmt->bindValue(':compatibility', $compatibility);
                $stmt->bindValue(':supplier', $supplier);
                $stmt->bindValue(':manufacturer', $manufacturer);
                $stmt->bindValue(':quantity', $quantity);
                $stmt->bindValue(':price', $price);
                // $stmt->bindValue(':status', $status);

                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $stmt->execute();

                echo("<script>
                    alert('Part updated! 💾');
                    window.location.href = '../index.php';
                </script>");
            }
            
        }

    }
    

?>

    <!-- --------------------------------------------------------------- MAIN HTML ------------------------------------------------------ -->

</head>
<body>
    <main>
        <header></header>

        <div id="add-up_part_form">
            <form name="add-up_part" method="post" action="Add-Up_Part.php">
                <input placeholder="Type*" type="text" maxlength="30" name="type" value='<?php echo($info[0] ?? '') ?>'> <!-- <br> -->
                <input placeholder="Compatibility*" type="text" maxlength="30" name="compatibility" value='<?php echo($info[1] ?? '') ?>'> <!-- <br> -->
                <input placeholder="Supplier*" type="text" id="supplier" name="supplier" maxlength="30" value='<?php echo($info[2] ?? '') ?>'> <!-- <br> -->
                <input placeholder="Manufacturer*" type="text" id="manufacturer" name="manufacturer" maxlength="30" value='<?php echo($info[3] ?? '') ?>'><!-- <br> -->

                <!-- geekforgeeks.org, 2023. How to set float input type in HTML5 ? [Online] https://www.geeksforgeeks.org/how-to-set-float-input-type-in-html5/ [Accessed 01.05.2025]. -->
                <input placeholder="Quantity*" type="number" maxlength="10" name="quantity" min="1" max="10000 00000" value='<?php echo($info[4] ?? '') ?? '' ?>'> <!-- <br> -->
                <input placeholder="Price*" type="number" maxlength="10" name="price" min="1" max="10000 00000" step=0.5 pattern="[0-9]*[.,]?[0-9]*" value='<?php echo($info[5] ?? '') ?>'> <!-- <br> -->
                <!-- geekforgeeks.org, 2023. How to set float input type in HTML5 ? [Online] https://www.geeksforgeeks.org/how-to-set-float-input-type-in-html5/ [Accessed 01.05.2025]. -->
                 
                <input style='display: none;' type='text' id='action' name='action' value='<?php echo($action ?? '') ?>'>
                <input style='display: none;' type='text' id='id' name='id' value='<?php echo($id ?? '') ?>'>

                <input type="submit" id="submit" value=" <?php echo(ucfirst($action)); ?> Part" name="submit_form"> <!-- <br> -->
            </form>
        </div>
    </main>

    <img id="home" src="../img/home.png" alt="home">
 
</body>
</html>

<!-- close connection -->
<?php
    $pdo = null;
?>