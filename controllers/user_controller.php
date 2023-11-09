<?php include_once '../includes/opening.php'; ?>
<?php
// Delete
if (array_key_exists('delete_user_id', $_GET)) {
  $user_id   = intval($_GET['delete_user_id']);

  $query = "DELETE FROM Users
                    WHERE id = $user_id
                    LIMIT 1
                ";

  if (mysqli_query($conn, $query)) {
    header("Location: ../users/users.php?action=user-deleted");
    exit();
  } else {
    print("<strong>ERROR: " . mysqli_error($conn) . "</strong><br />");
  }
}

//Add and Update

//UPDATE
if (array_key_exists('update_user_id', $_GET)) {
  $user_id = $_POST["update_user_id"];
  $username = $_POST["username"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $password_input = $_POST["password_input"];
  $password_check = $_POST["password_check"];
  $primary_email = $_POST["primary_email"];

  //update
  if ($_GET["update_user_id"] != 0) {
    $sql = "UPDATE users SET username = ?, firstname = ?, lastname = ?, 
    password_input = ?, password_check = ?, email = ? 
    where id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $username, $firstname, $lastname, $password_input, $password_check, $primary_email, $user_id);

    if ($stmt->execute() === TRUE) {
      echo "Update sucess";
      header("Location: ../users/users.php?action=user-updated");
      exit();
    } else {
      echo "Err update!!";
    }
  }
}

//Neu user name nay bi loi
if (array_key_exists('update_user_id', $_GET)) {
  $user_name = $_POST["username"];
  $query = "SELECT username FROM users WHERE username = $user_name";
  $result = mysqli_query($conn, $query);
  if ($result->current_field == 0) {
    print("Da co tai khoan nay");
    header("Location: ../users/update_user.php?err=create-user-err");
    exit();
  }
}

// create query
if (array_key_exists('update_user_id', $_GET)) {
  $user_id = $_POST["update_user_id"];
  $username = $_POST["username"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $password_input = $_POST["password_input"];
  $password_check = $_POST["password_check"];
  $primary_email = $_POST["primary_email"];

  $query = "INSERT INTO users( username, firstname, lastname, password_input, password_check, email) 
    VALUES($username, $firstname,  $lastname, 
     $password_input,  $password_check, $primary_email)";

  if (mysqli_query($conn, $query)) {
    header("Location: ../users/users.php?action=user-added");
    exit();
  } else {
    print("<strong>ERROR: " . mysqli_error($conn) . "</strong><br />");
  }
}


?>