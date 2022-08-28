<?php
    //new.php
    //op deze pagina kan je een nieuw account maken

    require_once("../classes/class.accountDB.php");

    //alleen toegankelijk als je bent ingelogd
    session_start();
    if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){
        header("Location: ../login/");
        die();
    }

    if(isset($_POST['newAccount'])){
        if(isset($_POST['voornaam']) && !empty($_POST['voornaam']) && isset($_POST['familienaam']) && !empty($_POST['familienaam']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['wachtwoord']) && !empty($_POST['wachtwoord'])){
            //code
            $account = new account();
            $account->voornaam = $_POST['voornaam'];
            $account->familienaam = $_POST['familienaam'];
            $account->email = $_POST['email'];
            $account->wachtwoord = $_POST['wachtwoord'];
            $account->rol = $_POST['rol'];
            $accountDB = new accountDB();
            if($accountDB->insertAsObject($account)){
                //gelukt
                header('Location: ./');
                die();
            } else {
                //niet gelukt
                echo 'Er is iets fout gegaan';
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new user</title>
</head>
<body>
    <a href="./">Terug</a>
    <form action="" method="post">
        voornaam:<br>
        <input type="text" name="voornaam" required><br>
        familienaam:<br>
        <input type="text" name="familienaam" required><br>
        email:<br>
        <input type="email" name="email" required><br>
        wachtwoord:<br>
        <input type="password" name="wachtwoord" required><br>
        rol:
        <select name="rol">
            <option>user</option>
            <option value="admin">administrator</option>
            <option>auteur</option>
            <option>medewerker</option>
        </select><br>
        <input type="submit" name="newAccount" value="Bewaar">    
    </form>
</body>
</html>