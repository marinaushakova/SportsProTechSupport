<?php
function get_customers_by_lastname($last_name) {
	global $db;
	$query = "SELECT * FROM customers
			  WHERE lastName = '$last_name'
			  ORDER BY customerID";
	$customers = $db->query($query);
	return $customers;
}

function get_customer_by_email($email) {
	global $db;
	$query = "SELECT * FROM customers
			  WHERE email = '$email'";
	$customers = $db->query($query);
	$customer = $customers->fetch();
	return $customer;
}

function get_customers() {
	global $db;
	$query = "SELECT * FROM customers
			  ORDER BY customerID";
	$customers = $db->query($query);
	return $customers;
}

function update_customer($customerID, $first_name, $last_name, $address, $city,
						 $state, $postal_code, $country_code, $phone, $email, $password) {
	global $db;
	$query = "UPDATE customers
			  SET firstName = '$first_name', lastName = '$last_name', address = '$address',
			  city = '$city', state = '$state', postalCode = '$postal_code', countryCode = '$country_code',
			  phone = '$phone', email = '$email', password = '$password'
			  WHERE customerID = $customerID";
	$db->exec($query);
}

function is_valid_customer_login($email) {
	global $db;
	$query = 'SELECT * FROM customers
              WHERE email = :email';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
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