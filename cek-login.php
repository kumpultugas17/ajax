<?php 
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($num_row > 1) {
    echo "success";
    $_SESSION['id_user'] = $row['id'];
    $_SESSION['nama_lengkap'] = $row['nama'];
    $_SESSION['username'] = $row['username'];  
} else {
    echo "error";
}
?>