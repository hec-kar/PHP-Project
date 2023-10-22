<?php



function updateUserById(): void
{
    $file = "../files/users.csv";
    $dataUsers = array_map('str_getcsv', file($file));
    $userId = $_POST["userId"];
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $passwordInput = $_POST["passwordInput"];
    $passwordCheck = $_POST["passwordCheck"];
    $primaryEmail = $_POST["primaryEmail"];

    $newUserData = array($userId, $username, $firstName, $lastName, $passwordInput, $passwordCheck, $primaryEmail);

    // print_r($userId);
    foreach ($dataUsers as &$row) {
        if ($row[0] == $userId) {
            $row = $newUserData;
            break;
        }
    }

    $fp = fopen($file, 'w');
    foreach ($dataUsers as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);
}
updateUserById();

header("Location: ../users/users.php");
exit();
