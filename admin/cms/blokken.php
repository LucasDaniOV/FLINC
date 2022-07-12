<?php
    require_once("../require.php");

    if(!isset($_GET['pagina']) || empty($_GET['pagina'])){
        // er is iets fout want er is geen pagina meegegeven.
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($_GET['blok']) && !empty($_GET['blok'])){ echo $_GET['blok']; } else { echo $_GET['pagina']; }?></title>

    <style>
        @import url("./index.css");
        h1 {
            text-align: center;
        }
        body {
            overflow-x: hidden;
        }
        #restore {
            display: block;
            margin: auto;
            text-align: center;
            color: white;
        }
        .include-code, pre {
            position: absolute;
        }
        .include-code {
            display: none;
            top: 6rem;
            left: 2rem;
        }
        pre {
            display: none;
            background-color: black;
            padding: 1rem;
            color: white;
            top: 5rem;
            left: 2rem;
            margin-left: 8rem;
        }
        #mceu_61 {
            display: none;
        }
        #mceu_11 {
            margin-left: 2rem;
        }
        #editor-btn {
            padding: 0.5rem 1rem;
            font-size: 1.5rem;
            border-radius: none;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 2rem;
        }
        #editor-btn:hover {
            color: #bf3326;
        }
        #textarea {
            height: 72vh;
        }
        #close {
            display: none;
            position: absolute;
            top: 6rem;
            left: 49rem;
            font-size: 3rem;
            background-color: white;
            color: #000;
            cursor: pointer;
        }
        #open {
            position: absolute;
            top: 6rem;
            left: 2rem;
            font-size: 3rem;
            background-color: white;
            color: #000;
            cursor: pointer;
        }
    </style>

</head>
<body>
    <nav>
        <span>
            <a href="../index.php">Menu</a>>
            <a href="./index.php">Pages</a>

            <?php
                if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
                    echo "><a href='./blokken.php?pagina=" . $_GET['pagina'] . "'>" . $_GET['pagina'] . "</a>";
                }
                if(isset($_GET['blok']) && !empty($_GET['blok'])){
                    echo "><a href='./blokken.php?pagina=" . $_GET['pagina'] . "&blok=" . $_GET['blok'] . "'>" . $_GET['blok'] . "</a>";
                }
            ?>

        </span>
        <a href="../login/index.php?logout=true">Logout</a>
    </nav>
    <section class="table-editor">
        <div class="table-btn-container">
            <span id="btn-new" class="table-btn">New</span>
            <a id="btn-edit" href='?pagina=<?php echo $_GET['pagina'] ?>&blok=' class='table-btn table-btn-hidden'>Edit</a>
        </div>
        <div class="table-search">
            <input type="text" name="search" placeholder="Search">
        </div> 
    </section>
    <h1 id="h1-page"><?php echo $_GET['pagina']?></h1>
    <table id="allPages" class="display">
        <thead>
            <tr class="table-head-row">
                <th>Section</th>
                <th>Last modified</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // blokken.php
                // geef hier een overzicht van alle bestanden in de aangeklikte folder
                $elementen = scandir("./data/" . $_GET['pagina'] . "/");
                foreach ($elementen as $element) {
                    if(is_file("./data/" . $_GET['pagina'] . "/" . $element)){
                        echo "
                            <tr class='table-rows'>
                                <td>
                                    <span class='block-text'>" . $element . "</span><br>
                                </td>
                                <td>
                                    " . date("d-m-Y H:i:s", filemtime("./data/" . $_GET['pagina'] . "/" . $element)) . "
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
                Geef naam van nieuwe block:
                <input type="text" name="newblock"><br>
                <input type="submit" value="maak aan"><br>
                
                <?php
                    if(isset($_POST['newblock']) || !empty($_POST['newblock'])){
                        //maak dit als bestand aan...
                        touch("./data/" . $_GET['pagina'] . "/" . $_POST['newblock'] . ".php");
                    }
                ?>
            </form>
        </div>
    </div>

    <?php
        if(isset($_GET['blok']) && !empty($_GET['blok'])) {
            // er is een blok meegegeven

            $inhoud = file_get_contents("./data/" . $_GET['pagina'] . "/" . $_GET['blok']);

            echo "
                <h1 id='h1-block'>" . $_GET['blok'] . "</h1>
                <span id='open' class='material-icons'>chevron_right</span>
                <span id='close' class='material-icons'>close</span>
                <a id='restore' href='restore.php?pagina=" . $_GET['pagina'] . "&blok=" . $_GET['blok'] . "'>Click here to restore a previous version</a>
                <p class='include-code'>Include code:<br><pre>&lt;?php include('../admin/cms/data/" . $_GET['pagina'] . "/" . $_GET['blok'] . "'); ?&gt;</pre></p>

                <form class='editor' method='post' action=''>
                    <textarea id='textarea' name='content'>" . $inhoud . "</textarea><br>
                    <input id='editor-btn' type='submit' value='Save'>
                </form>
            ";

            if(isset($_POST['content'])){
                $from = "./data/" . $_GET['pagina'] . "/" . $_GET['blok'];
                $to = "./archive/" . $_GET['pagina'] . "/" . $_GET['blok'] . "." . date('Y-m-d H-i-s');
                
                // check if $to exists
                if(!is_dir("./archive/" . $_GET['pagina'])){
                    mkdir("./archive/" . $_GET['pagina']);
                }
                
                copy($from, $to);
                
                // check the present versions
                $lijstVanBackups = glob("./archive/" . $_GET['pagina'] . "/" . $_GET['blok']."*");
                $countBackups = count($lijstVanBackups);
            
                sort($lijstVanBackups);
                
                //delete last version if $countBackups > 5
                if($countBackups > 5){
                    unlink($lijstVanBackups[0]);
                }
                
                file_put_contents("./data/" . $_GET['pagina'] . "/" . $_GET['blok'], $_POST['content']);
            }
        }
    ?>
    <script src="../tinymce/tinymce.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let BLOCK_NAME;
        let CONTAINER;
        $(function(){
            $('.table-rows').click(function(){ // When a row is clicked

                BLOCK_NAME = "";
                BLOCK_NAME = $(this).find('.block-text').text(); //get the blockname of the clicked row
                BLOCK_NAME = BLOCK_NAME.replace(/\s+/g, ''); //remove all whitespaces from the name

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
            if($('#h1-block').length){
                $('.table-editor, #h1-page, table').css({display: "none"});
            }
            $('#btn-edit').click(function(){
                $(".table-btn-hidden").attr("href", function(){ //set the href of the edit/delete button
                  return $(this).attr("href") + BLOCK_NAME; //add the id to the href
                });                
            });
            $('#close').click(function(){
                $('.include-code, pre').css({display: "none"});
                $(this).css({display: "none"});
                $('#open').css({display: "unset"});
            });
            $('#open').click(function(){
                $('.include-code, pre').css({display: "unset"});
                $(this).css({display: "none"});
                $('#close').css({display: "unset"});
            });
        });
        tinymce.init({
            selector: '#textarea',
            theme: 'modern',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
        });
    </script>
</body>
</html>