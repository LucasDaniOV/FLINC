<?php

require_once('class.databank.php');
require_once('class.message.php');

class messageDB extends databank {
    public function __construct() {
        parent:: __construct();
        $sql = "
            CREATE TABLE IF NOT EXISTS `message` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `created` DATETIME NOT NULL,
                `updated` DATETIME NULL,
                `email` VARCHAR(255) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                `phone` VARCHAR(255) NOT NULL,
                `company` VARCHAR(255) NOT NULL,
                `subject` VARCHAR(255) NOT NULL,
                `text` TEXT NOT NULL,
                `reply` TEXT NULL,
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
        $stmt = $connection->prepare("insert into message values(
                null,
                now(),
                null,
                :email,
                :name,
                :phone,
                :company,
                :subject,
                :text,
                null
            )"
        );
        $stmt->bindParam(':email', $object->email);
        $stmt->bindParam(':name', $object->name);
        $stmt->bindParam(':phone', $object->phone);
        $stmt->bindParam(':company', $object->company);
        $stmt->bindParam(':subject', $object->subject);
        $stmt->bindParam(':text', $object->text);
        return $stmt->execute();
    }

    public function delete($id) {
        $connection = $this->connect();
        $stmt = $connection->prepare("delete from message where id = :id"
        );
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getAll() {
        $connection = $this->connect(); 
		$sql = "SELECT * FROM message";
		$result = $connection->query($sql);
		return $result->fetchAll(PDO::FETCH_CLASS, "message");
    }
    public function getById($id) {
        $connection = $this->connect();
        $stmt = $connection->prepare("select * from message where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("message");
    }
    public function update($object) {
        $connection = $this->connect();
        $stmt = $connection->prepare("update message set updated = now(), reply = :reply where id = :id");
        $stmt->bindParam(':id', $object->id);
        $stmt->bindParam(':reply', $object->reply);
        return $stmt->execute();
    }
}
