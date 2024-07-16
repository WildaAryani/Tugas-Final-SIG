<?php
include 'koneksi.php';

// Cek apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['latlng'], $_POST['nama'], $_POST['kategori'], $_POST['keterangan'], $_POST['id'])) {
    $latlng = $_POST['latlng'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $id = $_POST['id'];

    if ($_FILES['gambar']['name'] != "") {
        // Hapus gambar lama jika ada
        $hapus_gambar = mysqli_query($koneksi, "SELECT gambar FROM lokasi WHERE id = '$id'");
        $hasil = mysqli_fetch_array($hapus_gambar);
        if (file_exists("assets/img/".$hasil['gambar'])) {
            unlink("assets/img/".$hasil['gambar']);
        }

        // Upload gambar baru
        $gambar = $_FILES['gambar']['name'];
        $dir = "assets/img/";
        $dirFile = $_FILES['gambar']['tmp_name'];
        if (move_uploaded_file($dirFile, $dir.$gambar)) {
            // Update data dengan gambar baru
            $edit = mysqli_query($koneksi, "UPDATE lokasi SET lat_lng='$latlng', nama='$nama', kategori='$kategori', keterangan='$keterangan', gambar='$gambar' WHERE id = '$id'");
        } else {
            echo "Gagal mengunggah gambar.";
            exit;
        }
    } else {
        // Update data tanpa gambar baru
        $edit = mysqli_query($koneksi, "UPDATE lokasi SET lat_lng='$latlng', nama='$nama', kategori='$kategori', keterangan='$keterangan' WHERE id = '$id'");
    }

    if ($edit) {
        echo "<script>window.location.href='lokasi.php'; alert('Edit data berhasil!');</script>";
    } else {
        echo "Gagal mengupdate data.";
    }
} else {
    echo "Harap isi semua bidang yang diperlukan.";
}
?>
