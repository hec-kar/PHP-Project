<?php
$GLOBALS['BASE'] = dirname(__DIR__);
include $BASE . "/models/User.php";
function loadUsers()
{
    $ds_user = array();
    $users_file = fopen("../files/users.csv", "r");
    while (!feof($users_file)) {
        $line = fgets($users_file);
        $user_arr = explode(',', $line);
        $user_id = $user_arr[0];
        $username = $user_arr[1];
        $firstname = $user_arr[2];
        $lastname = $user_arr[3];
        $password_input = $user_arr[4];
        $password_check = $user_arr[5];
        $primary_email =  $user_arr[6];
        $user = new User($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);
        array_push($ds_user, $user);
    }
    fclose($users_file);
    return $ds_user;
}

function loadUsersByDB($conn)
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


function displayUsersWithLink()
{
    $ds_user = loadUsers();
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
    $ds_user = loadUsers();
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
function get_row_by_id($db_connection, $table_name, $id)
{

    $sql = "SELECT * FROM $table_name where id = " . intval($id);
    $rs = mysqli_query($db_connection, $sql);

    if (!$rs || mysqli_num_rows($rs) == 0) {
        //print "error" . mysqli_error($db_connection);

    } else {
        $row = mysqli_fetch_array($rs);
        mysqli_free_result($rs);
        return $row;
    }
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
function load_form_user_with_info($id, $username, $first_name, $last_name, $password_input, $password_check, $email, $action)
{
?>
    <?php
    if ($action == "Update") { ?>
        <h1>User update Form</h1>;
        <div class="well">

            <form action="../controllers/user_controller.php?update_user_id=<?php print $id; ?>" method="post" class="form-inline">

                <div>User name:</div>
                <div><input type="text" name="username" id="username" value="<?php print $username; ?>" class="form-control" /></div>

                <div>First Name:</div>
                <div><input type="text" name="firstname" id="firstname" value="<?php print $first_name; ?>" class="form-control" /></div>

                <div>Last Name:</div>
                <div><input type="text" name="lastname" id="lastname" value="<?php print $last_name; ?>" class="form-control" /></div>

                <div>Password Input:</div>
                <div><input type="text" name="password_input" id="password_input" value="<?php print $password_input; ?>" class="form-control" /></div>

                <div>Password Check:</div>
                <div><input type="text" name="password_check" id="password_check" value="<?php print $password_check; ?>" class="form-control" /></div>

                <div>Primary email:</div>
                <div><input type="text" name="primary_email" id="primary_email" value="<?php print $email; ?>" class="form-control" /></div>

                <div style="margin-top:10px;">
                    <input type="hidden" name="UpdateUser" value="1" />
                    <input type="hidden" name="update_user_id" value="<?php print $id; ?>" />
                    <input type="submit" name="btnUpdateUser" value="<?php print $action; ?>" class="btn btn-primary" />
                </div>
            </form>

        </div>
    <?php } ?>

    <?php if ($action == "Add") { ?>
        <h1>User update Form</h1>;
        <div class="well">

            <form action="../controllers/user_controller.php?update_user_id=<?php print $id; ?>" method="post" class="form-inline">

                <div>User name:</div>
                <div><input type="text" name="username" id="username" class="form-control" /></div>

                <div>First Name:</div>
                <div><input type="text" name="firstname" id="firstname" class="form-control" /></div>

                <div>Last Name:</div>
                <div><input type="text" name="lastname" id="lastname" class="form-control" /></div>

                <div>Password Input:</div>
                <div><input type="text" name="password_input" id="password_input" class="form-control" /></div>

                <div>Password Check:</div>
                <div><input type="text" name="password_check" id="password_check" class="form-control" /></div>

                <div>Primary email:</div>
                <div><input type="text" name="primary_email" id="primary_email" class="form-control" /></div>

                <div style="margin-top:10px;">
                    <input type="hidden" name="UpdateUser" value="1" />
                    <input type="hidden" name="update_user_id" />
                    <input type="submit" name="btnUpdateUser" value="<?php print $action; ?>" class="btn btn-primary" />
                </div>
            </form>

        </div>
    <?php } ?>
<?php
}
?>