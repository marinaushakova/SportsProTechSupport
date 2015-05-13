<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>

<div id="main">
    <h1>Add Technician</h1>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="add_technician" />

        <label>First Name:</label>
        <input type="text" name="first_name" />
        <br />

        <label>Last Name:</label>
        <input type="text" name="last_name" />
        <br />

        <label>Email:</label>
        <input type="text" name="email" />
        <br />

        <label>Phone:</label>
        <input type="text" name="phone" />
        <br />
        
        <label>Password:</label>
        <input type="text" name="password" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Technician" />
        <br />
    </form>
    <p><a href="?action=list_technicians">View Technician List</a></p>
</div>

<?php include '../view/footer.php'; ?>