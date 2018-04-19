<?php
include_once 'config.php';

$user = new User();
// LOGIN
if(isset($_POST['email']) && isset($_POST['password'])){
	$user->login($_POST['email'], $_POST['password']);
}
// Change password
if(isset($_POST['oldpassword']) && isset($_POST['newpassword'])){
	$user->changePassword($_SESSION['user']->name, $_SESSION['user']->email,
	 $_POST['oldpassword'], $_POST['newpassword']);
}