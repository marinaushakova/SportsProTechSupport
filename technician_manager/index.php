<?php
session_start();

// Create a session array if needed
if (empty($_SESSION['tech_support'])) $_SESSION['tech_support'] = array();

require('../model/database.php');
require('../model/technician_db.php');

if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'list_technicians';
}

switch($action) {
	case 'list_technicians':
		$technicians = get_technicians();
		include('technician_list.php');
		break;
	case 'delete_technician':
		$tech_ID = $_POST['techID'];
		delete_technician($tech_ID);
		header("Location: .");
		break;
	case 'show_add_form':
		include('technician_add.php');
		break;
	case 'add_technician':
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		// Validate the inputs
		if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password)) {
			$error = "Invalid technician data. Check all fields and try again.";
			include('../errors/error.php');
		} else {
			add_technician($first_name, $last_name, $email, $phone, $password);
			header("Location: .");
		}
		break;
}

?>