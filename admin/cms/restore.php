<?php require_once('../require.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Dusty Archive</title>
    <style>
        body {
            background-color: black;
            color: white;
            overflow-x: hidden;
        }
        #mceu_61, #mceu_123, #mceu_185, #mceu_247, #mceu_309 {
            display: none;
        }
        .restore-btn {
            padding: 0.5rem 1rem;
            font-size: 1.5rem;
            border-radius: none;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
            border: solid 1px white;
        }
        .restore-btn:hover {
            background-color: #bf3326;
            color: black;
        }
        hr {
            border: solid 2px white;
        }
        #date {
            font-size: 1.5rem;
            line-height: 3rem;
        }
        h1 {
            text-align: center;
            font-size: 2.5rem;
        }
        nav {
            height: 4rem;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 2rem;   
        }
        nav a:hover {
            color: #f21f0c;
        }
    </style>
</head>

<nav>
    <span>
        <a href="../index.php">Menu</a>
        ><a href="./index.php">Pages</a>

        <?php
            echo "><a href='./blokken.php?pagina=" . $_GET['pagina'] . "'>" . $_GET['pagina'] . "</a>";
            echo "><a href='./blokken.php?pagina=" . $_GET['pagina'] . "&blok=" . $_GET['blok'] . "'>" . $_GET['blok'] . "</a>";
        ?>

        ><a href="./restore.php">Time machine</a>

    </span>
    <a href="../login/index.php?logout=true">Logout</a>
</nav>

<?php
    // restore.php

    /*
        - overzicht van de vorige versies van een bepaalde pagina en blok
        - mogelijkheid om een restore te doen
    */

echo "<h1>" . $_GET['pagina'] . "</h1>";
echo "<h1>" . $_GET['blok'] . "</h1>";
echo "<br>";

if(!isset($_GET['pagina']) || empty($_GET['pagina']) || !isset($_GET['blok']) || empty($_GET['blok'])) {
    //er is data dat mist
    die("je gaf niet de juiste parameters mee");
}

if(isset($_POST['restore'])){
    //als er op een restore knop geklikt werd
    file_put_contents("./data/" . $_GET['pagina'] . "/" . $_GET['blok'], $_POST['old']);
    header("Location: ./blokken.php?pagina=" . $_GET['pagina'] . "&blok=" . $_GET['blok']);
}

$lijstVanBackups = glob("./archive/" . $_GET['pagina'] . "/" . $_GET['blok']."*");

foreach($lijstVanBackups as $vorigeVersie) {
    // datum van de backup ophalen

    $modified = filemtime($vorigeVersie);
    echo "<hr>";
    echo "<span id='date'>" . date("Y-m-d | H:i:s", $modified) . "</span>";
    echo 
        "<form action='' method='post'>
            <textarea name='old' class='editor'>" . file_get_contents($vorigeVersie) . "</textarea><br>
            <input class='restore-btn' name='restore' type='submit' value='Herstel deze versie'>
        </form
        <hr>"
        ;

}
?>
<script src="../tinymce/tinymce.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    tinymce.init({
        selector: '.editor',
        height: 300,
        theme: 'modern',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
    });
</script>