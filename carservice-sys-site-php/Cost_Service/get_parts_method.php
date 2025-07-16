<?php
session_start();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>Car Service - Choose Part</title>

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
        show_page = document.getElementById('show_parts_page');
        delete_page = document.getElementById('delete_part_page');

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
            console.log("show_parts_page run!")

            show_page.style.display = 'flex';
            delete_page.style.display = 'none';
        }
        else if (open_page_switch == 1) {
            console.log("delete_part_page run!")

            show_page.style.display = 'none';
            delete_page.style.display = 'flex';
        }

        document.querySelector('header').addEventListener('click', function() {
            location.href='../index.php';
        });
        document.getElementById('home').addEventListener('click', function() {
            window.location.href='../index.php';
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
        /* position: relative; */
        width: 60%;
        height: 100%;
        margin: auto;
        background-color: #c8cbbd;
        border-left: 10px solid #c8cbbd;
        border-right: 10px solid #c8cbbd;
        padding-bottom: 10px;
        /* gap: 10px; */

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
        /* border-bottom-right-radius: 100px; */
    }

    header::before{
        position: absolute;
        content: "";
        background-color: #c8cbbd;
        top: 0; bottom: 0; left: 0; right: 0;
        z-index: -1;
        border: 5px solid #c8cbbd;
    }

    #show_parts_page, #delete_part_page{
        flex-basis: auto;
        display: flex;
        flex-direction: column;
        overflow: auto;
    }

    #delete_part_page{
        display: none;
    }

    #show_parts_page form, #delete_part_page form{
        flex-basis: auto;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        /* padding-bottom: 10px; */
    }

    #delete_part_page form{
        padding-bottom: 10px;

        /* for fire */
        position: relative;
    }

    #show_parts_page #cont_for_scrollTable{
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

        /* cssgenerator.org, NA. Box Shadow CSS Generator [Online]. Available at: https://cssgenerator.org/box-shadow-css-generator.html [Accessed 01.05.2025]. */
        -webkit-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;
        -moz-box-shadow: 0px 10px 18px -14px rgba(0,0,0,0.58) inset;
        /* cssgenerator.org, NA. Box Shadow CSS Generator [Online]. Available at: https://cssgenerator.org/box-shadow-css-generator.html [Accessed 01.05.2025]. */
    }

    #show_parts_page #cont_for_scrollTable table, #delete_part_page table{
        width: 100%;
        flex-basis: auto;
        flex-direction: column;
    }

    #cont_for_scrollTable table *, #delete_part_page table *{
        text-align: center;
        font-family: "Londrina Solid", sans-serif;
        font-size: 1.2vw;
        color:rgb(126, 121, 121);
    }
    
    #cont_for_scrollTable table tr, #delete_part_page table tr{
        box-shadow: inset 0px 0px 2px 2px #0000002a;
        border: none;
    }

    #delete_part_page td{
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

    #cont_for_scrollTable table #delete_part, #cont_for_scrollTable table #update_part, #delete_part_page table #delete_part_conf{
        /* action_buttons */
        padding: 10px;
        background-color: #d90429;
        color: #EDEEE9;
        border-radius: 10px;
        box-shadow: none;
        opacity: 0.6;
        transition: 0.5s;
    }

    #submit, #delete_part_conf{
        height: 12vh;
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;
    }

    #update_client{
        height: 42px;
        background-color: #d90429;
        color: #EDEEE9;
        opacity: 0.6;
        transition: 0.5s;
    }
    

    #submit:hover, #cont_for_scrollTable table #delete_part:hover, #cont_for_scrollTable table #update_part:hover, #delete_part_page #delete_part_conf:hover, #update_client:hover{
        opacity: 1
    }

    /* display fire */
    #delete_part_conf:hover ~ .fire{
        opacity: 1;
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

    </style>
    
    <!-- get fire -->
    <link rel="stylesheet" href="../fire.css">

    <!-- --------------------------------------------------------------- PHP ------------------------------------------------------ -->

    <?php

        include '../pdo_conn.php';

        $parts = $_SESSION['parts_ids'] ?? [];


        if (isset($_POST["update_part"])){
            // update part clicked
            ?> <script>console.log('update part btn on - PartID: <?php echo($_POST['id']); ?>');</script> <?php
            // echo("<script type='text/javascript'> open_page_switcher(1); </script>");
            $sql = 'SELECT * FROM Parts WHERE Status = "R" AND PartID = ' . $_POST["id"];
            ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
            $result = $pdo->query($sql);
          }
          
        else if (isset($_POST["delete_part"]) || isset($_POST["delete_part_conf"]) ){

            if (isset($_POST['delete_part_conf'])){
                    //deletion of specific part
                    ?> <script>console.log('part deletion start');</script> <?php
                    echo("<script type='text/javascript'> open_page_switcher(1); </script>");
                    $sql = 'UPDATE Parts SET Status = "D" WHERE PartID = ' . $_POST["id"];
                    ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                    $result = $pdo->query($sql);

                    echo("<script type='text/javascript'> open_page_switcher(0); </script>");
                    echo("<script type='text/javascript'> window.location.href='get_parts_method.php'; </script>");
                }

            else {
                //"Delete" btn clicked
                ?> <script>console.log('delete part btn on - PartID: <?php echo($_POST['id']); ?>');</script> <?php
                echo("<script type='text/javascript'> open_page_switcher(1); </script>");
                $sql = 'SELECT * FROM Parts WHERE Status = "R" AND PartID = ' . $_POST["id"];
                ?> <script>console.log('<?php echo($sql); ?>');</script> <?php
                $result = $pdo->query($sql);
            }

          }
        else {
            if (strtolower($_POST['type_to_search'] ?? "") == "all") {
                //sql statemant - get all parts from parts 
                $sql = "SELECT * FROM Parts WHERE Status = 'R' AND Quantity > 0";
                ?> <script>console.log("<?php echo($sql); ?>");</script> <?php
                $result = $pdo->query($sql); 
            }
            else if ($_POST['type_to_search'] ?? "" != "") {
                //sql statemant - get part
                $sql = "SELECT * FROM Parts WHERE Status = 'R' AND Quantity > 0 AND Type LIKE '" . "%" . $_POST['type_to_search'] . "%'";
                ?> <script>console.log("<?php echo($sql); ?>");</script> <?php
                $result = $pdo->query($sql); 
            }
            
            else {
                if (isset($_POST['submit_form'])) {
                    echo("<script>alert('Enter field can not be empty! ❌')</script>");
                    echo("<script>window.location.href = 'get_parts_method.php';</script>");
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

        <div id="show_parts_page">
            <form name="getAllPart" action="get_parts_method.php" method="post" >
                <input type='text' id='type_to_search' name='type_to_search' value='' placeholder="Enter Type to Search or type 'all' to get All Parts!">
                <input type="submit" id="submit" value="Search Part" name="submit_form">
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
                    <td><?php echo $row['PartID'] ?></td> <td><?php echo $row['Type'] ?></td> <td><?php echo $row['Compatibility'] ?></td> <td><?php echo $row['Price'] ?></td>
                    
                    <?php
                    $item_qty = $row['Quantity'];
                        foreach ($_SESSION['parts_ids'] ?? [] as $part_id) {
                            if ($part_id == $row['PartID']) {
                                $item_qty--;
                            }
                        }
                    //$item_qty = max(1, $item_qty);
                    $item_qty_low = 0;
                    if ($item_qty > 0) {
                        $item_qty_low = 1;
                    }

                    if ($item_qty < 0) {$item_qty = 0;}
                    if ($item_qty_low < 0) {$item_qty_low = 0;}

                    ?> <script>console.log('<?php echo("Item_Qty_Max is: " . $item_qty); ?>');</script> <?php
                    ?> <script>console.log('<?php echo("Item_Qty_Low is: " . $item_qty_low); ?>');</script> <?php
                    
                    ?>

                    <td calspan='4'>
                        <form method="get" action='Cost_Service.php'>
                            <input type='hidden' id='part_cost' name='part_cost' value='<?php echo $row['Price'] ?>'>
                            <input type='hidden' id='part_id' name='part_id' value='<?php echo $row['PartID'] ?>'>
                            <input type='number' onkeydown='return false;' min="<?= $item_qty_low ?>" max="<?= $item_qty ?>" id='qty' name='qty' value='<?= $item_qty_low ?>'></input>
                            <input style='color: #EDEEE9;' type='submit' id='update_client' name='update_client' value='set'> </td>  
                        </form>
                    <td>

                    </tr>
                    <?php } ?>
                </table>

                <?php
                }
                ?>

            </div>
        </div>

    </main>
 
</body>


</html>

<!-- close connection -->
<?php
    $pdo = null;
?>