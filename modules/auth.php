<?php
session_start();
include __DIR__ . '/../config/db.php';

function login($email, $password)
{
    global $conn;
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['admin_nama'] = $user['nama'];
            return true;
        }
    }
    return false;
}

function cekLogin()
{
    if (!isset($_SESSION['login'])) {
        header("Location: /one-library/authentication/login.php");
        exit();
    }
}
