<p>You are logged in as <?php echo $_SESSION['tech_support']['tech_email'];?></p>
	<form action="../incident_update/index.php" method="post">
	<input type="hidden" name="action" value="logout_technician" />
	<input type="submit" value="Logout" />
</form>