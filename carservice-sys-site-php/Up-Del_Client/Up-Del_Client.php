<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Update/Delete Client</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&family=Londrina+Sketch&family=Londrina+Solid:wght@100;300;400;900&display=swap" rel="stylesheet">

    <!-- --------------------------------------------------------------- JS SCRIPT ------------------------------------------------------ -->

    <script>
        console.log("js script run")

        let open_page_switch = 0;

        let show_page = null;
        let delete_page = null;

    function declare_vars () {
        console.log("declare_vars run!")
        show_page = document.getElementById('show_clients_page');
        delete_page = document.getElementById('delete_client_page');

        localStorage.setItem("show_page", show_page);
        localStorage.setItem("delete_page", delete_page);

        console.log("declare_vars run!: vars set!");
    }

    function open_page_switcher(page) {
        if (page == 0) {
            open_page_switch = 0
        }
        else if (page == 1) {
            open_page_switch = 1
        }
    }

    window.onload = function() {
        
        console.log("window.onload run!")
        declare_vars();

        if (open_page_switch == 0) {
            console.log("show_clients_page run!")

            show_page.style.display = 'flex';
            delete_page.style.display = 'none';
        }
        else if (open_page_switch == 1) {
            console.log("delete_client_page run!")

            show_page.style.display = 'none';
            delete_page.style.display = 'flex';
        }

        document.querySelector('header').addEventListener('click', function() {
            location.href='../index.php';
        });
        document.getElementById('home').addEventListener('click', function() {
            location.href='../index.php';
        });
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

    #show_clients_page, #delete_client_page{
        flex-basis: auto;
        display: flex;
        flex-direction: column;
        overflow: auto;
    }

    #delete_client_page{
        display: none;
    }

    #show_clients_page form, #delete_client_page form{
        flex-basis: auto;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
    }

    #delete_client_page form{
        padding-bottom: 10px;

        /* for fire */
        position: relative;
    }

    #show_clients_page #cont_for_scrollTable{
        display: flex;
        flex-basis: auto;
        overflow-y: scroll;
        scrollbar-width: thin;
        scrollbar-color: #c8cbbd #c8cbbd;
        scrollbar-width: none;
        padding-top: 10px;
    }

    #cont_for_scrollTable{
        padding-bottom: 10px;
        box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;

        /* cssbud.com, 2021. CSS Glow Generator [online] Available at: https://cssbud.com/css-generator/css-glow-generator/ [Accessed 1.05.2025] */
        -webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;
        -moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;
        /* cssbud.com, 2021. CSS Glow Generator [online] Available at: https://cssbud.com/css-generator/css-glow-generator/ [Accessed 1.05.2025] */
    }

    #show_clients_page #cont_for_scrollTable table, #delete_client_page table{
        width: 100%;
        flex-basis: auto;
        flex-direction: column;
    }

    #cont_for_scrollTable table *, #delete_client_page table *{
        text-align: center;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        color:rgb(126, 121, 121);
    }
    
    #cont_for_scrollTable table tr, #delete_client_page table tr{
        box-shadow: inset 0px 0px 2px 2px #0000002a;
        border: none;
    }

    #delete_client_page td{
        padding: 25px;
    }

    form input{
        background-color: #c8cbbd;
        padding: 10px;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        border: none;
        box-shadow: inset 0px 0px 2px 2px #0000002a;
    }

    #cont_for_scrollTable table #delete_client, #cont_for_scrollTable table #update_client, #delete_client_page table #delete_client_conf{
        /* action_buttons */
        padding: 10px;
        background-color: #d90429;
        color: #EDEEE9;
        border-radius: 10px;
        box-shadow: none;
        opacity: 0.6;
        transition: 0.5s;
    }

    #submit, #delete_client_conf{
        height: 12vh;

        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;
    }

    #submit:hover, #cont_for_scrollTable table #delete_client:hover, #cont_for_scrollTable table #update_client:hover, #delete_client_page #delete_client_conf:hover{
        opacity: 1
    }

    /* display fire */
    #delete_client_conf:hover ~ .fire{
        opacity: 1;
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

    <!-- get fire -->
    <link rel="stylesheet" href="../fire.css">

    <!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

    <?php

        include '../pdo_conn.php';

        if (isset($_POST["update_client"])){
            // update client clicked
            ?> <script>console.log('update client btn on - ClientID: <?php echo($_POST['id']); ?>');</script> <?php
            $sql = 'SELECT * FROM Clients WHERE Status = "R" AND ClientID = ' . $_POST["id"];
            ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
            $result = $pdo->query($sql);
          }
        else if (isset($_POST["delete_client"]) || isset($_POST["delete_client_conf"]) ){

            if (isset($_POST['delete_client_conf'])){
                    //deletion of specific client
                    ?> <script>console.log('client deletion start');</script> <?php
                    echo("<script type='text/javascript'> open_page_switcher(1); </script>");

                    $sql = 'UPDATE Clients SET Status = "D" WHERE ClientID = :id';
                    ?> <script>console.log('<?php echo($sql); ?>');</script> <?php

                    $result = $pdo->prepare($sql);
                    $result->bindValue(':id', $_POST["id"]);
                    $result->execute();

                    echo("<script type='text/javascript'> open_page_switcher(0); </script>");
                    echo("<script type='text/javascript'> window.location.href='Up-Del_Client.php'; </script>");
                }

            else {
                //"Delete" btn clicked
                ?> <script>console.log('delete client btn on - ClientID: <?php echo($_POST['id']); ?>');</script> <?php
                echo("<script type='text/javascript'> open_page_switcher(1); </script>");

                $sql = 'SELECT * FROM Clients WHERE Status = "R" AND ClientID = :id';

                $result = $pdo->prepare($sql);
                $result->bindValue(':id', $_POST["id"]);
                $result->execute();

                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
            }

          }
        else {
            if (strtolower($_POST['lastname_to_search'] ?? "") == "all") {
                //sql statemant - get all clients from clients 
                $sql = "SELECT * FROM Clients WHERE Status = 'R'";
                ?> <script>console.log("<?php echo($sql); ?>");</script> <?php
                $result = $pdo->query($sql); 
            }
            else if ($_POST['lastname_to_search'] ?? "" != "") {
                //sql statemant - get client
                $sql = "SELECT * FROM Clients WHERE Status = 'R' AND Lastname LIKE :lastname_to_search " . "'%'";
                
                $result = $pdo->prepare($sql);
                $result->bindValue(':lastname_to_search', $_POST['lastname_to_search']);
                $result->execute();
                ?> <script>console.log("<?php echo($sql); ?>");</script> <?php
            }
            
            else {
                if (isset($_POST['submit_form'])) {
                    echo("<script>alert('Enter field can not be empty! ❌')</script>");
                    echo("<script>window.location.href = 'Up-Del_Client.php';</script>");
                }
            }
            
        }
