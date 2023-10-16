<?php
include "./User.php";

/**
 * 
 * return listUser
 */
function loadUser()
{
    $listUser = [];
    $file = fopen('./files/users.csv', 'r');

    // Bỏ qua hàng đầu tiên (chứa tên trường dữ liệu)
    fgetcsv($file);
    while (($data = fgetcsv($file)) !== false) {
        $userId = $data[0];
        $username = $data[1];
        $firstName = $data[2];
        $lastName = $data[3];
        $passInput = $data[4];
        $passCheck = $data[5];
        $primaryEmail = $data[6];
        array_push($listUser, new User(
            $userId,
            $username,
            $firstName,
            $lastName,
            $passInput,
            $passCheck,
            $primaryEmail
        ));
    }
    fclose($file);
    return $listUser;
}
?>

<?php
function displayUsers()
{ ?>
    <?php $listUser = loadUser(); ?>
    <table>
        <tr>
            <th>USERNAME </th>
            <th>FULLNAME </th>
        </tr>
        <?php foreach ($listUser as $user) { ?>
            <tr>
                <td> <?= $user->username ?> </td>
                <td> <?= $user->fullName() ?> </td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>


<?php function displayUsersWithLink()
{ ?>
    <?php $listUser = loadUser(); ?>
    <table>
        <tr>
            <th>USERNAME </th>
            <th>FULLNAME </th>
        </tr>
        <?php foreach ($listUser as $user) { ?>
            <tr>
                <td> <a href="userinfo.php?id=<?= $user->userId ?>"><?= $user->username ?></a> </td>
                <td> <?= $user->fullName() ?> </td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>