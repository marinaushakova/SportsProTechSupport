<?php
function add_registration($customerID, $product_code, $date) {
	global $db;
	$query = "INSERT INTO registrations
			  (customerID, productCode, registrationDate)
			  VALUES
			  ($customerID, '$product_code', '$date')";
	$db->exec($query);
}

function get_registrated_products_by_customer($customerID) {
	global $db;
	$query = "SELECT * FROM registrations
			  	INNER JOIN products
			  	ON registrations.productCode = products.productCode
			  WHERE customerID = $customerID";
	$products = $db->query($query);
	return $products;
}

?>