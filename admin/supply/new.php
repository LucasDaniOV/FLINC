<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New vehicle</title>
</head>
<body>
    <a href="./">Terug</a>
    <form action="" method="post" enctype="multipart/form-data">
        Categorie:<br>
        <select name="categorie" id="">
            <option value='Bestelwagens'>Bestelwagen</option>
			<option value='Personenwagens'>Personenwagen</option>
            <option value='Vrachtwagens'>Vrachtwagen</option>
        </select>
        <br>
        Merk:<br>
        <select name="merk" id="">
            <option value='Audi'>Audi</option>
            <option value='BMW'>BMW</option>
            <option value='Mercedes'>Mercedes</option>
            <option value='Volkswagen'>Volkswagen</option>
            <option value='Volkswagen'>Porsche</option>
            <option value='Volkswagen'>DAF</option>
        </select>
        <br>
        Prijs:
        <br>
        <input type="number" name="prijs" value='<?php if(isset($_POST["prijs"])){echo $_POST["prijs"];}?>'>
        <br>
        Staat:
        <br>
        <select name="staat">
            <option value="Nieuw">Nieuw</option>
            <option value="Gebruikt">Gebruikt</option>
        </select>
        <br>
        Transmissie:<br>
        <select name="transmissie" id="">
            <option value='Manueel'>Manueel</option>
            <option value='Automatisch'>Automatisch</option>
        </select>
        <br>
        Tellerstand:<br>
        <input type="number" name="tellerstand" value='<?php if(isset($_POST["tellerstand"])){echo $_POST["tellerstand"];}?>'><br>
        Brandstof:<br>
        <select name="brandstof" id="">
            <option value='Benzine'>Benzine</option>
            <option value='Diesel'>Diesel</option>
            <option value='LPG'>LPG</option>
            <option value='Elektrisch'>Elektrisch</option>
        </select><br>
        Verbruik:<br>
        <input type="number" name="verbruik" value='<?php if(isset($_POST["verbruik"])){echo $_POST["verbruik"];}?>'><br>
        Bouwjaar:<br>
        <input type="number" name="bouwjaar" value='<?php if(isset($_POST["bouwjaar"])){echo $_POST["bouwjaar"];}?>'><br>
        Kleur:<br>
        <input type="text" name="kleur" value='<?php if(isset($_POST["kleur"])){echo $_POST["kleur"];}?>'><br>
        Voorraad:<br>
        <input type="number" name="voorraad" value='<?php if(isset($_POST["voorraad"])){echo $_POST["voorraad"];}?>'><br>
        Naam:<br>
        <input type="text" name="naam" value='<?php if(isset($_POST["naam"])){echo $_POST["naam"];}?>'><br>
        Omschrijving:<br>
        <textarea name="omschrijving" id="" cols="30" rows="10"><?php if(isset($_POST["omschrijving"])){echo $_POST["omschrijving"];}?></textarea><br>
        Foto:<br>
        <input type="file" name="foto"><br>
        
        <br><input type="submit" name="newAanbod" value="Submit">
    </form>
</body>
</html>

<?php

    require_once("../require.php");
    require_once("../classes/class.aanbodDB.php");

    if(isset($_POST['newAanbod'])){

        $target_dir = "../../img/cms_uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

        try {
            $aanbod = new aanbod();
            $aanbod->created = date("Y-m-d H:i:s");
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
            $aanbod->foto = htmlspecialchars( basename( $_FILES["foto"]["name"]));
            $aanbodDB = new aanbodDB();
            $aanbodDB->insertAsObject($aanbod);

            header("Location: ./");
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

?>