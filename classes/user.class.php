<?php
class User extends Database {

	public $name;
	public $email;
	private $password;

	public function register($name, $email, $password){

		// Name validation
		if(empty($name)){
			header('location: register.php?nameempty');
			exit();
		}
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$name = explode(' ', trim($name));
		$name = $name[0];
		$name = ucfirst($name);

		// Email validation
		if(empty($email)){
			header('location: register.php?emailempty');
			exit();
		}
		$conn = $this->connect()->prepare("SELECT email FROM users WHERE email=:email");
		$conn->bindParam('email', $email);
		$conn->execute();
		$dbEmail = $conn->fetch();
		print_r($dbEmail);
		if($dbEmail['email'] === $email){
			header('location: register.php?emailexists='.$email);
			exit();
		}
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location: register.php?email');
			exit;
		}

		// Password validation
		if(empty($password)){
			header('location: register.php?pwempty');
			exit;
		}

		if(strlen($password) < 3 || strlen($password) > 12){
			header('location: register.php?password');
			exit;
		}

		// Set values
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;

		// Insert into db
		$conn = $this->connect()->prepare("INSERT INTO users(name, email, password) 
			VALUES (:name, :email, md5(:password))");
		$conn->bindParam('name', $this->name);
		$conn->bindParam('email', $this->email);
		$conn->bindParam('password', $this->password);
		$conn->execute();
		header('location: login.php?registered');
	
	}

	public function login($email, $password){

		if(empty($email)){
			header('location: login.php?emailempty');
			exit;
		}

		if(empty($password)){
			header('location: login.php?pwempty');
			exit;
		}


		$conn = $this->connect()->prepare('SELECT * FROM users WHERE email=:email and password=md5(:password)');
		$conn->bindParam('email', $email);
		$conn->bindParam('password', $password);
		$conn->execute();
		$user = $conn->fetch(PDO::FETCH_OBJ);

		if($user!=null){
			$_SESSION['user']=$user;
			header('location: login.php?logged');
		}else{
			header('location: login.php?emailandpw');
		}

	}

	public function changePassword($name, $email, $oldPassword, $newPassword){
		$conn = $this->connect()->prepare('UPDATE users SET password=md5(:newpassword) WHERE name=:name and email=:email and password=md5(:oldpassword)');
		$conn->bindParam('name', $name);
		$conn->bindParam('email', $email);
		$conn->bindParam('oldpassword', $oldPassword);
		$conn->bindParam('newpassword', $newPassword);
		$conn->execute();
		session_destroy();
		header('location: login.php?pwchanged');
	}

	public function logout(){
		session_destroy();
		header('location: index.php?logdout');
	}

	public function getUsers(){
		$conn = $this->connect()->query('SELECT * FROM users');

		$users = $conn->fetchAll(PDO::FETCH_OBJ);
		foreach($users as $user){
			$name = $user->name;
			$email = $user->email;
			$userData[] = [
				'name' => $name,
				'email' => $email
			];
		}
		return $userData;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

}