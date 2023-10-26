<?php
  include_once '../includes/opening.php'; 
  include_once "../includes/functions.php";
?>
<style>
  <?php include '../static/style.css'; ?>
</style>
<?php define("PAGE_TITLE", "User1");?>
<?php // "opening" HTML for the template ?>
<?php //template_header();?>

    <h1>Users</h1>
	<div class="container">
        
	</div>
    <?php   
            displayUsersWithLink();
            displayUsersWithLinkToForm();  
    ?>


<?php // "closing" HTML for the template ?>
<?php //template_footer();?>
<?php include_once "../includes/closing.php"; ?>