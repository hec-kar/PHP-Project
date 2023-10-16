<?php
include "./functions.php";
/**
 * @{params}: id (int)
 * return user
 */
function findUserById($id)
{
    $listUser = loadUser();
    foreach ($listUser as $user) {
        if ($id == $user->userId) {
            return $user;
        }
    }
    return null;
} ?>


<?php
/**
 * return a html table display a user info
 */
function displayUser()
{
    $user = findUserById($_GET['id']);
    if (!$user) throw new Error("No user exists") ?>

    <form>
        <label>User id :: <?= $user->userId ?> </label> <br>
        <label>user naem:: <?= $user->username ?> </label> <br>
        <label>firstName :: <?= $user->firstName ?> </label> <br>
        <label> lastName:: <?= $user->lastName ?> </label> <br>
        <label>Passinput:: <?= $user->passwordInput ?> </label> <br>
        <label>Pass CHECK:: <?= $user->passwordCheck ?> </label> <br>
        <label>Primary email:: <?= $user->primaryEmail ?> </label>
    </form>
<?php } ?>

<?php displayUser(); ?>