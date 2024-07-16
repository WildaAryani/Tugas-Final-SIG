<?php
include 'koneksi.php';
session_start(); // Pastikan session_start() sudah dijalankan
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id = '$id'");
$hasil = mysqli_fetch_array($tampil);

$latlng = $hasil['lat_lng'];
$nama = $hasil['nama'];
$kategori = $hasil['kategori'];
$keterangan = $hasil['keterangan'];
$gambar = $hasil['gambar'];
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
            <h1>Edit Lokasi</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div id="map" style="height: 100vh"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">

                            <!-- Vertical Form -->
                            <form class="row g-3 mt-1" action="proses_edit.php" method="POST" enctype="multipart/form-data">
                                <div class="col-12">
                                <div class="col-12">
                                    <label for="nama" class="form-label"></label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required>
                                </div>
                                    <label for="latlng" class="form-label">Latitude, Longitude</label>
                                    <input type="text" class="form-control" id="latlng" name="latlng" value="<?php echo $latlng; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="nama" class="form-label">Nama Lokasi</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" id="kategori" required>
                                        <option Selected disabled>Pilih Kategori</option>
                                        <option value="Batalaiworu" <?php if ($kategori == "Batalaiworu") echo "selected"; ?>>Batalaiworu</option>
                                        <option value="Katobu" <?php if ($kategori == "Katobu") echo "selected"; ?>>Katobu</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                    <img src="assets/img/<?php echo $gambar; ?>" alt="Gambar" width="150px">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    <a href="lokasi.php" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form><!-- Vertical Form -->

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

<script>
var map = L.map('map').setView([<?php echo explode(',', $latlng)[0]; ?>, <?php echo explode(',', $latlng)[1]; ?>], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);

    var latlng = e.latlng;
    var lat = latlng.lat.toFixed(6);
    var lng = latlng.lng.toFixed(6);
    var latlng_format = lat + ', ' + lng;

    document.getElementById('latlng').value = latlng_format;
}

map.on('click', onMapClick);

var marker = L.marker([<?php echo $latlng?>]).addTo(map);

marker.bindPopup("<b><?php echo $nama?></b><br><?php echo $latlng?><br>Kategori:<?php echo $kategori?><br>Keterangan:<?php echo $keterangan?><br><img src='assets/img/<?php echo $gambar?>' alt='' width='150px'>");

</script>
