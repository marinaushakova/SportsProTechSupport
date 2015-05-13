<?php
session_start();

// Create a session array if needed
if (empty($_SESSION['tech_support'])) $_SESSION['tech_support'] = array();

require('../model/database.php');
require('../model/admin_db.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_admin_menu';
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['tech_support']['is_valid_admin'])) {
	$action = 'login_administrator';
}

switch($action) {
	case 'login_administrator':
		if (isset($_POST['username']) AND isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
		if (is_valid_admin_login($username, $password)) {
			$_SESSION['tech_support']['is_valid_admin'] = true;
			$_SESSION['tech_support']['admin_username'] = $username;
			include('admin_menu.php');
		} else {
			include('admin_login_form.php');
		}
		break;
	case 'show_admin_menu':
		include('admin_menu.php');
		break;
	case 'logout_administrator':
		unset($_SESSION['tech_support']['is_valid_admin']);
		unset($_SESSION['tech_support']['admin_username']);
		include('admin_login_form.php');
		break;
} 
?>