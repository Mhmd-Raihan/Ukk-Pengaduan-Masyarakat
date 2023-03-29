@extends('admin.layouts.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Petugas</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('petugas')}}">Back</a></li>
            <li class="breadcrumb-item active">Petugas</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Petugas</h5>

                <!-- General Form Elements -->
                <form action="{{ route('petugas.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Petuga</label>
                        <div class="col-sm-10">
                          <input value="{{ $data->nama_petugas }}" name="nama_petugas" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input value="{{ $data->username }}" name="username" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomer</label>
                        <div class="col-sm-10">
                          <input value="{{ $data->telp }}" name="telp" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input value="{{ $data->password }}" name="password" type="password" class="form-control">
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
