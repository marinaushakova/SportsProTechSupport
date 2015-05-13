<?php
// make sure the user is logged in as a valid administrator
if (!isset($_SESSION['tech_support']['is_valid_tech'])) {
	header("Location: ." );
}
?>