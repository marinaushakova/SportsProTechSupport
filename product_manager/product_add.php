<?php 
	require_once('../util/secure_conn.php');  // require a secure connection
	require_once('../util/valid_admin.php');  // require a valid admin user
	include '../view/header.php'; 
?>
<div id="main">
    <h1>Add Product</h1>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="add_product" />

        <label>Code:</label>
        <input type="text" name="code" />
        <br />

        <label>Name:</label>
        <input type="text" name="name" />
        <br />

        <label>Version:</label>
        <input type="text" name="version" />
        <br />

        <label>Release Date:</label>
        <input type="text" name="release_date" />&nbsp;<span>Use 'yyyy-mm-dd' format</span>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br />
    </form>
    <p><a href="?action=list_products">View Product List</a></p>
</div>
<?php include '../view/footer.php'; ?>