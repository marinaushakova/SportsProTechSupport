<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h2>View/Update Customer</h2>
    <p>Customer was successfully updated.</p>
    <p><a href="?action=show_search_form">Search Customers</a></p>
</div>
<?php include '../view/footer.php'; ?>