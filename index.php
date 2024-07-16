<?php
session_start();
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

        <div class="search-bar mb-3">
            <form class="search-form d-flex align-items-center" method="post" action="#">
                <input type="text" name="keyword" class="form-control" placeholder="Masukkan kata kunci">
                <button type="submit" class="btn btn-primary" title="Search" name="cari">
                    <i class="bi bi-search"></i>
                </button>
                <a href="index.php" class="btn btn-primary">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </form>
        </div><!-- End Search Bar -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map" style="height: 100vh"></div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php
        include 'lib/footer.php';
    ?>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
        }

        map.on('click', onMapClick);

        <?php
        if(isset($_POST['cari'])){
            $keyword = $_POST['keyword'];
            $tampil = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE nama LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR keterangan LIKE '%$keyword%'");
        } else {
            $tampil = mysqli_query($koneksi, "SELECT * FROM lokasi");
        }
        while ($hasil = mysqli_fetch_array($tampil)){
        ?>
        var marker = L.marker([<?php echo $hasil['lat_lng']; ?>]).addTo(map);
        marker.bindPopup("<b><?php echo $hasil['nama']; ?></b><br><?php echo $hasil['lat_lng']; ?><br>Kategori: <?php echo $hasil['kategori']; ?><br>Keterangan: <?php echo $hasil['keterangan']; ?><br><img src='assets/img/<?php echo $hasil['gambar']; ?>' alt='' width='150px'>");
        <?php
        }
        ?>
    </script>
</body>

</html>
