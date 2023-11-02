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

<h1>Users from file</h1>
<div class="container">

</div>
<?php displayUsers();
displayUsersWithLink();
displayUsersWithLinkToForm();

echo '<p>display _user</p>';
display_users($conn);


?>

<!-- <h1>Users from DB</h1>
<?php
// Bang du lieu users
$sql = "SELECT id, firstname, lastname, email FROM Users";
$result = mysqli_query($conn, $sql);
echo "<h1>ToHTML function </h1>";

// arrayToHTMLTable($result);
?> -->

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