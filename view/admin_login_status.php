<h2>Login Status</h2>
<p>You are logged in as <?php echo $_SESSION['tech_support']['admin_username'];?></p>
<form action="../admin/index.php" method="post">
	<input type="hidden" name="action" value="logout_administrator" />
	<input type="submit" value="Logout" />
</form>