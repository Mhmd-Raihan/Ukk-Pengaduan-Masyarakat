@extends('admin.layouts.main')
@section('title', 'List Pengaduan Masyarakat')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pengaduan Masyarakat</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('tanggapan')}}">Back</a></li>
            <li class="breadcrumb-item active">Pengaduan</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row align-items-top">
          <div class="col-lg-6">

            <!-- Default Card -->
            <div class="card">
              <div class="card-body">
                  @foreach ($datas as $item)
                        <h5 class="card-title">Pengaduan NIK : {{ $item->nik }}</h5>
                        {{ $item->isi_laporan }}
                        <br>
                        Tanggal : {{ $item->tgl_pengaduan }}
                        <br>
                        {{--  By : {{ $item->masyarakat }}  --}}
                    </div>
                </div><!-- End Default Card -->

                <!-- Card with header and footer -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tanggapan</h5>
                        {{ $item->tanggapan->tanggapan }}
                        <br>
                        Tanggal : {{ $item->tanggapan->tgl_tanggapan }}
                        <br>
                        {{--  By : {{ $item->petugas->username }}  --}}
                    </div>
                </div><!-- End Card with header and footer -->

                @endforeach
            {{--  <!-- Card with an image on left -->
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card with an image on left</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                </div>
              </div>
            </div><!-- End Card with an image on left -->  --}}

          </div>

        </div>
      </section>




  </main><!-- End #main -->
@endsection
