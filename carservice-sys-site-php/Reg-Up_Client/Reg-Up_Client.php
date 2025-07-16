<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Register/Update Client</title>

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

    #reg-up_client_form{
        background-color: #c8cbbd;
        flex: 1;
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

    $id = $_GET['id'] ?? '';
    $action = strtolower($_GET['update_client'] ?? 'register');       

    echo("<script type='text/javascript'> console.log('$id'); </script>");
    echo("<script type='text/javascript'> console.log('$action'); </script>");

    //get client's info method
    if ($id != '' && $action == "update") {
        include '../pdo_conn.php';

        $sql = "SELECT * FROM Clients WHERE ClientID = $id AND Status = 'R'";
        ?> <script>console.log("<?php echo($sql); ?>");</script> <?php
        $result = $pdo->query($sql);

        while ($row = $result->fetch())  {
            $info = array($row['Firstname'], $row['Lastname'], $row['Phone'], $row['Email'], $row['County'], $row['City'], $row['Street'], $row['EirCode']);
        }

        echo("<script type='text/javascript'> console.log('info array generated!'); </script>");
    }

    //main form subbmited
    if (isset($_POST['submit_form'])) {

        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $county = trim($_POST['county']);
        $city = trim($_POST['city']);
        $street = trim($_POST['street']);
        $eirCode = trim($_POST['eirCode']);

        //validation of input
        if ($firstname == '' || $lastname == '' || $phone == '' || $email == '' || $county == '' || $city == '' || $street == '' || $eirCode == '') {
            echo('<script> alert("Validation Error! All filds must be entered! ❌;"); </script>');
        }

        elseif (!preg_match('/[a-zA-Z]/', $firstname) || !preg_match('/[a-zA-Z]/', $lastname) || !preg_match('/[a-zA-Z]/', $county) || !preg_match('/[a-zA-Z]/', $city)) {
            echo('<script> alert("Validation Error! Firstname, Lastname, County and City fields must be letters only! ❌;"); </script>');
            
        }

        elseif (!preg_match('/[a-zA-Z0-9 _]/', $eirCode) || !preg_match('/[a-zA-Z0-9 _]/', $street)) {
            echo('<script> alert("Validation Error! EirCode and Street can not contain special charachers! ❌;"); </script>');
        }
            
        else {
            //register client
            $status = 'R';

            include '../pdo_conn.php';

            if ($_POST['id'] == "" || $_POST['action'] == "register") {
                $sql = 'INSERT INTO Clients (firstname, lastname, phone, email, county, city, street, eirCode, status) VALUES(:firstname, :lastname, :phone, :email, :county, :city, :street, :eirCode, "R")';
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':firstname', $firstname);
                $stmt->bindValue(':lastname', $lastname);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':county', $county);
                $stmt->bindValue(':city', $city);
                $stmt->bindValue(':street', $street);
                $stmt->bindValue(':eirCode', $eirCode);
                // $stmt->bindValue(':status', $status);

                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $stmt->execute();
                
                echo("<script>
                    alert('Client Added! 💾');
                    window.location.href = '../index.php';
                </script>");
            }
            else {
                //update client's info
                ?> <script>console.log('<?php echo($_POST['id'] . ' / ' . $_POST['action']); ?>');</script> <?php
                $sql = 'UPDATE Clients SET firstname = :firstname, lastname = :lastname, phone = :phone, email = :email, county = :county, city = :city, street = :street, eirCode = :eirCode' .  ' WHERE ClientID = ' . $_POST["id"];
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':firstname', $firstname);
                $stmt->bindValue(':lastname', $lastname);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':county', $county);
                $stmt->bindValue(':city', $city);
                $stmt->bindValue(':street', $street);
                $stmt->bindValue(':eirCode', $eirCode);
                // $stmt->bindValue(':status', $status);

                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $stmt->execute();

                echo("<script>
                    alert('Client updated! 💾');
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

        <div id="reg-up_client_form">
            <form name="reg-up_client" method="post" action="Reg-Up_Client.php">
                <input placeholder="Firstname*" type="text" maxlength="20" name="firstname" value='<?php echo($info[0] ?? '') ?>'> <!-- <br> -->
                <input placeholder="Lastname*" type="text" maxlength="20" name="lastname" value='<?php echo($info[1] ?? '') ?>'> <!-- <br> -->
                <input placeholder="Phone*" type="tel" id="phone" name="phone" maxlength="13" pattern="^\+(\d{12})$" value='<?php echo($info[2] ?? '') ?>'> <!-- <br> -->

                <!-- W3School, NA. HTML <input> pattern Attribute [online]. Available at: https://www.w3schools.com/TAGs/att_input_pattern.asp [Accessed 1.05.2025] -->
                <!-- Email field input validation validation -->
                <input placeholder="Email*" type="email" id="email" name="email" maxlength="20" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value='<?php echo($info[3] ?? '') ?>'><!-- <br> -->
                <!-- W3School, NA. HTML <input> pattern Attribute [online]. Available at: https://www.w3schools.com/TAGs/att_input_pattern.asp [Accessed 1.05.2025] -->
                
                <input placeholder="County*" type="text" maxlength="20" name="county" value='<?php echo($info[4] ?? '') ?? '' ?>'> <!-- <br> -->
                <input placeholder="City*" type="text" maxlength="20" name="city" value='<?php echo($info[5] ?? '') ?>'> <!-- <br> -->
                <input placeholder="Street*" type="text" maxlength="20" name="street" value='<?php echo($info[6] ?? '') ?>'> <!-- <br> -->
                <input placeholder="EirCode*    " type="text" maxlength="7" name="eirCode" value='<?php echo($info[7] ?? '') ?>'> <!-- <br> -->
                <input style='display: none;' type='text' id='action' name='action' value='<?php echo($action ?? '') ?>'>
                <input style='display: none;' type='text' id='id' name='id' value='<?php echo($id ?? '') ?>'>

                <input type="submit" id="submit" value=" <?php echo(ucfirst($action)); ?> Client" name="submit_form"> <!-- <br> -->
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