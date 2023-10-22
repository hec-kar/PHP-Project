<?php
$GLOBALS['BASE'] = dirname(__DIR__);
include $BASE . "/models/User.php";
function loadUsers()
{
  $listUser = [];
  $file = fopen('../files/users.csv', 'r');

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

function displayUsers()
{
  $ds_user = loadUsers();
  echo '<h1>displayUsers<h1/>';
  echo ' <table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>Username</td>
        <td>Fullname</td>
      </tr>
    </thead>
    <tbody>';
  foreach ($ds_user as $user) {
    echo ' <tr>
     <td>' . $user->username . '</td>
     <td>' . $user->fullName() . '</td>
   </tr>';
  }
  echo  '
    </tbody>
  </table>';
}
?>

<?php function displayUsersWithLinkToForm()
{ ?>
  <?php $listUser = loadUsers(); ?>
  <table>
    <tr>
      <th>USERNAME </th>
      <th>FULLNAME </th>
    </tr>
    <?php foreach ($listUser as $user) { ?>
      <tr>
        <td> <a href="../users/formuserinfo.php?id= <?= $user->userId ?>"><?= $user->username ?></a> </td>
        <td> <?= $user->fullName() ?> </td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>

<?php function displayUsersWithLink()
{ ?>
  <?php $listUser = loadUsers(); ?>
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