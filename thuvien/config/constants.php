<?php
//BAT ĐẦU SESSION
session_start();
//
define('SITEURL','http://localhost/thuvien/');

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "qlthuvien";

//cookies
$cookie_admin='siteAuth';
$cookie_user='siteAuth';

$cookie_time=(3600 * 24); // 1 ngày

$conn = new mysqli($hostname, $username, $password, $dbname);
#mysqli_set_charset($conn,'UTF8');
if ($conn->connect_error) {
    echo "Loi ket noi db " . $conn->connect_error;
}