?>

<!-- --------------------------------------------------------------- MAIN HTML ------------------------------------------------------ -->

</head>
<body>

    <img id="home" src="../img/home.png" alt="home">

    <main>
        <header>
        </header>

        <div id="show_clients_page">
            <form name="getAllClient" action="Up-Del_Client.php" method="post" >
                <input type='text' id='lastname_to_search' name='lastname_to_search' value='' placeholder="Enter Lastname to Search or type 'all' to get All Clients!">
                <input type="submit" id="submit" value="Search Client" name="submit_form">
            </form>


            <div id="cont_for_scrollTable">

                <?php
                if (isset($_POST['submit_form'])) {
                    ?>
                <table>
                    <?php  
                        while ($row = $result->fetch())  {
                    ?>

                    <tr>
                    <td><?php echo $row['ClientID'] ?></td> <td><?php echo $row['Firstname'] ?></td> <td><?php echo $row['Lastname'] ?></td>

                    <td> <form method="get" action='../Reg-Up_Client/Reg-Up_Client.php'> <input type='submit' id='update_client' name='update_client' value='Update'> </td> <td><input style='display: none;' type='text' id='id' name='id' value='<?php echo $row['ClientID'] ?>'></td> </form>

                    <td> <form method="post"> <input type='submit' id='delete_client' name='delete_client' value='Delete' onclick="window.location.href='Up-Del_Client.php?ClientID=<?php echo $row['ClientID'] ?>'" > </td> <td><input style='display: none;' type='text' id='id' name='id' value='<?php echo $row['ClientID'] ?>'></td> </form>

                    </tr>
                    <?php } ?>
                </table>

                <?php
                }
                ?>

            </div>
        </div>

        <div id="delete_client_page">

            <table>
                <?php 
                    
                    while ($row = $result->fetch())  {
                        $id_for_del = $row['ClientID'];
                ?>

                <tr>
                <td><?php echo $row['ClientID'] ?></td> <td><?php echo $row['Firstname'] ?></td> <td><?php echo $row['Lastname'] ?></td> <td><?php echo $row['Phone'] ?></td>

                </tr>
                <?php } ?>
            </table>

            <form name="delete_client_conf"  method="post" >
                <input type="submit" value="Delete Client" id="delete_client_conf" name="delete_client_conf" onclick="window.location.href='Up-Del_Client.php'">
                <input style='display: none;' type='text' id='id' name='id' value='<?php echo($id_for_del) ?>'>

                <!-- create fire -->
                <div id="app" class="fire"></div>
            </form>

        </div>
    </main>
 
</body>


</html>

<!-- close connection -->
<?php
    $pdo = null;
?>