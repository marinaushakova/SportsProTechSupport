<?php
session_start();

// Create a session array if needed
if (empty($_SESSION['tech_support'])) $_SESSION['tech_support'] = array();

require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_register_product_form';
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['tech_support']['is_valid_customer'])) {
	$action = 'login_customer';
}

switch($action) {
	case 'login_customer':
		if (isset($_POST['email']) AND isset($_POST['password'])) {
			$username = $_POST['email'];
			$password = $_POST['password'];
		}
		if (is_valid_customer_login($username) AND $password == "sesame") {
			$_SESSION['tech_support']['is_valid_customer'] = true;
			$_SESSION['tech_support']['customer_email'] = $username;
			$customer = get_customer_by_email($_SESSION['tech_support']['customer_email']);
			$products = get_products();
			include('register_product.php');
		} else {
			include('customer_login_form.php');
		}
		break;
	case 'show_register_product_form':
		$customer = get_customer_by_email($_SESSION['tech_support']['customer_email']);
		$products = get_products();
		include('register_product.php');
		break;
	case 'register_product':
		$customerID = $_POST['customerID'];
		$product_code = $_POST['productCode'];
		$date = date('Y-m-d');
		add_registration($customerID, $product_code, $date);
		include('registration_confirmation.php');
		break;
	case 'logout_customer':
		unset($_SESSION['tech_support']['customer_email']);
		unset($_SESSION['tech_support']['is_valid_customer']);
		include('customer_login_form.php');
		break;
}
?>