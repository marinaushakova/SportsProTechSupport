<?php
// Start session management with a per-session cookie
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
	$action = 'list_unassigned_incidents';
}

switch($action) {
	case 'list_unassigned_incidents':
		$incidents = get_unassigned_incidents();
		include('incident_select.php');
		break;
	case 'select_incident':
		$_SESSION['tech_support']['incidentID'] = $_POST['incidentID'];
		$technicians = get_technicians_with_open_incidents_count();
		include('technician_select.php');
		break;
	case 'select_technician':
		$_SESSION['tech_support']['techID'] = $_POST['techID'];
		$technician = get_technician($_SESSION['tech_support']['techID']);
		$incident = get_incident($_SESSION['tech_support']['incidentID']);
		include('incident_assign.php');
		break;
	case 'assign_incident':
		$incident = get_incident($_SESSION['tech_support']['incidentID']);
		$techID = $_SESSION['tech_support']['techID'];
		$result = update_incident($incident['incidentID'], $incident['customerID'], $incident['productCode'], $techID, $incident['dateOpened'], null, $incident['title'], $incident['description']);
		if ($result != 0) {
			include('confirmation.php');
			unset($_SESSION['tech_support']['techID']);
			unset($_SESSION['tech_support']['incidentID']);
		} else {
			include('../errors/error.php');
		}
		break;
}

?>