<?php
    // delete.php
    // invoer via URL => id
    require_once("../classes/class.accountDB.php");

    session_start();
    if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){
        header("Location: ../login/");
        die();
    }

    if(!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])){
        header("Location: ./");
        die();
    }

    if($_SESSION['user']->id != $_GET['id']){
        $accountDB = new accountDB();
        $accountDB->delete($_GET['id']);
        header("Location: ./");
        die();
    } else {
        echo "<a href='./index.php'>Terug</a><br>";
        echo "Je kan jezelf niet deleten";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    
</body>
</html>