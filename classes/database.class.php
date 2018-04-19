<?php

class Database{
	private $dbHost;
	private $dbase;
	private $dbUser;
	private $dbPw;
	private $charset;

	protected function connect(){
		$this->dbHost = 'localhost';
		$this->dbase = 'oopauth';
		$this->dbUser = 'varazdinac';
		$this->dbPw = '123';
		$this->charset = "utf8";

		try {
			$dsn = "mysql:host=".$this->dbHost.";dbname=".$this->dbase.";charset=".$this->charset.";";
			$pdo = new PDO($dsn, $this->dbUser, $this->dbPw);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

}