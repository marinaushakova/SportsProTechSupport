<?php
function add_incident($customerID, $product_code, $techID, $open_date, $title, $description) {
	global $db;
	$title = mysql_real_escape_string($title);
	$description = mysql_real_escape_string($description);
	$query = "INSERT INTO incidents
			  (customerID, productCode, techID, dateOpened, title, description)
			  VALUES
			  ($customerID, '$product_code', $techID, '$open_date', '$title', '$description')";
	$db->exec($query);
}

function get_unassigned_incidents() {
	global $db;
	$query = 'SELECT * FROM incidents
				INNER JOIN customers
		    			ON incidents.customerID = customers.customerID
				INNER JOIN products
						ON incidents.productCode = products.productCode
			  WHERE techID IS NULL';
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

function get_assigned_incidents() {
	global $db;
	$query = 'SELECT * FROM incidents
				INNER JOIN customers
		    			ON incidents.customerID = customers.customerID
				INNER JOIN products
						ON incidents.productCode = products.productCode
			  WHERE incidents.techID IS NOT NULL';
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

function get_incident($incidentID) {
	global $db;
	$query = 'SELECT * FROM incidents
				INNER JOIN customers
		    			ON incidents.customerID = customers.customerID
			  WHERE incidentID = :incidentID';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':incidentID', $incidentID);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}

function update_incident($incidentID, $customerID, $product_code, $techID, $open_date, $close_date, $title, $description) {
	global $db;
	$query = 'UPDATE incidents
              SET customerID = :customer_id,
                  productCode = :code,
                  techID = :tech_id,
                  dateOpened = :date_opened,
				  dateClosed = :date_closed,
                  title = :title,
                  description = :description
              WHERE incidentID = :incident_id';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':customer_id', $customerID);
		$statement->bindValue(':code', $product_code);
		$statement->bindValue(':tech_id', $techID);
		$statement->bindValue(':date_opened', $open_date);
		$statement->bindValue(':date_closed', $close_date);
		$statement->bindValue(':title', $title);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':incident_id', $incidentID);
		$row_count = $statement->execute();
		$statement->closeCursor();
		return $row_count;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}
}

function get_open_incidents($techID) {
	global $db;
	$query = 'SELECT * FROM incidents
				INNER JOIN customers
		    	ON incidents.customerID = customers.customerID
			  WHERE (dateClosed IS NULL AND techID = :techID)';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':techID', $techID);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	} catch (PDOException $e) {
		display_db_error($e->getMessage());
	}
}
?>