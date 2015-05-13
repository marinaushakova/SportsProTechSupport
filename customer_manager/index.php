<?php
session_start();

// Create a session array if needed
if (empty($_SESSION['tech_support'])) $_SESSION['tech_support'] = array();

require('../model/database.php');
require('../model/customer_db.php');
require('../model/country_db.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_search_form';
}

switch($action) {
	case 'show_search_form':
		include('customer_search.php');
		break;
	case 'search_customer':
		$last_name = $_POST['last_name'];
		$customers = get_customers_by_lastname($last_name);
		include('search_result.php');
		break;
	case 'select_customer':
		$customers = get_customers();
		$countries = get_countries();
		$customerID = $_POST['customerID'];
		$first_name = $_POST['firstName'];
		$last_name = $_POST['lastName'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postal_code = $_POST['postalCode'];
		$country_code = $_POST['countryCode'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		include('customer_update.php');
		break;
	case 'update_customer':
		$customerID = $_POST['customerID'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postal_code = $_POST['postal_code'];
		$country_code = $_POST['country_code'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// Validate the inputs
		if (empty($first_name) || empty($last_name) || empty($address) || empty($city)
				|| empty($state) || empty($postal_code) || empty($country_code)
				|| empty($phone) || empty($email) || empty($password)) {
			$error = "Invalid customer data. Check all fields and try again.";
			include('../errors/error.php');
		} else {
			update_customer($customerID, $first_name, $last_name, $address, $city,
							$state, $postal_code, $country_code, $phone, $email, $password);
			include('confirm_customer_update.php');
		}
		break;
}
		
?>