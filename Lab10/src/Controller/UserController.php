<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Fetch all users and display them in a view
        $users = $this->userModel->getAllUsers();
        // include('../templates/layout.php');
        include(__DIR__ . '/../View/users/user-list.php');
    }

    public function show($userId)
    {
        // Fetch a single user by ID and display in a view
        $user = $this->userModel->getUserById($userId);
        //include('../templates/user-form.php');
        include(__DIR__ . '/../View/users/user-form.php');
    }

    public function create()
    {
        // Handle form submission to create a new user
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            // Call the model to create a new user
            $this->userModel->createUser($username, $password, $email);
        }

        // Display the form to create a new user
        //include('../templates/user-form.php');
        include(__DIR__ . '/../View/users/user-form.php');
    }

    public function update($userId)
    {
        // Handle form submission to update a user
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            // Call the model to update the user
            $this->userModel->updateUser($userId, $username, $password, $email);
        }

        // Fetch the user data and display the form to update
        $user = $this->userModel->getUserById($userId);
        //include('../templates/user-form.php');
        include(__DIR__ . '/../View/users/user-form.php');
    }

    public function delete($userId)
    {
        // Call the model to delete the user
        $this->userModel->deleteUser($userId);

        // Redirect to the user list page after deletion
        header('Location: /index.php');
    }
}
