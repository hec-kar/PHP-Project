<?php
include "./layout.php";
define("PAGE_TITLE", "form");
template_header();


$DoanhThuInfos = array(
    "Jan" => 10000000, "Feb" => 12000000, "Mar" => 15000000, "Apr" => 11000000, "May" => 16000000,
    "Jun" => 17000000, "Jul" => 14000000, "Aug" => 11000000, "Sep" => 12500000, "Oct" => 16500000,
    "Nov" => 13000000, "Dec" => 10000000
);

function getDoanhThu($MonthValue, $arr)
{

    foreach ($arr as $key => $value) {
        if ($MonthValue == $key) {
            echo "Doanh thu thang " . $key . " la ";
            echo $value . "\n";
        }
    }
}


function doanhThuCaoNhat($arr)
{
    $doanhThuMax = max($arr);
    return "\nDoanh thu cao nhat la: " . $doanhThuMax;
}

function doanhThuThapNhat($arr)
{
    $doanhThuMin = min($arr);
    return "\nDoanh thu thap nhat la: " . $doanhThuMin;
}


function handleThongKe($ThongKeMode, $arr)
{

    if ($ThongKeMode == 'doanhThuMax')
        return doanhThuCaoNhat($arr);
    else if ($ThongKeMode == 'doanhThuMin') {
        return doanhThuThapNhat($arr);
    } else {
        return;
    }
}


echo handleThongKe($_POST['thongKe'], $DoanhThuInfos);



template_footer();
