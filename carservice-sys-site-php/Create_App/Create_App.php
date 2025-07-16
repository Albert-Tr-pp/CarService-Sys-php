<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Create Appointment</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&family=Londrina+Sketch&family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">

<!-- --------------------------------------------------------------- JS SCRIPT ------------------------------------------------------ -->

<script>

    let date;

    window.onload = function() {
        document.querySelector('header').addEventListener('click', function() {
            location.href='../index.php';
        });
        document.getElementById('home').addEventListener('click', function() {
            location.href='../index.php';
        });

        document.getElementById('date').value = localStorage.getItem('date', date);
    }

    function reloadPage() {
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
    }

    #set_client input:hover, #set_date:hover, #create_App:hover{
        opacity: 1
    }

    /* --------------- Set Client --------------- */

    #display_client{
        padding-bottom: 10px;
    }

    #display_client table{
        width: 100%;
        flex-basis: auto;
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

    /* --------------- Set Date --------------- */

    #select_date{
        padding-bottom: 10px;
        
        justify-content: center;   
    }

    #select_date #date{
        background-color: #c8cbbd;
        padding: 10px;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        border: none;
    }

    #set_date{
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
        box-shadow: inset 0px 0px 2px 2px #0000002a;
    }

    /* --------------- Set Time --------------- */

    #set_time{
        padding-bottom: 10px;
        display: flex;
        justify-content: space-around;
        gap: 5px;
    }

    #set_time form{
        flex-grow: 1;
        gap: 5px;
    }

    #create_App{
        width: 100%;
        height: 100%;
        padding: 10px;
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;

        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;

        border: none;
        box-shadow: inset 0px 0px 2px 2px #0000002a;

    }

</style>

<!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

<?php
    include '../pdo_conn.php';

    $id = $_GET['id'] ?? "";
    $date = $_GET['date'] ?? "";

    echo("<script type='text/javascript'> console.log(id = '$id'); </script>");
    echo("<script type='text/javascript'> console.log(date = '$date'); </script>");

    if ($id != "") {
        $sql = 'SELECT * FROM Clients WHERE Status = "R" AND ClientID = :id';

        $result = $pdo->prepare($sql);
        $result->bindValue(':id', $id);
        $result->execute();

        ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
    }

    if (isset($_GET['date'])) {
        $sql = "SELECT Time FROM (SELECT '10:00' AS Time FROM DUAL UNION ALL SELECT '12:00' FROM DUAL UNION ALL SELECT '16:00' FROM DUAL UNION ALL SELECT '18:00' FROM DUAL) AS allTimes WHERE Time NOT IN (SELECT App_Time FROM Appointments WHERE Status = 'R' AND App_Date = STR_TO_DATE('$date', '%Y-%m-%d'))";
        
        ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
        $resultTime = $pdo->query($sql);

    }
?>

<!-- --------------------------------------------------------------- MAIN HTML ------------------------------------------------------ -->

</head>
    <body>
        <img id="home" src="../img/home.png" alt="home">

        <main>
            <header></header>

            <div id='set_client'>
                <input type="button" onclick="window.location.href='get_clients_method.php'" value="Set Client"> 
            </div>

            <!-- //////////// -->
            <div id='display_client'>
                <?php if (isset($_GET['id'])) { ?>
                    <table>
                        <?php  
                            while ($row = $result->fetch())  {
                        ?>

                        <tr>
                        <td id="padding_for_row"><?php echo $row['ClientID'] ?></td> <td><?php echo $row['Firstname'] ?></td> <td><?php echo $row['Lastname'] ?></td> <td><?php echo $row['Phone'] ?></td> <td><?php echo $row['Email'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>

                <?php } ?>
            </div>
            <!-- /////////// -->



            <div id='select_date'>
                <?php if (isset($_GET['id'])) { ?>
                    <form method="get" action="Create_App.php?">
                        <input type="date" id="date" name="date" onchange="reloadPage()">
                        <input style='display: none;' type='text' id='id' name='id' value='<?php echo($_GET['id']) ?>'>
                        <input id='set_date' type="submit" value="Set Date">
                    </form>
                <?php } ?>
            </div>

            

            <!-- //////////// -->
            <div id='set_time'>
                <?php if (isset($_GET['date'])) { ?>
                    <!-- <table> -->
                        <?php  
                            while ($row = $resultTime->fetch())  {
                        ?>

                        <form method="POST" action='reg_appointment.php'>
                            <input type='submit' id='create_App' name='create_App' value="<?php echo $row['Time'] ?>"> </td>
                            <td><input style='display: none;' type='text' id='id' name='id' value='<?php echo $_GET['id'] ?>'></td>
                            <td><input style='display: none;' type='text' id='date' name='date' value='<?php echo  $_GET['date'] ?>'></td>
                            <td><input style='display: none;' type='text' id='time' name='time' value="<?php echo $row['Time'] ?>"></td>
                        </form>
                        <?php } ?>
                    <!-- </table> -->

                <?php } ?>
            </div>
            <!-- /////////// -->
             
        </main>
        
    </body>
</html>

<!-- close connection -->
<?php
    $pdo = null;
?>