<a href="../">Home</a><br>
<?php
    session_start();
    //check if logged in
    if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){
        header("Location: ../login/");
        die();
    }

    //explorer code
    if(!isset($_SESSION['path'])){
        $_SESSION['path'] = "../../";
    }

    if(isset($_GET['up'])){
        $_SESSION['path'] = dirname($_SESSION['path']) . "/";
    }

    if(isset($_GET['nav']) && !empty($_GET['nav'])){
        $_SESSION['path'] = $_SESSION['path'] . "/" . $_GET['nav'] . "/";
    }

    if(isset($_POST['bewaarBestand'])){
        if(isset($_POST['fileInhoud']) && !empty($_POST['fileInhoud'])){
            $data = $_POST['fileInhoud'];
            file_put_contents($_SESSION['path'] . $_GET['file'], $data);
        }
    }

    if(isset($_GET['file']) && !empty($_GET['file'])){
        $inhoud = file_get_contents($_SESSION['path'] . $_GET['file']);
    }

    if(isset($_POST['bewaarBestand'])) {
        if(isset($_FILES['bestand'])){
            $destination = $_SESSION['path'] . $_FILES['bestand']['name'];
            $location = $_FILES["bestand"]["tmp_name"];
            move_uploaded_file($location, $destination);
        }
    }

    echo "PATH = " .  $_SESSION['path'] . "<hr>";
    
    $inhoudFolder = scandir($_SESSION['path']);

    echo "
    <form method='post' action='' enctype='multipart/form-data'>
        <input type='file' name='bestand'>
        <input type='submit' name='uploadBestand' value='upload'>
    </form>
    ";

    foreach ($inhoudFolder as $data) {
        if($data == "."){continue;}
        if($data == ".."){
            echo "<a href='index.php?up=1'>..</a><br>";
            continue;
        }

        // $data = urlencode($data);
        // urldecode()

        if(is_file($_SESSION['path'].$data)){
            // het is een file
            echo "<a href='?file=$data'>$data</a>";
            echo "<br>";
        }
        if(is_dir($_SESSION['path'].$data)){
            // het is een folder
            echo "<a href='?nav=$data'>$data</a>";
            echo "<br>";
        }
    }

    if(isset($inhoud)){
        echo "
        <form method='post' action=''>
        <textarea style='font-size: 8pt;width:1200px; height:600px; background-color: black; color: white;' name='fileInhoud'>$inhoud</textarea><br>
        <input type='submit' value='bewaar' name='bewaarBestand'>
        </form>
        ";
    }

?>