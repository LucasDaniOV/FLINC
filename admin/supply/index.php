<?php
    require_once("../require.php");
    require_once("../classes/class.aanbodDB.php");

    $DB = new aanbodDB();
    $aanbod  = $DB->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles</title>
    <style>
        @import url("../gebruikersbeheer/users.css");
        @import url("./supply.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <nav>
        <span>
            <a href="../index.php">Menu</a>
        </span>
        <a href="../login/index.php?logout=true">Logout</a>
    </nav>

    <section class="table-editor">
        <div class="table-btn-container">
            <a href="./new.php" class="table-btn">New</a>
            <a href='./edit.php?id=' class='table-btn table-btn-hidden'>Edit</a>
            <a href='./delete.php?id=' class='table-btn table-btn-hidden'>Delete</a>
            <a href='./pdf.php' target='_blank' class='table-btn'>PDF</a>
        </div>
        <div class="table-search">
            <input type="text" name="search" placeholder="Search">
        </div> 
    </section>
    <table id="allAccounts" class="display">
        <thead>
            <tr class="table-head-row">
                <?php
                    $columns = array("ID", "Created", "Updated", "Categorie", "Merk", "Prijs", "Staat", "Transmissie", "Tellerstand", "Brandstof", "Verbruik", "Bouwjaar", "Kleur", "Voorraad", "Naam");
                    $count = count($columns);

                    for ($i = 0; $i < $count; $i++) {
                        echo "<th>".$columns[$i]."</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($aanbod as $a){
                    echo "
                        <tr class='table-rows'>
                            <td id='accountId'>".$a->id."</td>
                            <td>".$a->created."</td>
                            <td>".$a->updated."</td>
                            <td>".$a->categorie."</td>
                            <td>".$a->merk."</td>
                            <td>".$a->prijs."</td>
                            <td>".$a->staat."</td>
                            <td>".$a->transmissie."</td>
                            <td>".$a->tellerstand."</td>
                            <td>".$a->brandstof."</td>
                            <td>".$a->verbruik."</td>
                            <td>".$a->bouwjaar."</td>
                            <td>".$a->kleur."</td>
                            <td>".$a->voorraad."</td>
                            <td>".$a->naam."</td>
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
