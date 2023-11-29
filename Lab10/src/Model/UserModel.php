<?php

namespace App\Model;

class UserModel
{
    private $mysqli;

    public function __construct()
    {
        // Replace these values with your actual database configuration
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'users_schema';

        $this->mysqli = new \mysqli($host, $username, $password, $database);

        // Check connection
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function getAllUsers()
    {
        $result = $this->mysqli->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($userId)
    {
        $userId = $this->mysqli->real_escape_string($userId);
        $result = $this->mysqli->query("SELECT * FROM users WHERE id = $userId");

        return $result->fetch_assoc();
    }

    public function createUser($username, $password, $email)
    {
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);
        $email = $this->mysqli->real_escape_string($email);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->mysqli->query("INSERT INTO users (username, password_input, email) VALUES ('$username', '$hashedPassword', '$email')");
    }

    public function updateUser($userId, $username, $password, $email)
    {
        $userId = $this->mysqli->real_escape_string($userId);
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);
        $email = $this->mysqli->real_escape_string($email);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->mysqli->query("UPDATE users SET username='$username', password_input='$hashedPassword', email='$email' WHERE id=$userId");
    }

    public function deleteUser($userId)
    {
        $userId = $this->mysqli->real_escape_string($userId);
        $this->mysqli->query("DELETE FROM users WHERE id=$userId");
    }
}
