<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h2>View/Update Customer</h2>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="update_customer" />

        <label>First Name:</label>
        <input type="text" name="first_name" 
        	   value="<?php echo $first_name; ?>" />
        <br />

        <label>Last Name:</label>
        <input type="text" name="last_name" 
        	   value="<?php echo $last_name; ?>" />
        <br />
        
        <label>Address:</label>
        <input type="text" name="address" id="long"
        	   value="<?php echo $address; ?>" />
        <br />
        
        <label>City:</label>
        <input type="text" name="city" 
        	   value="<?php echo $city; ?>" />
        <br />
        
        <label>State:</label>
        <input type="text" name="state" 
        	   value="<?php echo $state; ?>" />
        <br />
        
        <label>Postal Code:</label>
        <input type="text" name="postal_code" 
        	   value="<?php echo $postal_code; ?>" />
        <br />
        
        <label>Country:</label>
        <select name="country_code">
        <?php foreach ( $countries as $country ) : ?>
            <?php if ($country['countryCode'] == $country_code) { ?>
            	<option value="<?php echo $country['countryCode']; ?>" selected>
                    <?php echo $country['countryName']; ?>
                 </option>
            <?php } else { ?>
                  <option value="<?php echo $country['countryCode']; ?>">
                     <?php echo $country['countryName']; ?>
                   </option>
         <?php } ?>
                <?php endforeach; ?>
        </select>
        <br />
        
        <label>Phone:</label>
        <input type="text" name="phone" 
        	   value="<?php echo $phone; ?>" />
        <br />
       
        <label>Email:</label>
        <input type="text" name="email" id="long"
        	   value="<?php echo $email; ?>" />
        <br />
        
        <label>Password:</label>
        <input type="text" name="password" 
        	   value="<?php echo $password; ?>" />
        <br />
        
        <input type="hidden" name="customerID"
               value="<?php echo $customerID; ?>" />
        
        <label>&nbsp;</label>
        <input type="submit" value="Update Customer" />
        <br />
    </form>
    <p><a href="?action=show_search_form">Search Customers</a></p>
</div>

<?php include '../view/footer.php'; ?>