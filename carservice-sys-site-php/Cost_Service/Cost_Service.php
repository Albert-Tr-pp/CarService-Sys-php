<?php
session_start();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Cost Service</title>

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
    }

    function ask_user() {
        let answer = confirm("Are you sure ⁉ 💾 ➡ ❌");
        if (answer == false) {
            console.log("User said NO 😒")
            window.stop();
            location.href='Cost_Service.php?del_app=Delete&id=2';
        }
    }
    
</script>

<!-- --------------------------------------------------------------- CSS ------------------------------------------------------ -->

<style>
    *{
        margin: 0;
        padding: 0;

        text-align: center;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        color:rgb(126, 121, 121);
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
        /* position: relative; */
        width: 60%;
        height: 100%;
        margin: auto;
        background-color: #c8cbbd;
        border-left: 10px solid #c8cbbd;
        border-right: 10px solid #c8cbbd;
        padding-bottom: 10px;
        display: flex;
        flex-direction: column;
    }

    header{
        position: relative;
        content: "";
        flex-basis: 150px;
        flex-grow: 1;
        flex-shrink: 0;
        background-image: url(../img/header_footer.png);
        background-position: center;
        background-size: cover;
        border-top-left-radius: 100px;
    }

    header::before{
        position: absolute;
        content: "";
        background-color: #c8cbbd;
        top: 0; bottom: 0; left: 0; right: 0;
        z-index: -1;
        border: 5px solid #c8cbbd;
    }

    /* HOME BTN */
    #home{
        position: absolute;
        bottom: 25px;
        right: 25px;
        width: 64px;
        opacity: 0.6;
        transition: 1s;
    } #home:hover{opacity: 1;}

    #total{
        flex-basis: 40px;
        margin-top: 10px;
        margin-bottom: 5px;
        font-size: 32px;
    }

    /* ----------------------- SET CLIENT ----------------------- */

    #set_client, #display_client, #select_date, #set_time{
        flex-basis: auto;
        display: flex;
    }

    #set_client input{
        flex: 1;
        padding: 10px 0 10px 0;
        height: 12vh;
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;

        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;

        border: none;
        box-shadow: inset 0px 0px 2px 2px #0000002a;
        margin-bottom: 10px;
    }

    #set_client input:hover, #set_date:hover, #create_App:hover{
        opacity: 1
    }

    /* ----------------------- SET DATE ----------------------- */

    #set_client{
        flex-basis: auto;
        display: flex;
    }

    #select_date{
        flex-basis: auto;
        display: flex;
        justify-content: center;
        margin: 10px 0px 10px 0px;
        
    }

    #select_date #date{
        background-color: #c8cbbd;
        padding: 10px;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        border: none;
    }

    #set_date, #set_app{
        padding: 10px;
        /* height: 12vh; */
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;
        border-radius: 10px;

        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        border: none;
    }

    /* ----------------------- APPS LIST ----------------------- */

    
    #apps_list{
        display: flex;
        flex-basis: auto;
        overflow-y: scroll;
        scrollbar-width: thin;
        scrollbar-color: #c8cbbd #c8cbbd;
        scrollbar-width: none;

        padding-top: 10px;
    }

    #apps_list{
        padding-bottom: 10px;
        
        box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;

        /* cssgenerator.org, NA. Box Shadow CSS Generator [Online]. Available at: https://cssgenerator.org/box-shadow-css-generator.html [Accessed 01.05.2025]. */
        -webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;
        -moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;
        /* cssgenerator.org, NA. Box Shadow CSS Generator [Online]. Available at: https://cssgenerator.org/box-shadow-css-generator.html [Accessed 01.05.2025]. */
    }

    #apps_list table{
        width: 100%;
        flex-basis: auto;
        /* flex-shrink: 0; */
        flex-direction: column;
    }

    #apps_list table *{
        text-align: center;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        color:rgb(126, 121, 121);
    }
    
    #apps_list table tr{
        box-shadow: inset 0px 0px 2px 2px #0000002a;
        border: none;
    }

    #apps_list table #del_app{
        /* action_buttons */
        padding: 10px;
        background-color: #d90429;
        color: #EDEEE9;
        border-radius: 10px;
        box-shadow: none;
        opacity: 0.6;
        transition: 0.5s;
    }

    #del_app, #set_app{
        width: 100%;
        height: 100%;
        padding: 10px;
        /* height: 12vh; */
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;
        /* border-radius: 10px; */

        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;

        border: none;
        box-shadow: inset 0px 0px 2px 2px #0000002a;
    }

    #submit:hover, #del_app:hover, #apps_list table #del_app:hover, #set_app:hover{
        opacity: 1
    }


    /* --------------- Set Client --------------- */

    #display_client{
        padding-bottom: 10px;
    }

    #display_client table{
        width: 100%;
        flex-basis: auto;
        /* flex-shrink: 0; */
        flex-direction: column;
    }

    #display_client table *{
        text-align: center;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        color: rgb(126, 121, 121);
    }

    #display_client table tr{
        box-shadow: inset 0px 0px 2px 2px #0000002a;
        border: none;
    }

    #padding_for_row{
        padding: 10px 10px 10px 0px;
    }




</style>

<!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

