<a href="./index.php">Terug</a> 
<?php
    // edit.php
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

    $accountDB = new accountDB();
    $account = $accountDB->getByKey($_GET['id']);

    if(!$account){
        header("Location: ./");
        die();
    }

    echo "<pre>";
    print_r($account);
    echo "</pre>";

    if(isset($_POST['newAccount'])){
        $account->voornaam = $_POST['voornaam'];
        $account->familienaam = $_POST['familienaam'];
        $account->email = $_POST['email'];
        $account->wachtwoord = $_POST['wachtwoord'];
        $account->rol = $_POST['rol'];
        $account->updated = date("Y-m-d H:i:s");
        $accountDB->update($account);
        header('Location: ./');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="" method="post">
        voornaam:<br>
        <input type="text" name="voornaam" required value='<?php if(isset($_POST["voornaam"])){echo $_POST["voornaam"];}else {echo $account->voornaam;} ?>'><br>
        familienaam:<br>
        <input type="text" name="familienaam" required value='<?php if(isset($_POST["familienaam"])){echo $_POST["familienaam"];}else {echo $account->familienaam;} ?>'><br>
        email:<br>
        <input type="email" name="email" required value='<?php if(isset($_POST["email"])){echo $_POST["email"];}else {echo $account->email;} ?>'><br>
        wachtwoord:<br>
        <input type="password" name="wachtwoord" required value='<?php if(isset($_POST["wachtwoord"])){echo $_POST["wachtwoord"];}else {echo $account->wachtwoord;} ?>'><br><br>
        rol:
        <select name="rol">
			<option <?php if($account->rol == 'admin'){ echo 'selected';}?> value='admin'>administrator</option>
			<option <?php if($account->rol == 'auteur'){ echo 'selected';}?> value='auteur'>auteur</option>
            <option <?php if($account->rol == 'medewerker'){ echo 'selected';}?> value='medewerker'>medewerker</option>
            <option <?php if($account->rol == 'gebruiker'){ echo 'selected';}?> value='gebruiker'>gebruiker</option>
        </select><br>
        <input type="submit" name="newAccount" value="Update">    
    </form>
</body>
</html>