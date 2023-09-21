<?php

// A
// Thong ke doanh thu

$DoanhThuArr = [10000000, 12000000, 15000000, 11000000, 16000000, 17000000, 14000000, 11000000, 12500000, 16500000, 13000000, 10000000];

//Doanh thu thap nhat;
function displayArray($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i] . ", ";
    }
}

// tim doanh thu min
function doanhThuMinFunc($arr)
{
    $doanhThuMin = $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        if ($doanhThuMin > $arr[$i]) {
            $doanhThuMin = $arr[$i];
        }
    }
    return $doanhThuMin;
}

function doanhThuMaxFunc($arr)
{
    $doanhThuMax = $arr[0];
    for ($i = 0; $i < count($arr); $i++) {
        if ($doanhThuMax < $arr[$i]) {
            $doanhThuMax = $arr[$i];
        }
    }
    return $doanhThuMax;
}


function getDoanhThuThapNhat($arr)
{
    $arrLength = count($arr);
    $doanhThuMin = doanhThuMinFunc($arr);
    $resultThang = [];
    for ($i = 0; $i < $arrLength; $i++) {
        if ($doanhThuMin == $arr[$i]) {
            array_push($resultThang, $i + 1);
        }
    }

    echo "\nDoanh thu thap nhat: " . $doanhThuMin;
    echo "\nTai thang: ";
    displayArray($resultThang);
}

getDoanhThuThapNhat($DoanhThuArr);


function getDoanhThuCaoNhat($arr)
{
    $arrLength = count($arr);
    $doanhThuMax = doanhThuMaxFunc($arr);
    $result = [];
    for ($i = 0; $i < $arrLength; $i++) {
        if ($doanhThuMax == $arr[$i]) {
            array_push($result, $i + 1);
        }
    }

    echo "\nDoanh thu cao nhat: " . $doanhThuMax;
    echo "\nTai thang: ";
    displayArray($result);
}

getDoanhThuCaoNhat($DoanhThuArr);

function getDoanhThuTrungBinh($arr)
{
    $arrLength = count($arr);
    $sum = 0;
    for ($i = 0; $i < $arrLength; $i++) {
        $sum = $sum + $arr[$i];
    }
    $avg = $sum / $arrLength;
    return floor($avg);
}

echo "\nDoanh thu trung binh: " . getDoanhThuTrungBinh($DoanhThuArr);

// B
$AssociativeArr = array(
    "Jan" => 10000000, "Feb" => 12000000, "Mar" => 15000000, "Apr" => 11000000, "May" => 16000000,
    "Jun" => 17000000, "Jul" => 14000000, "Aug" => 11000000, "Sep" => 12500000, "Oct" => 16500000,
    "Nov" => 13000000, "Dec" => 10000000
);


function tenThangDoanhThuThapNhat($arr)
{
    $doanhThuMin = min($arr);
    $result = [];
    foreach ($arr as $thang => $doanhThu) {
        if ($doanhThu == $doanhThuMin) {
            array_push($result, $thang);
        }
    }
    echo "\nDoanh thu thap nhat: " . $doanhThuMin;
    echo "\nCac thang co doanh thu thap nhat: ";
    displayArray($result);
}


tenThangDoanhThuThapNhat($AssociativeArr);

function tenThangDoanhThuCaoNhat($arr)
{
    $doanhThuMax = max($arr);
    $result = [];
    foreach ($arr as $thang => $doanhThu) {
        if ($doanhThu == $doanhThuMax) {
            array_push($result, $thang);
        }
    }

    echo "\nDoanh thu cao nhat: " . $doanhThuMax;
    echo "\nCac thang co doanh thu Cao nhat: ";
    displayArray($result);
}

tenThangDoanhThuCaoNhat($AssociativeArr);
