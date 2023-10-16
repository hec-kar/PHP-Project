<?php
/**
 * 
 */
class User
{
    public $userId;
    public $username;
    public $firstName;
    public $lastName;
    public $passwordInput;
    public $passwordCheck;
    public $primaryEmail;

    // public function __construct()
    // {
    // }
    function __construct($userId, $username, $firstName, $lastName, $passwordInput, $passwordCheck, $primaryEmail)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->passwordInput = $passwordInput;
        $this->passwordCheck = $passwordCheck;
        $this->primaryEmail = $primaryEmail;
    }
    function set_userId($userId)
    {
        $this->userId = $userId;
    }
    function get_userId()
    {
        return $this->userId;
    }
    function set_username($username)
    {
        $this->username = $username;
    }
    function get_username()
    {
        return $this->username;
    }
    function set_firstName($firstName)
    {
        $this->firstName = $firstName;
    }
    function get_firstName()
    {
        return $this->firstName;
    }
    function set_lastName($lastName)
    {
        $this->lastName = $lastName;
    }
    function get_lastName()
    {
        return $this->lastName;
    }
    function set_passwordInput($passwordInput)
    {
        $this->passwordInput = $passwordInput;
    }
    function get_passwordInput()
    {
        return $this->passwordInput;
    }
    function set_passwordCheck($passwordCheck)
    {
        $this->passwordCheck = $passwordCheck;
    }
    function get_passwordCheck()
    {
        return $this->passwordCheck;
    }
    function set_primaryEmail($primaryEmail)
    {
        $this->primaryEmail = $primaryEmail;
    }
    function get_primaryEmail()
    {
        return $this->primaryEmail;
    }

    function fullName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }
}
