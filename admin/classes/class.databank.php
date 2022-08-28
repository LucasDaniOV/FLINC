<?php
require_once("settings.php");

class databank{
	private $connection;
	public function __construct(){
		try {
			$this->connection = new PDO("mysql:host=".DBSERVER, DBUSER, DBPASSWD.";charset=utf8");
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection->exec("CREATE DATABASE IF NOT EXISTS `".DB."`;");
			return true;
		}catch (PDOException $e) {
			return false;
		}
	}
	public function connect(){
		$this->connection = new PDO("mysql:host=".DBSERVER.";charset=utf8;dbname=".DB, DBUSER, DBPASSWD);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $this->connection;
	}
	public function __destruct(){
		$this->connection = null;
	}
}
