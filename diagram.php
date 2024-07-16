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
            <h1>Diagram</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Diagram Batang</h5>

                            <?php
                            // Ambil jumlah lokasi untuk kategori Katobu
                            $tk = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Katobu'");
                            $jmltk = mysqli_num_rows($tk);

                            // Ambil jumlah lokasi untuk kategori Batalaiworu
                            $sma = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Batalaiworu'");
                            $jmlsma = mysqli_num_rows($sma);

                            // Ambil jumlah lokasi untuk kategori lain (sesuaikan dengan kebutuhan)
                            $smp = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Kategori Lain'");
                            $jmlsmp = mysqli_num_rows($smp);

                            $sd = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Kategori Lain 2'");
                            $jmlsd = mysqli_num_rows($sd);

                            $lainnya = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE kategori = 'Lainnya'");
                            $jmllainnya = mysqli_num_rows($lainnya);
                            ?>

                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: ['Katobu', 'Batalaiworu'],
                                            datasets: [{
                                                label: 'Jumlah Lokasi',
                                                data: [<?php echo $jmltk; ?>, <?php echo $jmlsma; ?>, <?php echo $jmlsmp; ?>, <?php echo $jmlsd; ?>, <?php echo $jmllainnya; ?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 205, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(201, 203, 207, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 159, 64)',
                                                    'rgb(255, 205, 86)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(153, 102, 255)',
                                                    'rgb(201, 203, 207)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- End Bar Chart -->

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

