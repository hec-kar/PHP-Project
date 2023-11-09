<?php include_once "../includes/opening.php"; ?>
<?php include_once "../includes/functions.php"; ?>
<?php define("PAGE_TITLE", "Add Update User"); ?>
<?php template_header(); ?>

<?php if (isset($_GET['err'])) { ?>
    <script>
        window.alert('Vui long nhap lai tai khoan vi bi trung roi!');
    </script>
<?php } ?>

<?php
// id cua user can hien thi
$id = 0;
if (isset($_GET['update_user_id'])) {
    $id = intval($_GET['update_user_id']);
}

// id != 0, co user nay va load ra form de update thong tin
if ($id != 0) {
    $action = "Update";
    $ds_user = loadUsersByDB($conn);
    foreach ($ds_user as $user) {
        if ($user->user_id == $id) {
            $username = $user->username;
            $firstname = $user->firstname;
            $lastname = $user->lastname;
            $password_input = $user->password_input;
            $password_check = $user->password_check;
            $primary_email = $user->primary_email;
        }
    }
    load_form_user_with_info($id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email, $action);
} else {
    $action = "Add";
    load_form_user_with_info($id, "1", "1", "1", "1", "1", "1", $action);
}

?>

<?php template_footer(); ?>
<?php include_once "../includes/closing.php"; ?>