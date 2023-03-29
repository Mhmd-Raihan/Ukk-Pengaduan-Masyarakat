<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register Masyarakat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>

    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                @if ($message = Session::get('msg'))
                <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if ($message = Session::get('error'))

                <div class="alert alert-danger alert-dismissible fade show col-lg-6" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                   {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/image/logo.png" alt="">
                  <span class="d-none d-lg-block">PengaPus</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Masukkan Data Diri Anda</p>
                  </div>

                  <form class="row g-3 needs-validation" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="yourName" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror""" id="yourName" autofocus>
                        {{--  <div class="invalid-feedback">Please, enter your name!</div>  --}}
                      </div>

                      @error('nik')
                      <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                      @enderror

                    <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror""" id="yourName" >
                      {{--  <div class="invalid-feedback">Please, enter your name!</div>  --}}
                    </div>

                    @error('nama')
                    <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                    @enderror

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Nomor</label>
                      <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror""" id="yourEmail" >
                      {{--  <div class="invalid-feedback">Please enter a valid Email adddress!</div>  --}}
                    </div>

                    @error('telp')
                    <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                    @enderror

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror""" id="yourUsername" >
                        {{--  <div class="invalid-feedback">Please choose a username.</div>  --}}
                      </div>
                    </div>

                    @error('username')
                    <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                    @enderror

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror""" id="yourPassword" >
                      {{--  <div class="invalid-feedback">Please enter your password!</div>  --}}
                    </div>

                    @error('password')
                    <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                    @enderror

                    <div class="col-12">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-12">
                          <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"" value="{{ old('alamat') }}"></textarea>
                        </div>
                      </div>

                      @error('alamat')
                      <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                      @enderror

                      <fieldset class="col-12">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" value="pria" type="radio" name="jk" id="gridRadios1">
                            <label class="form-check-label" for="gridRadios1">
                              Pria
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" value="wanita" type="radio" name="jk" id="gridRadios2">
                            <label class="form-check-label" for="gridRadios2">
                              Wanita
                            </label>
                          </div>
                        </div>
                      </fieldset>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                {{--  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>  --}}
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
