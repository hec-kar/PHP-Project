<?php
$GLOBALS['BASE'] = dirname(__DIR__);
include $BASE . "/models/User.php";
function loadUsers($conn)
{
  $sql = "SELECT * FROM users";
  $listUser = array();
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $user_id = $row["id"];
      $username = $row["username"];
      $firstname = $row["firstname"];
      $lastname = $row["lastname"];
      $password_input = $row["password_input"];
      $password_check = $row["password_check"];
      $primary_email =  $row["email"];

      $newUser = new User($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);

      array_push($listUser, $newUser);
    }
  } else {
    echo "0 results";
    return null;
  }
  return $listUser;
}

function displayUsers($conn)
{
  $ds_user = loadUsers($conn);
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


function displayUsersWithLink($conn)
{
  $ds_user = loadUsers($conn);
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

function displayUsersWithLinkToForm($conn)
{
  $ds_user = loadUsers($conn);
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
?>

<?php
function arrayToHTMLTable($entries)
{
?>
  <p>Table content</p>
  <table class="table-hover table-bordered">
    <thead>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
    </thead>
    <tbody>
      <?php
      while ($entry = mysqli_fetch_array($entries)) {
      ?>
        <tr>
          <td><?php print $entry['id']; ?></td>
          <td><?php print $entry['firstname']; ?></td>
          <td><?php print $entry['lastname']; ?></td>
          <td><?php print $entry['email']; ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}
?>



<?php
// display_user with action
function display_users_with_action($conn, $query_string_action, $action_text)
{
?>
  <p>Table content display_users_wich_action</p>
  <table class="table-hover table-bordered">
    <thead>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      // $result = null;
      if ($result == null) { ?>
        <script>
          window.alert("display_users func get No data");
        </script>
        <?php } else {
        while ($entry = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?php print $entry['id']; ?></td>
            <td><?php print $entry['firstname']; ?></td>
            <td><?php print $entry['lastname']; ?></td>
            <td><?php print $entry['email']; ?></td>
            <td><a href="<?= $query_string_action ?><?= $entry['id'] ?>"> <?= $action_text ?></a></td>
          </tr>
        <?php
        }
        ?>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}
?>


<?php
// display_user 
function display_users($conn)
{
?>
  <p>Table content display_users</p>
  <table class="table-hover table-bordered">
    <thead>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      // $result = null;
      if ($result == null) { ?>
        <script>
          window.alert("display_users func get No data");
        </script>
        <?php } else {
        while ($entry = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><?php print $entry['id']; ?></td>
            <td><?php print $entry['firstname']; ?></td>
            <td><?php print $entry['lastname']; ?></td>
            <td><?php print $entry['email']; ?></td>
          </tr>

        <?php
        }
        ?>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}
?>