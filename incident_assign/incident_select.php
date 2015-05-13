<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">

    <div id="content">
        <!-- display a table of incidents -->
        <h2>Select Incident</h2>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['firstName']; ?>
                	<?php echo $incident['lastName'] ?></td>
                <td><?php echo $incident['productCode']; ?></td>
                <td><?php echo $incident['dateOpened']; ?></td>
                <td><?php echo $incident['title']; ?></td>
                <td><?php echo $incident['description']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_incident" />
                    <input type="hidden" name="incidentID"
                           value="<?php echo $incident['incidentID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php include '../view/footer.php'; ?>
