<?php

require_once('class.databank.php');
require_once('class.aanbod.php');

class aanbodDB extends databank {
    public function __construct() {
        parent:: __construct();
        $sql = "
            CREATE TABLE IF NOT EXISTS `aanbod` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `created` DATETIME NOT NULL,
                `updated` DATETIME NOT NULL,
                `categorie` VARCHAR(255) NOT NULL,
                `merk` VARCHAR(255) NOT NULL,
                `prijs` DECIMAL(10,2) NOT NULL,
                `staat` VARCHAR(255) NOT NULL,
                `transmissie` VARCHAR(255) NOT NULL,
                `tellerstand` DECIMAL(10,2) NOT NULL,
                `brandstof` VARCHAR(255) NOT NULL,
                `verbruik` DECIMAL(10,2) NOT NULL,
                `bouwjaar` INT(11) NOT NULL,
                `kleur` VARCHAR(255) NOT NULL,
                `voorraad` INT(11) NOT NULL,
                `naam` VARCHAR(255) NOT NULL,
                `omschrijving` TEXT NOT NULL,
                `foto` VARCHAR(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
        ";
        try {
            $connection = $this->connect();
            $connection->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function insertAsObject($object) {
        $connection = $this->connect();
        $stmt = $connection->prepare("insert into aanbod values(
                null,
                now(),
                now(),
                :categorie,
                :merk,
                :prijs,
                :staat,
                :transmissie,
                :tellerstand,
                :brandstof,
                :verbruik,
                :bouwjaar,
                :kleur,
                :voorraad,
                :naam,
                :omschrijving,
                :foto
            )"
        );
        $stmt->bindParam(':categorie', $object->categorie);
        $stmt->bindParam(':merk', $object->merk);
        $stmt->bindParam(':prijs', $object->prijs);
        $stmt->bindParam(':staat', $object->staat);
        $stmt->bindParam(':transmissie', $object->transmissie);
        $stmt->bindParam(':tellerstand', $object->tellerstand);
        $stmt->bindParam(':brandstof', $object->brandstof);
        $stmt->bindParam(':verbruik', $object->verbruik);
        $stmt->bindParam(':bouwjaar', $object->bouwjaar);
        $stmt->bindParam(':kleur', $object->kleur);
        $stmt->bindParam(':voorraad', $object->voorraad);
        $stmt->bindParam(':naam', $object->naam);
        $stmt->bindParam(':omschrijving', $object->omschrijving);
        $stmt->bindParam(':foto', $object->foto);
        return $stmt->execute();
    }
    public function insertAsArray($array) {
        $connection = $this->connect();
        $stmt = $connection->prepare("insert into aanbod values(
                null,
                now(),
                now(),
                :categorie,
                :merk,
                :prijs,
                :staat,
                :transmissie,
                :tellerstand,
                :brandstof,
                :verbruik,
                :bouwjaar,
                :kleur,
                :voorraad,
                :naam,
                :omschrijving,
                :foto
            )"
        );
        $stmt->bindParam(':categorie', $array['categorie']);
        $stmt->bindParam(':merk', $array['merk']);
        $stmt->bindParam(':prijs', $array['prijs']);
        $stmt->bindParam(':staat', $array['staat']);
        $stmt->bindParam(':transmissie', $array['transmissie']);
        $stmt->bindParam(':tellerstand', $array['tellerstand']);
        $stmt->bindParam(':brandstof', $array['brandstof']);
        $stmt->bindParam(':verbruik', $array['verbruik']);
        $stmt->bindParam(':bouwjaar', $array['bouwjaar']);
        $stmt->bindParam(':kleur', $array['kleur']);
        $stmt->bindParam(':voorraad', $array['voorraad']);
        $stmt->bindParam(':naam', $array['naam']);
        $stmt->bindParam(':omschrijving', $array['omschrijving']);
        $stmt->bindParam(':foto', $array['foto']);
        return $stmt->execute();
    }
    public function updateAsObject($object) {
        $connection = $this->connect();
        $stmt = $connection->prepare("update aanbod set
                updated = now(),
                categorie = :categorie,
                merk = :merk,
                prijs = :prijs,
                staat = :staat,
                transmissie = :transmissie,
                tellerstand = :tellerstand,
                brandstof = :brandstof,
                verbruik = :verbruik,
                bouwjaar = :bouwjaar,
                kleur = :kleur,
                voorraad = :voorraad,
                naam = :naam,
                omschrijving = :omschrijving,
                foto = :foto
            where id = :id"
        );
        $stmt->bindParam(':id', $object->id);
        $stmt->bindParam(':categorie', $object->categorie);
        $stmt->bindParam(':merk', $object->merk);
        $stmt->bindParam(':prijs', $object->prijs);
        $stmt->bindParam(':staat', $object->staat);
        $stmt->bindParam(':transmissie', $object->transmissie);
        $stmt->bindParam(':tellerstand', $object->tellerstand);
        $stmt->bindParam(':brandstof', $object->brandstof);
        $stmt->bindParam(':verbruik', $object->verbruik);
        $stmt->bindParam(':bouwjaar', $object->bouwjaar);
        $stmt->bindParam(':kleur', $object->kleur);
        $stmt->bindParam(':voorraad', $object->voorraad);
        $stmt->bindParam(':naam', $object->naam);
        $stmt->bindParam(':omschrijving', $object->omschrijving);
        $stmt->bindParam(':foto', $object->foto);
        return $stmt->execute();
    }
    public function delete($id) {
        $connection = $this->connect();
        $stmt = $connection->prepare("delete from aanbod where id = :id"
        );
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getAll() {
        $connection = $this->connect(); 
		$sql = "SELECT * FROM aanbod";
		$result = $connection->query($sql);
		return $result->fetchAll(PDO::FETCH_CLASS, "aanbod");
    }
    public function getById($id) {
        $connection = $this->connect();
        $stmt = $connection->prepare("select * from aanbod where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("aanbod");
    }
}
