<?php 
include_once 'config.php';

if(isset($_POST['name']) && isset($_POST['email']) && $_POST['password']){
	$user = new User();
	$user->register($_POST['name'], $_POST['email'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP Authorization</title>
	<meta charset="utf-8" />
</head>
<body>
	<?php include('errors.php');?>
	<form method="post" action="">
		<label for="name">Name</label>
		<input type="text" id="name" name="name" required placeholder="Enter name" />
		<label for="email">E-mail</label>
		<input type="email" id="email" name="email" required placeholder="Enter email" />
		<label for="password">Password</label>
		<input type="password" id="password" name="password" required pattern=.{3,12} 
		title="3 characters minimum" placeholder="Enter password" />
		<input type="submit" value="Register" />
	</form>
	<a href="/projects/oop_auth/index.php">Back</a>
</body>
</html>