<?php 
	require_once('../util/secure_conn.php');  // require a secure connection

    include '../view/header.php';
?>
<div id="main">
	<div id="content">
		<!-- display a login field -->
		<h2>Admin Login</h2>  
		<form action="." method="post" id="aligned">
	  		 <input type="hidden" name="action" value="login_administrator" />
	  		 <label>Username:</label>
	  		 <input type="text" name="username" />
	  		 <br />
	  		 
	  		 <label>Password:</label>
	  		 <input type="password" name="password" />
	  		 <br />
	  		 
	  		 <label></label>
	   		 <input type="submit" value="Login" />
   		  <br />   
		</form>
	</div>
</div>
<?php include '../view/footer.php'; ?>
