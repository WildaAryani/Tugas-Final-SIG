<?php
include 'koneksi.php';
?>

<?php
include 'lib/head.php';
?>

<body>

<main id="main" class="main">

  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="daftar.php" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">S I G</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Buat akun Anda</h5>
                  <p class="text-center small">Buat dengan Username dan password yang aman</p>
                </div>

                <form class="row g-3 needs-validation" action="proses_daftar.php" method="post">

                <div class="col-12">
                    <label for="username" class="form-label">username</label>
                    <input type="text" name="username" class="form-control" id="username"required>
                  </div>

                  <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="Password" required>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Daftar</button>
                  </div>
                  <div class="col-12 text-center">
                    <p class="small mb-0">Sudah punya akun? <a href="login.php">Masuk</a></p>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>

</main><!-- End #main -->

<?php
include 'lib/footer.php';
?>

</body>
</html>
