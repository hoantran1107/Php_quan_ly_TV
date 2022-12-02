<?php
define('SITEURL','http://localhost/thuvien/');
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = new mysqli($hostname, $username, $password, $dbname);
#mysqli_set_charset($conn,'UTF8');
if ($conn->connect_error) {
    echo "Loi ket noi db " . $conn->connect_error;
}
mysqli_set_charset($conn, 'utf8');
?>