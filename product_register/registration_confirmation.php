<?php
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_customer.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h2>Register Product</h2>
    <p>Product (<?php echo $product_code; ?>) was registered successfully.</p>
</div>
<?php include '../view/footer.php'; ?>