<?php 
include_once 'config.php';
include_once 'userstuff.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP Authorization</title>
	<meta charset="utf-8" />
</head>
<body>
	<?php include 'success.php';?>
	<?php include 'errors.php';?>
	<?php if(isset($_SESSION['user'])):?>
		<h3>You are logged in as <?php echo $_SESSION['user']->name;?></h3>
		<a href="/projects/oop_auth/changepassword.php">Change password</a>
		<br>
		<a href="/projects/oop_auth/logout.php">Log out</a>
	<?php else: ?>
	<form method="post" action="userstuff.php">
		<input type="text" name="email" placeholder="Enter email" />
		<input type="password" name="password" placeholder="Enter password" />
		<input type="submit" value="Login" />
	</form>
	<a href="<?php $appPath;?>index.php">Back</a>
	<?php endif;?>
</body>
</html>