@extends('masyarakat.layouts.main')
@section('title', 'Landing Page')
@section('content')


<main id="main" class="main">

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

    <div class="pagetitle">
        <h1>Panduan Laporan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Pengaduan</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Petunjuk Laporan Pengaduan Ciapus</h5>

                  <!-- Default Accordion -->
                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Buat Laporan #1
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>Anda harus melakukan registrasi terlebih dahulu untuk dapat melakukan pengaduan.</strong>
                          <br>
                          1.Daftar terbelih dahulu dengan mengisi data diri anda <strong> Pastikan Isi NIK Dengan Benar</strong>
                          <br>
                          2.Jika sudah berhasil daftar maka anda bisa login ke halaman pengaduan
                          <br>
                          3.Silahkan laporkan pengaduan anda kepada kami
                          <br>
                          4.Anda bisa melakukan pengaduan ketika belum login dengan syarat pernah melakukan registrasi terlebih dahulu
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Tunggu Di Proses #2
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Tunggu hingga pihak dari kami melakukan verifikasi terhadap data pengaduan.</strong>
                            <br>
                            Jika laporan anda sesuai akan kami lakukan proses lebih lanjut dan tunggu sampai ditanggapi oleh pihak kami
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Selesai #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Anda bisa melihat data pengaduan yang telah di tanggapi oleh pihak kami</strong>
                            <br>
                            {{--  Anda bisa melihat data pengaduan yang telah di tanggapi  --}}
                        </div>
                      </div>
                    </div>
                  </div><!-- End Default Accordion Example -->

                </div>
              </div>

          </div>

          <div class="col-lg-6">

          </div>
        </div>
      </section>




  </main><!-- End #main -->

@endsection
