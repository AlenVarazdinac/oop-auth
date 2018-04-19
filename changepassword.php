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
	<?php if(isset($_SESSION['user'])):?>
		<form method="post" action="userstuff.php">
			<input type="password" name="oldpassword" placeholder="Enter old password" />
			<input type="password" name="newpassword" placeholder="Enter new password" />
			<input type="submit" value="Submit" />
		</form>
	<?php else: header('location: index.php'); endif;?>

</body>
</html>