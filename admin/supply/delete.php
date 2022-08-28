<?php
    // delete.php
    // invoer via URL => id
    require_once("../require.php");
    require_once("../classes/class.aanbodDB.php");

    if(!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])){
        header("Location: ./");
        die();
    }
    
    $aanbod = new aanbodDB();
    $aanbod->delete($_GET['id']);
    header("Location: ./");
    die();
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