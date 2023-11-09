<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "qlns_truong_hoc";      // Khai báo database
$connect = new mysqli($server, $username, $password, $dbname);

if ($connect->connect_errno) {
    echo "Kết nối MYSQL bị lỗi" . $connect->connect_error;
    exit();
}
