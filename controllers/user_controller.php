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
    echo "ERROR";
  }
}
?>