<?php
// check if logged in
require_once("../classes/class.accountDB.php");
session_start();
if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){
    header("Location: ../login/");
    die();
}

// index.php in de CMS folder

// - overzicht van de folders in de data folder (pagina's) + nieuwe folder kunnen bijmaken
// - die aanklikbaar maken
// - dan editeerbare elementen oplijsten + nieuw element kunnen maken
// - die aanklikbaar maken
// - deze kunnen wijzigen en bewaren
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content manager</title>
    <style>
        @import url("./index.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <nav>
        <span>
            <a href="../index.php">Menu</a>>
            <a href="">Pages</a>
        </span>
        <a href="../login/index.php?logout=true">Logout</a>
    </nav>
    <section class="table-editor">
        <div class="table-btn-container">
            <span id="btn-new" class="table-btn">New</span>
            <a id="btn-edit" href='./blokken.php?pagina=' class='table-btn table-btn-hidden'>Edit</a>
        </div>
        <div class="table-search">
            <input type="text" name="search" placeholder="Search">
        </div> 
    </section>
    <table id="allPages" class="display">
        <thead>
            <tr class="table-head-row">
                <th>Page</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $elementen = scandir("./data");

                foreach ($elementen as $element) {
                    if(is_dir("./data/" . $element)) {
                        if($element == "." || $element == ".."){
                            continue;
                        }
                        // het is een folder
                        echo "
                            <tr class='table-rows'>
                                <td>
                                    <span class='material-icons folder-icon'>description</span>" . "<span class='folder-text'>" . $element . "</span><br>
                                </td>
                            </tr>
                        ";
                    }
                }
            ?>
        </tbody>
    </table>
    
    <div class="new-page">
        <div class="new-page-container">
            <span class="material-icons close">close</span>
            <form method="post" action="">
                Geef naam van nieuwe pagina:
                <input type="text" name="newFolder"><br>
                <input type="submit" name="newFolderBtn" value="Maak pagina"><br>
                
                <?php
                    if(isset($_POST['newFolderBtn'])){
                        if(isset($_POST['newFolder'])){
                            mkdir("./data/" . $_POST["newFolder"]);
                            header("Location: index.php");
                        }
                    }
                ?>
            </form>
        </div>
    </div>

    <script>
        let PAGE_NAME;
        let CONTAINER;
        $(function(){
            $('.table-rows').click(function(){ // When a row is clicked

                PAGE_NAME = "";
                PAGE_NAME = $(this).find('.folder-text').text(); //get the pagename of the clicked row
                PAGE_NAME = PAGE_NAME.replace(/\s+/g, ''); //remove all whitespaces from the name

                $("tr").css({backgroundColor: "transparent"}); //reset the background color of all rows
                $(".table-btn-hidden").css({"pointer-events": "all", "background-color": "#f21f0c"}); //enable the edit and delete buttons
                $(this).css({backgroundColor: "#262626"}); //set the background color of the clicked row
            });
            $(document).mouseup(function(event){ // When the mouse is released
                CONTAINER = $(".table-rows");
                NEW_PAGE = $(".new-page");
                if(!CONTAINER.is(event.target) && CONTAINER.has(event.target).length === 0){ // If the clicked element is not the table and not a child of the table
                    $(".table-btn-hidden").css({"pointer-events": "none", "background-color": "#8c2c23"}); //disable the edit and delete buttons
                    $("tr").css({backgroundColor: "transparent"}); //reset the background color of all rows                    
                }
            });
            $('#btn-new').click(function(){
                $('.new-page').css({display: "unset"});
                $(this).css({"pointer-events": "none", "background-color": "#8c2c23"});
            });
            $('.close').click(function(){
                $('.new-page').css({display: "none"});
                $('#btn-new').css({"pointer-events": "all", "background-color": "#f21f0c"});
            });
            $('#btn-edit').click(function(){
                $(".table-btn-hidden").attr("href", function(){ //set the href of the edit/delete button
                  return $(this).attr("href") + PAGE_NAME; //add the id to the href
                });                
            });
        });
    </script>
</body>
</html>