<?php
include "./User.php";




function loadUsers(): array
{
    $userList = [];
    $row = 1;
    if (($handle = fopen("./files/users.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            array_push($userList, $data);
            $row++;
        }
        fclose($handle);
    }
    return $userList;
}
// print_r($userArrayList);
?>


<?php function displayUsers($userArrayList)
{ ?>
    <table>
        <?php foreach ($userArrayList as $userArray) : ?>
            <tr>
                <td><?= $userArray[0] ?></td>
                <td><?= $userArray[1] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>

<?php function displayUsersWithLink()
{ ?>
    <table>
        <?php foreach ($userArrayList as $userArray) : ?>
            <tr>
                <td><?= $userArray[0] ?></td>
                <td><?= $userArray[1] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>