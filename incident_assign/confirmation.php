<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h2>Assign Incident</h2>
    <p>This incident was assigned to a technician.</p>
    <p><a href="?action=list_unassigned_incidents">Select Another Incident</a></p>
</div>
<?php include '../view/footer.php'; ?>