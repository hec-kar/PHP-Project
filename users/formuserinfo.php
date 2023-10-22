<?php
include "../includes/functions.php";
function findUserById($id)
{
    $listUser = loadUsers();
    foreach ($listUser as $user) {
        if ($id == $user->userId) {
            return $user;
        }
    }
    return null;
} ?>


<?php
/**
 * return a html form display a user info
 */
function displayUser()
{
    $user = findUserById($_GET['id']);
    if (!$user) throw new Error("No user exists") ?>

    <form action="../controllers/user_controller.php" method="post">
        <input type="hidden" id="userId" name="userId" value="<?= $user->userId ?>"><br>
        <input type="hidden" id="firstName" name="username" value="<?= $user->username ?>"><br>

        <label>First name:</label><br>
        <input type="text" id="firstName" name="firstName" value="<?= $user->firstName ?>"><br>
        <label>Last name:</label><br>
        <input type="text" id="lastName" name="lastName" value="<?= $user->lastName ?>"><br>
        <label>Password input:</label><br>
        <input type="password" id="passwordInput" name="passwordInput" value="<?= $user->passwordInput ?>"><br>
        <label>Password check:</label><br>
        <input type="password" id="passwordCheck" name="passwordCheck" value="<?= $user->passwordCheck ?>"><br>
        <label>Primary email:</label><br>
        <input type="text" id="primaryEmail" name="primaryEmail" value="<?= $user->primaryEmail ?>"><br>

        <input type="submit" value="Submit">
    </form>

<?php } ?>

<?php displayUser(); ?>