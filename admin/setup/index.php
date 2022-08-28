<?php

require_once("../classes/class.accountDB.php");

$DB = new accountDB();
$tempAccount = new account();
$tempAccount->voornaam = "";
$tempAccount->familienaam = "";
$tempAccount->email = "admin";
$tempAccount->rol = "admin";
$tempAccount->wachtwoord = "admin";

$DB->insertAsObject($tempAccount);

// require_once("../classes/class.aanbodDB.php");

// $DB = new aanbodDB();
// $tempAanbod = new aanbod();
// $tempAanbod->categorie = "bestelwagens";
// $tempAanbod->merk = "Mercedes";
// $tempAanbod->prijs = "100000";
// $tempAanbod->staat = "gebruikt";
// $tempAanbod->transmissie = "manueel";
// $tempAanbod->tellerstand = "0";
// $tempAanbod->brandstof = "benzine";
// $tempAanbod->verbruik = "10";
// $tempAanbod->bouwjaar = "2000";
// $tempAanbod->kleur = "wit";
// $tempAanbod->voorraad = "10";
// $tempAanbod->naam = "test";
// $tempAanbod->omschrijving = "test";
// $tempAanbod->foto = "bestelwagens.png";

// $DB->insertAsObject($tempAanbod);

// require_once("../classes/class.messageDB.php");

// $DB = new messageDB();
// $tempMessage = new message();

// $tempMessage->email = "test@mail.com";
// $tempMessage->name = "test";
// $tempMessage->phone = "0612345678";
// $tempMessage->company = "test";
// $tempMessage->subject = "test";
// $tempMessage->text = "test";

// try {
//     $DB->insertAsObject($tempMessage);
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
