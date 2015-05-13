<?php
function get_countries() {
	global $db;
	$query = "SELECT * FROM countries
			  ORDER BY countryName";
	$countries = $db->query($query);
	return $countries;
}

?>