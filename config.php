<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

// sesuaikan dengan server anda
$host = 'localhost'; // host server
$user = 'root'; // username server
$pass = ''; // password server, kalau pakai xampp kosongin saja
$dbname = 'nizar_props'; // nama database anda


$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
	die('Koneksi gagal fuck' . mysqli_connect_error());
}

define('BASE_PATH', dirname(__FILE__));

?>