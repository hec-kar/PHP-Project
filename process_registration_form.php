<?php
function checkUsername($username)
{
    $stringLengh = strlen($username);
    for ($i = 0; $i < $stringLengh; $i++) {
        if (ord($username[$i]) == 32 || $username == "") {
            echo "user name co ky tu rong";
            return false;
        }
    }
    return "OK";
}

function checkPassword($password)
{
    if (strlen($password) < 6) {
        return "Password duoi 6 ky tu";
    }

    $kyTuDacBiet = array("#", "@", "~", "^");
    for ($i = 0; $i < strlen($password); $i++) {
        if (in_array($password[$i], $kyTuDacBiet)) {
            // return "OK";
            break;
        }
    }

    for ($i = 0; $i < strlen($password); $i++) {
        if (ord($password[$i]) >= 65 && ord($password[$i]) <= 90) {
            return "OK";
        }
    }

    return false;
}

function hashPassword($password)
{
    $result = [];

    $beginAscii = ord("A"); //Z
    $endAscii = ord("z");
    // echo $endAscii;
    for ($i = 0; $i < strlen($password); $i++) {
        if (ord($password[$i]) <= $endAscii && ord($password[$i]) >= $beginAscii) {
            if (ord($password[$i]) == $endAscii) {
                $password[$i] = chr($beginAscii + 3);
            } else {
                $password[$i] = chr(ord($password[$i]) + 3);
            }
        }
        // echo ($password[$i]);
        // echo chr(ord($password[$i]) + 3);
    }

    return $password;
}

echo hashPassword("abcz");

function handleLogin()
{
    $username = $_POST['email'];
    $password = $_POST['password'];

    if (checkPassword($password) == "OK" && checkUsername($username) == "OK") {
        echo "Dang ky thanh cong!";
    } else {
        echo  "Check usernaem :: " . checkUsername($username) . "<br>" . "check pass: " . checkPassword($password);
    }
}
// handleLogin();
