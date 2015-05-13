<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_tech.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h2>Update Incident</h2>
    <p>This incident was updated.</p>
    <p><a href="?action=show_list_of_incidents">Select Another Incident</a></p>
</div>
<?php include '../view/footer.php'; ?>