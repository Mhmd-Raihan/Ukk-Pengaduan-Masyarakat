@extends('admin.layouts.main')
@section('title', 'Data Pengaduan Tanggapan')

@section('content')
<main id="main" class="main">

    @if ($message = Session::get('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
        <h1>Data Pengaduan Masyarakat</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Back</a></li>
            <li class="breadcrumb-item active">Pengaduan</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

{{--  <form action="{{ route('filter') }}" method="GET">
        @csrf
    <div class="row">
      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Start</label>
        <div class="col-sm-10">
          <input type="date" value="start_date" name="start_date" class="form-control">
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">End</label>
        <div class="col-sm-10">
          <input type="date" value="end_date" name="end_start" class="form-control">
        </div>
      </div>
    </div>

      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit Form</button>
        </div>
      </div>

</form>  --}}

<form action="{{ route('pdf') }}" enctype="multipart/form-data">
    @csrf
    <h5 class="card-title"><button type="submit" class="btn btn-danger">PDF</button></span></h5>
</form>

      <section class="section">
        <div class="row">
          <div class="col-12">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  {{--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>  --}}
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"> <span></span></h5>

                  <table class="table table-borderless ">
                      <thead>
                          <tr>
                              <th scope="col">No</th>
                              <th scope="col">Pengaduan</th>
                              <th scope="col">Foto</th>
                              <th scope="col">Tanggal Pengaduan</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas as $item)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->isi_laporan }}</td>
                        @if ($item->foto)
                        <td><img style="width: 50px; height: 50px" src="{{ asset('storage/'. $item->foto) }}" alt=""></td>
                        @endif
                        <td>{{ $item->tgl_pengaduan }}</td>
                        @if ($item->status == 0)
                        <td><span class="badge bg-secondary">Belum di verifikasi</span></td>
                        @endif
                        @if ($item->status == 'proses')
                        <td><span class="badge bg-warning">Proses</span></td>
                        @endif
                        @if ($item->status == 'selesai')
                        <td><span class="badge bg-success">Selesai</span></td>
                        @endif
                        <td>
                            <div class="dropup-center dropstart">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                  Click
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($item->status == 0)
                                    <li>
                                        <form action="{{ route('tanggapan.status', $item->id) }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Verifikasi</button>
                                        </form>
                                    </li>
                                    @endif
                                    @if ($item->status == 'proses')
                                    <li><a class="dropdown-item" href="{{ route('tanggapan.create', $item->id) }}">Tanggapi</a></li>
                                    @endif
                                    @if ($item->status == 'selesai' && Auth::guard('admin')->user()->level == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('pdf.id', $item->id) }}">Generate pdf</a></li>
                                    <li><a class="dropdown-item" href="{{ route('tanggapan.show', $item->id) }}">Show</a></li>
                                    @endif
                                  <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('tanggapan.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </li>
                                </ul>
                              </div>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          <div class="col-lg-6">

          </div>
        </div>
      </section>




  </main><!-- End #main -->
@endsection
