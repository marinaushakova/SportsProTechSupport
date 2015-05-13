<?php
function get_products() {
	global $db;
	$query = 'SELECT * FROM products
			  ORDER BY productCode';
	$products = $db->query($query);
	return $products;
}

function delete_product($product_code) {
	global $db;
	$query = "DELETE FROM products
			  WHERE productCode = '$product_code'";
	$db->exec($query);
}

function add_product($code, $name, $version, $release_date) {
	global $db;
	$query = "INSERT INTO products
			  (productCode, name, version, releaseDate)
			  VALUES
			  ('$code', '$name', '$version', '$release_date')";
	$db->exec($query);
}
?>