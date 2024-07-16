<?php
include 'koneksi.php';
session_start(); // Pastikan session_start() sudah dijalankan
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<?php
include 'lib/head.php';
?>

<body>

    <?php
    include 'lib/bar.php';
    ?>

    <main id="main" class="main">

        <div class="pagetitle mb-3">
            <h1>Data Lokasi</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="lokasi_tambah.php" type="button" class="btn btn-primary mt-4 mb-3">Tambah Data</a>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Latitude, Longitude</th>
                                        <th scope="col">Nama Apotek</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Jam Operasional</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM lokasi");
                                    while ($hasil = mysqli_fetch_array($tampil)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no ?></th>
                                            <td><?php echo $hasil['lat_lng'] ?></td>
                                            <td><?php echo $hasil['nama'] ?></td>
                                            <td><?php echo $hasil['kategori'] ?></td>
                                            <td><?php echo $hasil['keterangan'] ?></td>
                                            <td><img src="assets/img/<?php echo $hasil ['gambar']?>"alt="Gambar" width="150px"></td>
                                            <td>
                                                <a href="lokasi_edit.php?id=<?php echo $hasil ['id']?>"
                                                    type="button" class="btn btn-success"><i class='bx bx-edit'></i></a>
                                                <a href="proses_hapus.php ?id=<?php echo $hasil ['id']?>" type="button" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php
    include 'lib/footer.php';
    ?>

</body>

</html>
