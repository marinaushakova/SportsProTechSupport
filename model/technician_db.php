<?php
function get_technicians() {
	global $db;
	$query = 'SELECT * FROM technicians
			  ORDER BY techID';
	$technicians = $db->query($query);
	return $technicians;
}

function delete_technician($tech_ID) {
	global $db;
	$query = "DELETE FROM technicians
			  WHERE techID = '$tech_ID'";
	$db->exec($query);
}

function add_technician($first_name, $last_name, $email, $phone, $password) {
	global $db;
	$query = "INSERT INTO technicians
			 (firstName, lastName, email, phone, password)
			 VALUES
			 ('$first_name', '$last_name', '$email', '$phone', '$password')";
	$db->exec($query);
}

function get_technicians_with_open_incidents_count() {
	global $db;
	$query = 'SELECT techID, firstName, lastName, 
				(SELECT COUNT(*) FROM incidents
				 WHERE (dateClosed IS NULL AND technicians.techID = incidents.techID)) AS incidentCount
			 FROM technicians
			 ORDER BY incidentCount';
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function get_technician($techID) {
	global $db;
	$query = 'SELECT * FROM technicians
			  WHERE techID = :techID';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':techID', $techID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function get_technician_by_email($email) {
	global $db;
	$query = 'SELECT * FROM technicians
			  WHERE email = :email';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function is_valid_tech_login($email, $password) {
	global $db;
	$query = 'SELECT * FROM technicians
              WHERE email = :email AND password = :password';
	try {	
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		return $valid;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}
}
?>