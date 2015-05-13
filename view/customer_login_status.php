<p>You are logged in as <?php echo $_SESSION['tech_support']['customer_email'];?></p>
	<form action="../product_register/index.php" method="post">
	<input type="hidden" name="action" value="logout_customer" />
	<input type="submit" value="Logout" />
</form>