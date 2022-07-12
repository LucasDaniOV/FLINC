<a href="./index.php">Terug</a> 
<?php
    // edit.php
    // invoer via URL => id

    require_once("../require.php");
    require_once("../classes/class.aanbodDB.php");
    
    
    if(!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])){
        header("Location: ./");
        die();
    }

    $aanbodDB = new aanbodDB();
    $aanbod = $aanbodDB->getById($_GET['id']);

    if(!$aanbod){
        header("Location: ./");
        die();
    }

    echo "<pre>";
    print_r($aanbod);
    echo "</pre>";

    if(isset($_POST['newAanbod'])){
        $aanbod->updated = date("Y-m-d H:i:s");
        $aanbod->categorie = $_POST['categorie'];
        $aanbod->merk = $_POST['merk'];
        $aanbod->prijs = $_POST['prijs'];
        $aanbod->staat = $_POST['staat'];
        $aanbod->transmissie = $_POST['transmissie'];
        $aanbod->tellerstand = $_POST['tellerstand'];
        $aanbod->brandstof = $_POST['brandstof'];
        $aanbod->verbruik = $_POST['verbruik'];
        $aanbod->bouwjaar = $_POST['bouwjaar'];
        $aanbod->kleur = $_POST['kleur'];
        $aanbod->voorraad = $_POST['voorraad'];
        $aanbod->naam = $_POST['naam'];
        $aanbod->omschrijving = $_POST['omschrijving'];
        $aanbod->foto = $_POST['foto'];
        $aanbodDB->updateAsObject($aanbod);
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
        Categorie:<br>
        <select name="categorie" id="">
            <option <?php if($aanbod->categorie == 'Bestelwagens'){ echo 'selected';}?> value='Bestelwagens'>Bestelwagen</option>
			<option <?php if($aanbod->categorie == 'Personenwagens'){ echo 'selected';}?> value='Personenwagens'>Personenwagen</option>
            <option <?php if($aanbod->categorie == 'Vrachtwagens'){ echo 'selected';}?> value='Vrachtwagens'>Vrachtwagen</option>
        </select>
        <br>
        Merk:<br>
        <select name="merk" id="">
            <option <?php if($aanbod->merk == 'Audi'){ echo 'selected';}?> value='Audi'>Audi</option>
            <option <?php if($aanbod->merk == 'BMW'){ echo 'selected';}?> value='BMW'>BMW</option>
            <option <?php if($aanbod->merk == 'Mercedes'){ echo 'selected';}?> value='Mercedes'>Mercedes</option>
            <option <?php if($aanbod->merk == 'Volkswagen'){ echo 'selected';}?> value='Volkswagen'>Volkswagen</option>
        </select>
        <br>
        Prijs:
        <br>
        <input type="number" name="prijs" required value='<?php if(isset($_POST["prijs"])){echo $_POST["prijs"];}else {echo $aanbod->prijs;} ?>'>
        <br>
        Staat:
        <br>
        <select name="staat">
            <option <?php if($aanbod->staat == 'Nieuw'){ echo 'selected';}?> value="Nieuw">Nieuw</option>
            <option <?php if($aanbod->staat == 'Gebruikt'){ echo 'selected';}?> value="Gebruikt">Gebruikt</option>
        </select>
        <br>
        Transmissie:<br>
        <select name="transmissie" id="">
            <option <?php if($aanbod->transmissie == 'Manueel'){ echo 'selected';}?> value='Manueel'>Manueel</option>
            <option <?php if($aanbod->transmissie == 'Automatisch'){ echo 'selected';}?> value='Automatisch'>Automatisch</option>
        </select>
        <br>
        Tellerstand:<br>
        <input type="number" name="tellerstand" required value='<?php if(isset($_POST["tellerstand"])){echo $_POST["tellerstand"];}else {echo $aanbod->tellerstand;} ?>'><br>
        Brandstof:<br>
        <select name="brandstof" id="">
            <option <?php if($aanbod->brandstof == 'Benzine'){ echo 'selected';}?> value='Benzine'>Benzine</option>
            <option <?php if($aanbod->brandstof == 'Diesel'){ echo 'selected';}?> value='Diesel'>Diesel</option>
            <option <?php if($aanbod->brandstof == 'LPG'){ echo 'selected';}?> value='LPG'>LPG</option>
            <option <?php if($aanbod->brandstof == 'Elektrisch'){ echo 'selected';}?> value='Elektrisch'>Elektrisch</option>
        </select><br>
        Verbruik:<br>
        <input type="number" name="verbruik" required value='<?php if(isset($_POST["verbruik"])){echo $_POST["verbruik"];}else {echo $aanbod->verbruik;} ?>'><br>
        Bouwjaar:<br>
        <input type="number" name="bouwjaar" required value='<?php if(isset($_POST["bouwjaar"])){echo $_POST["bouwjaar"];}else {echo $aanbod->bouwjaar;} ?>'><br>
        Kleur:<br>
        <input type="text" name="kleur" required value='<?php if(isset($_POST["kleur"])){echo $_POST["kleur"];}else {echo $aanbod->kleur;} ?>'><br>
        Voorraad:<br>
        <input type="number" name="voorraad" required value='<?php if(isset($_POST["voorraad"])){echo $_POST["voorraad"];}else {echo $aanbod->voorraad;} ?>'><br>
        Naam:<br>
        <input type="text" name="naam" required value='<?php if(isset($_POST["naam"])){echo $_POST["naam"];}else {echo $aanbod->naam;} ?>'><br>
        Omschrijving:<br>
        <textarea name="omschrijving" id="" cols="30" rows="10" required><?php if(isset($_POST["omschrijving"])){echo $_POST["omschrijving"];}else {echo $aanbod->omschrijving;} ?></textarea><br>
        Foto:<br>
        <input type="text" name="foto" required value='<?php if(isset($_POST["foto"])){echo $_POST["foto"];}else {echo $aanbod->foto;} ?>'><br>
        <br>
        <input type="submit" name="newAanbod" value="Update">
    </form>
</body>
</html>