<?php

    include 'koneksi.php';

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $cek = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username = '$username'");
    $hasil = mysqli_fetch_array($cek);
    if($hasil > 0){
        echo"<script>window.location.href='daftar.php'; alert('username sudah digunakan!');</script>";
    }else{
        $daftar = mysqli_query($koneksi, "INSERT INTO user (username, password) VALUES('$username', '$password')");
        echo"<script>window.location.href='login.php'; alert('daftar akun berhasil!');</script>";
    }


?>