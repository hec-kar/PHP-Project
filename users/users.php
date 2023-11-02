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

<h1>display user fromDB</h1>
<?php
// displayUsers();
// displayUsersWithLink();

displayUsersWithLinkToForm($conn);

echo '<p>display _user</p>';
display_users($conn);

?>


<?php
echo '<p>display User with action</p>';

$query_string = "../controllers/user_controller.php?delete_user_id=";
$action_text = "Delete";
display_users_with_action($conn,  $query_string, $action_text);
?>

<?php // "closing" HTML for the template 
?>
<?php template_footer(); ?>
<?php include_once "../includes/closing.php"; ?>