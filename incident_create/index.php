<?php
session_start();

// Create a session array if needed
if (empty($_SESSION['tech_support'])) $_SESSION['tech_support'] = array();

require('../model/database.php');
require('../model/customer_db.php');
require('../model/registration_db.php');
require('../model/incident_db.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_get_customer_form';
}

switch($action) {
	case 'show_get_customer_form':
		include('get_customer_form.php');
		break;
	case 'get_customer':
		$email = $_POST['email'];
		$customer = get_customer_by_email($email);
		// Validate the input
		if (empty($customer)) {
			$error = "There is no customer with this email in the database. Check email and try again.";
			include('../errors/error.php');
		} else {
			$products = get_registrated_products_by_customer($customer['customerID']);
			include('create_incident.php');
		}
		break;
	case 'create_incident':
		$customerID = $_POST['customerID'];
		$product_code = $_POST['productCode'];
		$techID = 'null';
		$open_date = date('Y-m-d');
		$title = $_POST['title'];
		$description = $_POST['description'];
		// Validate the inputs
		if (empty($title) || empty($description)) {
			$error = "Invalid incident data. Check all fields and try again.";
			include('../errors/error.php');
		} else {
			add_incident($customerID, $product_code, $techID, $open_date, $title, $description);
			include('incident_confirmation.php');
		}
		break;
}
?>