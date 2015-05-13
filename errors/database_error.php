<?php include '../view/header.php'; ?>
<div id="main">
    <h1 class="top">Database Error</h1>
    <p>There was an error connecting to the database.</p>
    <p>The database must be installed as described in appendix A.</p>
    <p>The database must be running as described in chapter 1.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <p>&nbsp;</p>
</div><!-- end main -->
<?php include '../view/footer.php'; ?>