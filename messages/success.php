<?php if(isset($_GET['logged'])): ?>
	<p>You have successfully logged in.</p>
<?php endif;?>

<?php if(isset($_GET['pwchanged'])): ?>
	<p>You have successfully changed your password, you can log in now.</p>
<?php endif;?>

<?php if(isset($_GET['logdout'])): ?>
	<p>You have successfully logged out.</p>
<?php endif;?>

<?php if(isset($_GET['registered'])): ?>
	<p>You are successfully registered, you can log in now.</p>
<?php endif;?>