<?php
include_once "../includes/opening.php";
?>
<style>
  <?php include '../static/style.css'; ?>
</style>
<?php define("PAGE_TITLE", "User"); ?>
<?php // "opening" HTML for the template 
?>
<?php template_header(); ?>

<h1>Users</h1>
<div class="container">

</div>
<?php displayUsers();
displayUsersWithLinkToForm();
?>


<?php // "closing" HTML for the template 
?>
<?php template_footer(); ?>