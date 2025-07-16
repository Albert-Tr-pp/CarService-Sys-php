<?php
    //destroy session if active
    if (session_status() ===  PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Main Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&family=Londrina+Sketch&family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">

<!-- --------------------------------------------------------------- JS SCRIPT ------------------------------------------------------ -->

<script>
    function open_clients_window(grp) {
    grp.style.display = 'flex';
    console.log("display");
}

function close_clients_window(grp) {
    grp.style.display = 'none';
    console.log("hidde buttons");
}

window.onload = function() {
    document.querySelector('header').addEventListener('click', function() {
        window.location.href='index.php';
    });
}

function setRat() {
    //RAT
    console.log('rat func run!')
    document.getElementById('rat').addEventListener('click', function() {
        window.location.href='index.php?rat=true';
    });

    const rat = document.getElementById('rat');
    const maxX = window.innerWidth - rat.offsetWidth;
    const maxY = window.innerHeight - rat.offsetHeight;

    let randomX = Math.floor(Math.random() * maxX);
    let randomY = Math.floor(Math.random() * maxY);

    
    rat.style.left = randomX + 'px';
    rat.style.top = randomY + 'px';
    rat.style.display = 'block';
}

function Record_Payment_note() {
        alert('Record Payment Method comming soon! ⏰');
    }

function sayHello() {
    alert('Hello!');
}

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
        background-image: url(img/car_icon.png);
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
        flex-basis: 150px;
        background-image: url(img/header_footer.png);
        background-size: cover;
        background-position: center;
        background-position-y: 48%;
        border-top-left-radius: 100px;
        background-size: 100% auto;
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

    #clients, #parts, #appointments{
        position: relative;
        flex: 1;
        background-color: #c8cbbd;
        overflow: hidden;
        transition: 0.3s;
    }

    #clients:hover, #parts:hover, #appointments:hover{
        z-index: 1;
        transition: 0.5s;

        /* cssbud.com, 2021. CSS Glow Generator [online] Available at: https://cssbud.com/css-generator/css-glow-generator/ [Accessed 1.05.2025] */
        -webkit-box-shadow:0px 0px 100px 36px rgba(48,48,48,0.6);
        -moz-box-shadow: 0px 0px 100px 36px rgba(48,48,48,0.6);
        /* cssbud.com, 2021. CSS Glow Generator [online] Available at: https://cssbud.com/css-generator/css-glow-generator/ [Accessed 1.05.2025] */
        
        box-shadow: 0px 0px 100px 36px rgba(48,48,48,0.6);
        
    }

    #parts{
        margin: 10px 0 10px 0;
    }

    #clients_display_button, #parts_display_button, #appointments_display_button{
        position: absolute;
        top: 0; bottom: 0; left: 0; right: 0;
    }

    #clients_buttons, #parts_buttons, #appointments_buttons{
        position: absolute;
        top: 0; bottom: 0; left: 0; right: 0;
        display: none;
  }

    #clients_buttons .exit, #parts_buttons .exit, #appointments_buttons .exit{
        color: #d90429;
        flex: initial;
        padding: 0 50px 0 50px;
        
    }

    #clients_buttons input, #parts_buttons input, #appointments_buttons input{
        flex-grow: 1;
        background-color: #303030;
        opacity: 0.9;
        font-family: "Londrina Solid", sans-serif;
        font-size: 2vw;
        color: #EDEEE9;
        border: 0px;
    }

    #clients_buttons input:hover, #parts_buttons input:hover, #appointments_buttons input:hover{
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.541);
    }

    #clients h1, #parts h1, #appointments h1{
        font-family: "Londrina Shadow", sans-serif;
        font-weight: 400;
        position: absolute;
        top: 0; bottom: 0; left: 2%; right: 0;
        text-align: left;
        font-size: 24vh;
        opacity: 0.7;

        color: #21382D;
        user-select: none;

        text-overflow: ellipsis;
        overflow: hidden;
        width: calc(100% - 10px);
    }

    /* RAT BTN */
    #rat{
        position: absolute;
        font-size: 24px;
        user-select: none;
        opacity: 0.6;
        transition: 1s;
        z-index: 10;
        display: none;
    } #rat:hover{opacity: 1;}

</style>

</head>
    <body>

    <p id="rat">🐀</p>

        <main>
            <header></header>

            <div id="clients">
                <h1>CLIENTS</h1>

            <div id="clients_display_button" onclick="open_clients_window(document.getElementById('clients_buttons'))">
            </div>
            
            <div id="clients_buttons">
                <input type="button" onclick="window.location.href='Reg-Up_Client/Reg-Up_Client.php'" value="Register
Client"> 
                <input type="button" onclick="window.location.href='Up-Del_Client/Up-Del_Client.php'" value="Update & Remove
Client">
                <input class="exit" type="button" value="X" onclick="close_clients_window(document.getElementById('clients_buttons'))"> 
            </div>
            </div>

            <div id="parts">
                <h1>PARTS</h1>

            <div id="parts_display_button" onclick="open_clients_window(document.getElementById('parts_buttons'))">
            </div>

            <div id="parts_buttons">
                <input type="button" onclick="window.location.href='Add-Up_Part/Add-Up_Part.php'" value="Add
Part"> 
                <input type="button" onclick="window.location.href='Up-Del_Part/Up-Del_Part.php'" value="Update & Remove
Part">
                <input class="exit" type="button" value="X" onclick="close_clients_window(document.getElementById('parts_buttons'))"> 
            </div>

            </div>
            <div id="appointments">
                <h1>APPOINTMENTS</h1>

            <div id="appointments_display_button" onclick="open_clients_window(document.getElementById('appointments_buttons'))">
            </div>

            <div id="appointments_buttons">
                <input type="button" onclick="window.location.href='Create_App/Create_App.php'" value="Create
Appointment"> 
                <input type="button" onclick="window.location.href='Remove_App/Remove_App.php'" value="Remove
Appointment">
                <input type="button" onclick="window.location.href='Cost_Service/Cost_Service.php'" value="Cost
Service">
                <input type="button" onclick="Record_Payment_note();" value="Record
Payment">
                <input class="exit" type="button" value="X" onclick="close_clients_window(document.getElementById('appointments_buttons'))"> 
            </div>
            </div>
        </main>
        
    </body>
</html>

<!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

<?php
    include 'pdo_conn.php';

    $rat = $_GET['rat'] ?? '';
    ?> <script>console.log('Rat stat : <?php echo($rat); ?>');</script> <?php

    //recieve all records for minigame
    $sql = 'SELECT * FROM forDeletion';
    ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll();

    if (empty($result) && $rat == '') {
        $sql = 'INSERT INTO forDeletion (conditionItem) VALUES(true)';
        ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo('<script>setRat();</script>');
    } 
    elseif (!empty($result) && $rat == true) {
        $sql = 'DELETE FROM forDeletion';
        ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
    elseif (!empty($result) && $rat == '') {
        echo('<script>setRat();</script>');
    }
?>

<!-- close connection -->
<?php
    $pdo = null;
?>