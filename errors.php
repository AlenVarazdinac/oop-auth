<?php if(isset($_GET['nameempty'])): ?>
	<p>Please enter your name</p>
<?php endif; ?>

<?php if(isset($_GET['emailempty'])): ?>
	<p>Please enter your e-mail</p>
<?php endif; ?>

<?php if(isset($_GET['email'])): ?>
	<p>Please enter valid e-mail</p>
<?php endif; ?>

<?php if(isset($_GET['emailexists'])): ?>
	<p>User with email <?php echo $_GET['emailexists'];?> already exists. 
		<a href="<?php $appPath;?>login.php">Login</a>
	</p>
<?php endif; ?>

<?php if(isset($_GET['password'])): ?>
	<p>Please enter password between 3 and 12 characters</p>
<?php endif; ?>

<?php if(isset($_GET['pwempty'])): ?>
	<p>Please enter your password</p>
<?php endif; ?>

<?php if(isset($_GET['emailandpw'])): ?>
	<p>E-mail or Password is not correct</p>
<?php endif; ?>
