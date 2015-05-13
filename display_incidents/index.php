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
	$action = 'show_unassigned_incidents';
}

switch($action) {
	case 'show_unassigned_incidents':
		$incidents = get_unassigned_incidents();
		include('unassigned_incidents.php');
		break;
	case 'show_assigned_incidents':
		$incidents = get_assigned_incidents();
		include('assigned_incidents.php');
		break;
}
?>