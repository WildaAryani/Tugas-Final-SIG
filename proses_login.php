<?php


    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username = '$username'");
    $hasil = mysqli_fetch_array($cek);
    if($hasil > 0){
        if(password_verify($password, $hasil['password'])){
            session_start();
            $_SESSION['username'] = $hasil['username'];
            echo"<script>window.location.href='index.php'; alert('Masuk akun berhasil!');</script>"; 
        }else{
            echo"<script>window.location.href='login.php'; alert('Password anda salah!');</script>";
        }

    } echo"<script>window.location.href='login.php'; alert('Username anda salah!');</script>";


?>