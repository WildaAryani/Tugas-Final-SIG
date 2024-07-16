<?php
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['latlng'], $_POST['nama'], $_POST['kategori'], $_POST['keterangan'], $_FILES['gambar']['name'])) {
    $latlng = $_POST['latlng'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];

    // Inisialisasi nama gambar dengan string kosong
    $gambar = "";

    // Periksa apakah ada file gambar yang diunggah
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $dir = "assets/img/";
        $dirFile = $_FILES['gambar']['tmp_name'];

        // Pindahkan file gambar yang diunggah ke direktori tujuan
        if (move_uploaded_file($dirFile, $dir . $gambar)) {
            // Jika file gambar berhasil dipindahkan, tambahkan data ke database
            $tambah = mysqli_query($koneksi, "INSERT INTO lokasi (lat_lng, nama, kategori, keterangan, gambar) VALUES ('$latlng', '$nama', '$kategori', '$keterangan', '$gambar')");
            if ($tambah) {
                echo "<script>window.location.href='lokasi.php'; alert('Tambah data berhasil!');</script>";
            } else {
                echo "<script>alert('Gagal menambah data ke database: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah gambar');</script>";
        }
    } else {
        // Jika tidak ada file gambar yang diunggah, tambahkan data tanpa gambar
        $tambah = mysqli_query($koneksi, "INSERT INTO lokasi (lat_lng, nama, kategori, keterangan) VALUES ('$latlng', '$nama', '$kategori', '$keterangan')");
        if ($tambah) {
            echo "<script>window.location.href='lokasi.php'; alert('Tambah data berhasil!');</script>";
        } else {
            echo "<script>alert('Gagal menambah data ke database: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
        }
    }
}
?>
