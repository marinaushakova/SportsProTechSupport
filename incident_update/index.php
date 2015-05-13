<?php

session_start();

// Create a session array if needed
if (empty($_SESSION['tech_support'])) $_SESSION['tech_support'] = array();


require('../model/database.php');
require('../model/incident_db.php');
require('../model/technician_db.php');


if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'show_list_of_incidents';
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['tech_support']['is_valid_tech'])) {
	$action = 'login_technician';
}

switch($action) {
	case 'show_list_of_incidents':
		$technician = get_technician_by_email($_SESSION['tech_support']['tech_email']);
		$incidents = get_open_incidents($technician['techID']);
		include('select_incident.php');
		break;
	case 'login_technician':
		if (isset($_POST['email']) AND isset($_POST['password'])) {
			$username = $_POST['email'];
			$password = $_POST['password'];
		}
		if (is_valid_tech_login($username, $password)) {
			$_SESSION['tech_support']['is_valid_tech'] = true;
			$_SESSION['tech_support']['tech_email'] = $username;
			$technician = get_technician_by_email($_SESSION['tech_support']['tech_email']);
			$incidents = get_open_incidents($technician['techID']);
			include('select_incident.php');
		} else {
			include('technician_login_form.php');
		}
		break;
	case 'logout_technician':
		unset($_SESSION['tech_support']['tech_email']);
		unset($_SESSION['tech_support']['is_valid_tech']);
		include('technician_login_form.php');
		break;
	case 'select_incident':
		$incidentID = $_POST['incidentID'];
		$incident = get_incident($incidentID);
		include('update_incident.php');
		break;
	case 'update_incident':
		$incident = get_incident($_POST['incidentID']);
		if (empty($_POST['dateClosed'])) {
			$date_closed = new DateTime();
			$date_closed = $date_closed->format('Y-m-d');
		} else {
			try {
				$date_closed = new DateTime($_POST['dateClosed']);
				$date_closed = $date_closed->format('Y-m-d');
			} catch (Exception $e) {
				$error = 'Invalide closed date was entered. Check the field and try again.';
				include('../errors/error.php');
				break;
			}
			
		}
		$description = $_POST['description'];
		
		if (empty($description)) {
			$error = "Invalid description data. Check the field and try again.";
			include('../errors/error.php');
		} else {
			$result = update_incident($incident['incidentID'], $incident['customerID'], $incident['productCode'], $incident['techID'], $incident['dateOpened'], $date_closed, $incident['title'], $description);
			if ($result != 0) {
				include('confirmation.php');
			} else {
				include('../errors/error.php');
			}
		}
		
		break;
}
?>