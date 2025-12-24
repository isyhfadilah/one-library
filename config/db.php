<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "onelib_db";
$port = 8080;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
