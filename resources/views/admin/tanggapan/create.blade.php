@extends('admin.layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tanggapi Pengaduan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('tanggapan')}}">Back</a></li>
            <li class="breadcrumb-item active">Tanggapan</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tanggapan</h5>

                <!-- General Form Elements -->
                <form action="{{ route('tanggapan.store', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input name="tgl_tanggapan" type="datetime-local" class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tanggapan</label>
                    <div class="col-sm-10">
                      <textarea name="tanggapan" class="form-control" style="height: 100px"></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Submit Button</label>
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
