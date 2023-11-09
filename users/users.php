<?php
include_once '../includes/opening.php';
?>
<style>
  <?php include '../static/style.css'; ?>
</style>
<?php define("PAGE_TITLE", "User"); ?>
<?php // "opening" HTML for the template 
?>
<?php template_header(); ?>


<?php
$query_string = "../controllers/user_controller.php?delete_user_id=";
$action = "Delete";
display_users_with_action($conn, $query_string, $action);

$query_string_2 = "update_user.php?update_user_id=";
$action_2 = "Update";
display_users_with_action($conn, $query_string_2, $action_2);
?>

<?php // "closing" HTML for the template 
?>
<?php template_footer(); ?>
<?php include_once "../includes/closing.php"; ?>