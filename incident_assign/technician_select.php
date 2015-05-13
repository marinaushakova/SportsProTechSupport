<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">

    <div id="content">
        <!-- display a table of technicians -->
        <h2>Select Technician</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Open Incidents</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <td><?php echo $technician['firstName']; ?>
                	<?php echo $technician['lastName'] ?></td>
                <td><?php echo $technician['incidentCount']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_technician" />
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php include '../view/footer.php'; ?>
