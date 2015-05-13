<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">

    <div id="content">
        <!-- display a table of unassigned incidents -->
        <h2>Unassigned Incidents</h2>
        <p><a href="?action=show_assigned_incidents">View Assigned Incidents</a></p>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Incident</th>
            </tr>
            <?php foreach ($incidents as $incident) : ?>
            <tr>
                <td><?php echo $incident['firstName']; ?>
                	<?php echo $incident['lastName'] ?></td>
                <td><?php echo $incident['name']; ?></td>
                <td>
                	<table id="no_border">
                		<tr>
                			<td>ID:</td>
                			<td><?php echo $incident['incidentID']; ?></td>
                		</tr>
                		<tr>
                			<td>Opened:</td>
							<td><?php $openDate = new DateTime($incident['dateOpened']);
                  					  echo $openDate->format('n/j/Y'); ?></td>
						</tr>
						<tr>
							<td>Title:</td>
							<td><?php echo $incident['title']; ?></td>
						</tr>
						<tr>
							<td>Description:</td>
							<td><?php echo $incident['description']; ?></td>
						</tr>
					</table>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php include '../view/footer.php'; ?>
