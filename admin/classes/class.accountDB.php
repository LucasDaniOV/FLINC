<?php
require_once('class.databank.php');
require_once('class.account.php');

class accountDB extends databank{
	public function __construct(){
		parent::__construct();
		$sql = "
			CREATE TABLE IF NOT EXISTS `account` (
				`id` Int(11)  NOT NULL  AUTO_INCREMENT,
				`created` Datetime  NOT NULL  ,
				`updated` Datetime  NOT NULL  ,
				`voornaam` Varchar(255)  NULL  ,
				`familienaam` Varchar(255)  NULL  ,
				`email` Varchar(255)  NULL  ,
				`wachtwoord` Varchar(255)  NULL  ,
				`rol` Varchar(255)  NULL  ,
				PRIMARY KEY (`id`),
				UNIQUE `uniekEmailAdres` (`email`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;";
		try {
	        $connection = $this->connect();
	        $connection->exec($sql);
	        return true;
	    }catch (PDOException $e) {
			//return "error: " . $e->getMessage();
	        return false;
	    }
	}
	public function insertAsObject($object){
		$object->wachtwoord = password_hash($object->wachtwoord, PASSWORD_DEFAULT);
		$connection = $this->connect(); 
				$stmt = $connection->prepare("insert into account values(null,now(),now(),:voornaam,:familienaam,:email,:wachtwoord,:rol);");
		//$stmt->bindParam(":created", $object->created);
		//$stmt->bindParam(":updated", $object->updated);
		$stmt->bindParam(":voornaam", $object->voornaam);
		$stmt->bindParam(":familienaam", $object->familienaam);
		$stmt->bindParam(":email", $object->email);
		$stmt->bindParam(":wachtwoord", $object->wachtwoord);
		$stmt->bindParam(":rol", $object->rol);
		return $stmt->execute();
	}
	public function getAll(){
		$connection = $this->connect(); 
		$sql = "SELECT * FROM account";
		$result = $connection->query($sql);
		return $result->fetchAll(PDO::FETCH_CLASS, "account");
	}
	public function getByKey($key){
		$connection = $this->connect(); 
		$stmt = $connection->prepare("SELECT * FROM account WHERE id = :id");
		$stmt->bindParam(":id", $key);
		$stmt->execute();
		return $stmt->fetchObject("account");
	}
	public function update($object){
		$object->wachtwoord = password_hash($object->wachtwoord, PASSWORD_DEFAULT);
		$connection = $this->connect(); 
		$sql= "update account set created = :created,updated = :updated,voornaam = :voornaam,familienaam = :familienaam,email = :email,wachtwoord = :wachtwoord,rol = :rol where id= :id";
		$stmt = $connection->prepare($sql);
		$stmt->bindParam(":id", $object->id);
		$stmt->bindParam(":created", $object->created);
		$stmt->bindParam(":updated", $object->updated);
		$stmt->bindParam(":voornaam", $object->voornaam);
		$stmt->bindParam(":familienaam", $object->familienaam);
		$stmt->bindParam(":email", $object->email);
		$stmt->bindParam(":wachtwoord", $object->wachtwoord);
		$stmt->bindParam(":rol", $object->rol);
		return $stmt->execute();
	}
	public function delete($id){
		$connection = $this->connect();
		$stmt = $connection->prepare("DELETE FROM account WHERE id = :id");	
		$stmt->bindParam(":id", $id);
		$stmt->execute();
	}
	public function findLogin($email, $password){
		$connection = $this->connect(); 
		$stmt = $connection->prepare("SELECT * FROM account WHERE email = :mail");
		$stmt->bindParam(":mail", $email);
		$stmt->execute();
		$acc = $stmt->fetchObject("account");
		if($acc){
		// email found
			if(password_verify($password, $acc->wachtwoord)){
			// check password
				return $acc;
			} else {
			// wrong password
				return false;
			}
		} else {
		// email not found
			return false;
		}
	}
}
