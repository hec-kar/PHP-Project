<?php
$GLOBALS['BASE'] = dirname(__DIR__);
include_once $BASE . "/models/User.php";


function displayUsers()
{
  include_once "../controllers/user_controller.php";
  $ds_user = getUsers();
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


function displayUsersWithLink()
{
  include_once "../controllers/user_controller.php";
  $ds_user = getUsers();
  echo '<h1>displayUsersWithLink<h1/>';
  echo '<table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>Username</td>
        <td>Fullname</td>
      </tr>
    </thead>
    <tbody>';
  foreach ($ds_user as $user) {
    echo ' <tr>
     <td><a href="userinfo.php?id=' . $user->user_id . '">' . $user->username . '</a></td>
     <td>' . $user->fullName() . '</td>
   </tr>';
  }
  echo  '
    </tbody>
  </table>';
}

function displayUsersWithLinkToForm()
{
  include_once "../controllers/user_controller.php";
  $ds_user = getUsers();
  echo '<h1>displayUsersWithLinkToForm<h1/>';
  echo '<table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>Username</td>
        <td>Fullname</td>
      </tr>
    </thead>
    <tbody>';
  foreach ($ds_user as $user) {
    echo ' <tr>
     <td><a href="formuserinfo.php?id=' . $user->user_id . '">' . $user->username . '</a></td>
     <td>' . $user->fullName() . '</td>
   </tr>';
  }
  echo  '
    </tbody>
  </table>';
}