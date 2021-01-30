<?php

include 'koneksi.php';

$nama = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')";

if ($koneksi->query($query)) {
    echo "success";
} else {
    echo "error";
}