<?php
$str1 = "14092023";
//exercise1
function convetStringToDateType($stringDate)
{
    if (strlen($stringDate) != 8) {
        return "Bad date input";
    }
    $dd = substr($stringDate, 0, 2);
    $MM = substr($stringDate, 2, 2);
    $YYYY = substr($stringDate, 4, 4);

    echo $dd . "/" . $MM . "/" . $YYYY;
}

echo convetStringToDateType($str1);
echo "\n";


function testDoiXung($stringText)
{
    $stringTextReverse = strrev($stringText);

    if ($stringTextReverse == $stringText) {
        echo "Chuỗi " . $stringText . " là chuỗi đối xứng";
    } else {
        echo "Chuỗi " . $stringText . " là chuỗi không đối xứng";
    }
}


testDoiXung("ABCD");
testDoiXung("ABCD");

echo "\n";


//Exercise 3;

$st3 = 'nguyenthanh@gmail.com';

function displayUserName($stringText)
{
    $providerCharAt = strpos($stringText, "@");
    $provider = substr($stringText, $providerCharAt);
    $username = str_replace($provider, "", $stringText);
    echo $username;
    echo "\n";
    echo $provider;
}

displayUserName($st3);
echo "\n";


/*Khởi tạo chuỗi  st4 = https://w3schools.com/web/learn_php/index.php
Hiển thị thành phần cuối cùng của đường link trên (index.php).
Hiển thị tên file (index) và phần mở rộng (php)*/

$st4 = "https://w3schools.com/web/learn_php/index.php";
function getFileNameAndExtName($stringText)
{
    $stringSplitArray = explode("/", $stringText);
    $lastElementIndex = count($stringSplitArray) - 1;
    $lastElement = $stringSplitArray[$lastElementIndex];

    $lastElementCharAt = strpos($lastElement, ".");
    $extentionName = substr($lastElement, $lastElementCharAt);
    $fileName = str_replace($extentionName, "", $lastElement);

    echo  $fileName;
    echo "\n";
    echo $extentionName;
}


getFileNameAndExtName($st4);
