<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	
	include '../view/header.php'; 
?>
<div id="main">

    <div id="content">
        <!-- display a table of technicians -->
        <h2>Technician List</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <td><?php echo $technician['firstName']; ?></td>
                <td><?php echo $technician['lastName']; ?></td>
                <td><?php echo $technician['email']; ?></td>
                <td><?php echo $technician['phone']; ?></td>
                <td><?php echo $technician['password']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_technician" />
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>" />
                    <input type="submit" value="Delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Technician</a></p>
    </div>
</div>
<?php include '../view/footer.php'; ?>