<?php
    include '../pdo_conn.php';

    //clear seesion's vars
    $clear = $_GET['clear'] ?? false;

    if ($clear) {
        $_SESSION = [];
    }

    $id = $_GET['id'] ?? "";
    $date = $_GET['date'] ?? "";
    $app_id = $_GET['app_id'] ?? "";
    $part_cost = $_GET['part_cost'] ?? "";
    $qty = $_GET['qty'] ?? 1;
    $part_id = $_GET['part_id'] ?? "";

    if ($app_id != "") {
        $_SESSION['app_id'] = $app_id;
    } else {
        $app_id = $_SESSION['app_id'] ?? "";
    }

    if (!isset($_SESSION['parts_costs'])) {
        $_SESSION['parts_costs'] = [];
    }
    if (!isset($_SESSION['parts_ids'])) {
        $_SESSION['parts_ids'] = [];
    }

    $qty = (int)$qty;
    if ($qty < 1) $qty = 1;

    if ($part_cost != "") {
        $cost = (float)$part_cost;

        for ($i = 0; $i < $qty; $i++) {
            $_SESSION['parts_costs'][] = $cost;
            $_SESSION['parts_ids'][] = $part_id;
        }
    }

    $sum = array_sum($_SESSION['parts_costs']);
    $_SESSION['sum'] = $sum;

    echo("<script type='text/javascript'> console.log(id = '$id'); </script>");
    echo("<script type='text/javascript'> console.log(date = '$date'); </script>");
    echo("<script type='text/javascript'> console.log(app_id = '$app_id'); </script>");

    if ($app_id != "") {
        // select appointment
        $sql = "SELECT * FROM Appointments WHERE Status = 'R' AND Cost = 0 AND AppointmentID = $app_id";
        ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
        $result = $pdo->query($sql);
        //echo("<script>alert('Appointment selected and loaded')</script>");
    }

    if ($date != "") {
        $sql = "SELECT * FROM Appointments WHERE Status = 'R' AND Cost = 0 AND App_Date = STR_TO_DATE('$date', '%Y-%m-%d')";
        ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
        $result = $pdo->query($sql);
    }
?>

<!-- --------------------------------------------------------------- MAIN HTML ------------------------------------------------------ -->

</head>
    <body>
        <img id="home" src="../img/home.png" alt="home">

        <main>
            <header></header>

            <div id='select_date'>
                <?php if (TRUE) { ?>
                    <form method="get" action="Cost_Service.php?">
                        <input type="date" id="date" name="date">
                        <input style='display: none;' type='text' id='id' name='id' value='<?php echo($_GET['id'] ?? "") ?>'>
                        <input id='set_date' type="submit" value="Set Date">
                    </form>
                <?php } ?>
            </div>

            <!-- ------------------------- -->
            <?php
            if ($date != "" ?? "") {
                ?>
            
            <div id="apps_list">
            <table>

                <?php  
                    while ($row = $result->fetch())  {
                ?>

                <tr>
                <td><?php echo $row['AppointmentID'] ?></td> <td><?php echo $row['App_Date'] ?></td> <td><?php echo $row['App_Time'] ?></td>

                <td> <form method="get" action='Cost_Service.php'>
                    <input style='color: #EDEEE9;' type='submit' id='set_app' name='set_app' value='Select'> </td>
                    <td><input style='display: none;' type='text' id='app_id' name='app_id' value='<?php echo $row['AppointmentID'] ?>'></td>

                </tr>
                <?php } ?>
            </table>
            </div>

            <?php  
                if ($result && $result->rowCount() == 0) {
                    session_destroy();
                    echo("<script>alert('No Appointments found! 😟🗃')</script>");
                    echo("<script> location.href='../index.php' </script>");
                }
            ?>

            <?php
            }
            ?>
            <!-- ------------------------- -->

            <!-- //////////// -->
            <div id='display_client'>
                <?php if (isset($_GET['app_id']) || isset($_SESSION['app_id'])) { ?>
                    <table>
                        <?php  
                            while ($row = $result->fetch())  {
                        ?>

                        <tr>
                        <td id="padding_for_row"><?php echo $row['AppointmentID'] ?></td> <td><?php echo $row['ClientID'] ?></td> <td><?php echo $row['App_Date'] ?></td> <td><?php echo $row['App_Time'] ?></td> <td><?php echo $row['Status'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>

                <?php } ?>
            </div>

            <?php if (isset($_GET['app_id']) || isset($_SESSION['app_id'])) { ?>
                <div id='set_client'>
                    <input type="button" onclick="window.location.href='get_parts_method.php?app_id=<?php echo($app_id) ?>'" value="Set Part"> 
                </div>
            <?php } ?>
            <!-- /////////// -->


            <?php if (isset($_GET['app_id']) || isset($_SESSION['app_id'])) { ?>
                <div id='set_client'>
                    <input type="button" onclick="window.location.href='Cost_Service.php?clear=true'" value="Clear"> 
                </div>
            <?php } ?>
            <!-- /////////// -->


            <?php if ($sum > 0 ?? 0) { ?>
                <div id='set_client'>
                    <input type="button" onclick="window.location.href='cost_app_method.php?app_id=<?php echo($_SESSION['app_id']) ?>&cost=<?php echo($_SESSION['sum']) ?>'" value="Cost"> 
                </div>
            <?php } ?>
            <!-- /////////// -->

            <?php if ($sum > 0 ?? 0) { ?>
                <div id='total'>
                <p>Total Cost is: </p>
                <?php echo($sum) ?>
            </div>
            <?php } ?>

        </main>
        
    </body>
</html>

<!-- close connection -->
<?php
    $pdo = null;
?>