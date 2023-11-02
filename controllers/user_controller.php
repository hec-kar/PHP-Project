<?php include_once '../includes/opening.php'; ?>
<?php
// Delete
if (array_key_exists('delete_user_id', $_GET)) {
  $user_id   = intval($_GET['delete_user_id']);
  $sql = "delete from users where id = ?";
  $sttm = $conn->prepare($sql);
  $sttm->bind_param('i', $user_id);

  if ($sttm->execute() == true) {
    echo "Delete success!!";
    header("Location: ../users/users.php?action=user-deleted");
    exit();
  } else {
    echo "ERROR DELETE";
  }
}

// UPDATE
if (isset($_POST['user_id'])) {

  $user_id = $_POST["user_id"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $password_input = $_POST["password_input"];
  $password_check = $_POST["password_check"];
  $primary_email = $_POST["primary_email"];


  $sql = "UPDATE users SET firstname = ?, lastname = ?, 
                password_input = ?, password_check = ?, email = ? 
                where id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssi", $firstname, $lastname, $password_input, $password_check, $primary_email, $user_id);

  if ($stmt->execute() === TRUE) {
    echo "Update sucess";
    header("Location: ../users/users.php?action=user-updated");
    exit();
  } else {
    echo "Err update!!";
  }
}
?>