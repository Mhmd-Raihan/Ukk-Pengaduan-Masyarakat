@extends('masyarakat.layouts.main')
@section('title', 'Pengaduan Ciapus')
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
        <h1>Pengaduan Masyarakat</h1>
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
                <h5 class="card-title">Laporkan Laporan Anda !!!</h5>

                <!-- General Form Elements -->
                <form action="{{ route('pengaduan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        @if (Auth::check())

                        <input readonly value="{{ Auth::user()->nik ?? '' }}" value="{{ old('nik') }}" name="nik" type="text" class="form-control @error('nik') is-invalid @enderror"">
                        @endif

                        @if (Auth::check() == false)
                        <input value="{{ old('nik') }}" name="nik" type="text" class="form-control @error('nik') is-invalid @enderror"">

                        @endif
                    </div>
                  </div>

                  @error('nik')
                  <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                  @enderror

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        @if (Auth::check())

                        <input readonly value="{{ Auth::user()->nama ?? '' }}" value="{{ old('nama') }}" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"">
                        @endif

                        @if (Auth::check() == false)
                        <input value="{{ old('nama') }}" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"">

                        @endif
                    </div>
                  </div>

                  @error('nama')
                  <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                  @enderror

                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input name="tgl_pengaduan" type="datetime-local" value="{{ old('tgl_pengaduan') }}" class="form-control @error('tgl_pengaduan') is-invalid @enderror"">
                    </div>
                  </div>
                  @error('tgl_pengaduan')
                  <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                  @enderror


                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Laporan</label>
                    <div class="col-sm-10">
                      <textarea name="isi_laporan" class="form-control @error('isi_laporan') is-invalid @enderror"" value="{{ old('isi_laporan') }}" style="height: 100px"></textarea>
                    </div>
                  </div>

                  @error('isi_laporan')
                  <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                  @enderror

                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <input name="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror"" type="file" id="formFile">
                    </div>
                  </div>

                  @error('foto')
                  <div class="error text-danger" style="font-size: 13px">{{ $message }}</div>
                  @enderror

                  <div class="row mb-3">
                    {{--  <label class="col-sm-2 col-form-label">Submit Button</label>  --}}
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit Form</button>
                    </div>
                  </div>

                </form><!-- End General Form Elements -->

              </div>
            </div>

          </div>

          <div class="col-lg-6">

          </div>
        </div>
      </section>




  </main><!-- End #main -->
@endsection
