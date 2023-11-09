<?php
include_once "includes/opening.php";
?>


<?php define("PAGE_TITLE", "Index Page"); ?>
<?php // "opening" HTML for the template 
?>
<?php template_header(); ?>


<div class="container">
	Here's an index page.
</div>

<a href="./users/update_user.php">Signup!!</a>
<?php // "closing" HTML for the template 
?>
<?php template_footer(); ?>

<?php include_once "includes/closing.php"; ?>