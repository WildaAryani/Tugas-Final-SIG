<?php
include 'koneksi.php';
if(!isset($_SESSION['username'])){
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
            <h1>Tambah Lokasi</h1>
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
              <form class="row g-3 mt-1" action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="latlng" class="form-label">Latitude, Longitude</label>
                  <input type="text" class="form-control" id="latlng" name="latlng" 
                    placeholder="Klik lokasi pada peta" required>
                </div>
                <div class="col-12">
                  <label for="nama" class="form-label">Nama Apotek</label>
                  <input type="text" class="form-control" id="nama" name="nama" 
                    placeholder="Masukkan nama lokasi" required>
                </div>
                <div class="col-12">
                  <label for="kategori" class="form-label">Kategori</label>
                  <select class="form-select" name="kategori" id="kategori">
                    <option Selected disabled>Pilih Kategori</option>
                    <option value="Batalaiworu">Batalaiworu</option>
                    <option value="Katobu">Katobu</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="keterangan" class="form-label">Jam Operasional</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan" 
                    placeholder="Masukkan Keterangan">
                </div>
                <div class="col-12">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="lokasi.php" type="reset" class="btn btn-secondary">Kembali</a>
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
var map = L.map('map').setView([-4.8316270913500095, 122.72200113803139], 13);

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
    var lng = latlng.lng.toFixed(6);  // Fix here: change latlng.lat to latlng.lng
    var latlng_format = lat + ', ' + lng;

    document.getElementById('latlng').value = latlng_format;
}

map.on('click', onMapClick);

<?php
    $tampil = mysqli_query($koneksi, "SELECT * FROM lokasi");
    while ($hasil = mysqli_fetch_array($tampil)){
?>

var marker = L.marker([<?php echo $hasil['lat_lng']?>]).addTo(map);

marker.bindPopup("<b><?php echo $hasil['nama']?></b><br><?php echo $hasil['lat_lng']?><br>Kategori:<?php echo $hasil['kategori']?><br>Keterangan:<?php echo $hasil['keterangan']?><br><img src='assets/img/<?php echo $hasil['gambar']?>' alt='' width='150px'>");

<?php
    }
?>
</script>
