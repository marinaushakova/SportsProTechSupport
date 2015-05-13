<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h2>Create Incident</h2>
    <p>This incident was added to our database.</p>
</div>
<?php include '../view/footer.php'; ?>