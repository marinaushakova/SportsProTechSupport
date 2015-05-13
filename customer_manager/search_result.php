<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">

    <div id="content">
        <!-- display a search field -->
		<h2>Customer Search</h2>  
		<form action="." method="post">
 		   <input type="hidden" name="action" value="search_customer" />
 		   <label>Last Name:</label>
  		   <input type="text" name="last_name" value="<?php echo $last_name; ?>"/>
  		   <input type="submit" value="Search" />
  		   <br />   
		</form>

	<!-- display a table of customers -->
	<h2>Results</h2>
		<table>
			<tr>
				<th>Name</th>
				<th>Email Address</th>
				<th>City</th>
				<th>&nbsp;</th>
			</tr>
		<?php foreach ($customers as $customer) : ?>
          	<tr>
                <td><?php echo $customer['firstName']; ?>
                	<?php echo $customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_customer" />
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>" />
                    <input type="hidden" name="firstName"
                           value="<?php echo $customer['firstName']; ?>" />
                    <input type="hidden" name="lastName"
                           value="<?php echo $customer['lastName']; ?>" />
                    <input type="hidden" name="address"
                           value="<?php echo $customer['address']; ?>" />
                    <input type="hidden" name="city"
                           value="<?php echo $customer['city']; ?>" />
                    <input type="hidden" name="state"
                           value="<?php echo $customer['state']; ?>" />
                    <input type="hidden" name="postalCode"
                           value="<?php echo $customer['postalCode']; ?>" />
                    <input type="hidden" name="countryCode"
                           value="<?php echo $customer['countryCode']; ?>" />
                    <input type="hidden" name="phone"
                           value="<?php echo $customer['phone']; ?>" />
                    <input type="hidden" name="email"
                           value="<?php echo $customer['email']; ?>" />
                    <input type="hidden" name="password"
                           value="<?php echo $customer['password']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
	</div>
</div>

<?php include '../view/footer.php'; ?>