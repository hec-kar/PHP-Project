<?php
include_once "../models/User.php";

function getUsers(): array|null
{
    include "../includes/opening.php";
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

function updateUser()
{
    include "../includes/opening.php";

    if (isset($_POST["user_id"])) {

        $user_id = $_POST["user_id"];
        // $username = $_POST["username"];
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
            echo "New record created successfully";
            header("Location: ../users/users.php");
            exit();
        } else {
            echo "Err update";
            header("Location: ../users/formuserinfo.php");
            exit();
        }
    }
}
updateUser();
