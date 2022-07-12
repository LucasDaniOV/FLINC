<?php
require_once("../classes/class.accountDB.php");
session_start();
if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){
    header("Location: ../login/");
    die();
}
$accountDB = new accountDB();
$allAccounts = $accountDB->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Manager</title>
    <link rel="stylesheet" type="text/css" href="./users.css">
    <link rel="stylesheet" type="text/css" href="../index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <nav>
        <a href="../index.php">Menu</a>
        <a href="../login/index.php?logout=true">Logout</a>
    </nav>
    <section class="table-editor">
        <div class="table-btn-container">
            <a href="./new.php" class="table-btn">New</a>
            <a href='./edit.php?id=' class='table-btn table-btn-hidden'>Edit</a>
            <a href='./delete.php?id=' class='table-btn table-btn-hidden'>Delete</a>
        </div>
        <div class="table-search">
            <input type="text" name="search" placeholder="Search">
        </div> 
    </section>
    <table id="allAccounts" class="display">
        <thead>
            <tr class="table-head-row">
                <th class="small-width">ID</th>
                <th class="small-width">Role</th>
                <th class="big-width">First name</th>
                <th class="big-width">Name</th>
                <th class="big-width">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($allAccounts as $account){
                    echo "
                        <tr class='table-rows'>
                            <td id='accountId' class='small-width'> $account->id </td>
                            <td class='small-width'> $account->rol </td>
                            <td class='big-width'> $account->voornaam </td>
                            <td class='big-width'> $account->familienaam </td>
                            <td class='big-width'> $account->email </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
    <script>
        let ACCOUNT_ID;
        let CONTAINER;
        $(function(){
            $('.table-rows').click(function(){ // When a row is clicked
                ACCOUNT_ID = $(this).find('#accountId').text(); //get the id of the clicked row
                ACCOUNT_ID = ACCOUNT_ID.replace(/\s+/g, ''); //remove all whitespaces from the id
                $("tr").css({backgroundColor: "transparent"}); //reset the background color of all rows
                $(".table-btn-hidden").css({"pointer-events": "all", "background-color": "#f21f0c"}); //enable the edit and delete buttons
                $(this).css({backgroundColor: "#262626"}); //set the background color of the clicked row
            });
            $('.table-btn-hidden').click(function(){ // When the edit or delete button is clicked
                $(".table-btn-hidden").attr("href", function(){ //set the href of the edit/delete button
                    return $(this).attr("href") + ACCOUNT_ID; //add the id to the href
                });
            });
            $(document).mouseup(function(event){ // When the mouse is released
                CONTAINER = $(".table-rows");
                if(!CONTAINER.is(event.target) && CONTAINER.has(event.target).length === 0){ // If the clicked element is not the table and not a child of the table
                    $(".table-btn-hidden").css({"pointer-events": "none", "background-color": "#8c2c23"}); //disable the edit and delete buttons
                    $("tr").css({backgroundColor: "transparent"}); //reset the background color of all rows
                }
            });
        });
    </script>
</body>
</html>