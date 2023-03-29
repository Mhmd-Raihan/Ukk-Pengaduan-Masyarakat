@extends('masyarakat.layouts.main')
@section('title', 'List Pengaduan Saya')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pengaduan Masyarakat</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Back</a></li>
            <li class="breadcrumb-item active">Pengaduan</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

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
                  <h5 class="card-title"> <span> </span></h5>

                  <table class="table table-borderless">
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
                        @foreach ($datas as $item)
                        @if ($item->nik == Auth::user()->nik)
                    <tbody>
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
                                    @if ($item->status == 'selesai' || $item->status == 'proses')
                                    {{--  <li><a class="dropdown-item" href="{{ route('pdf.id', $item->id) }}">Generate pdf</a></li>  --}}
                                    <li><a class="dropdown-item" href="{{ route('pengaduan.byId', $item->id) }}">Show</a></li>
                                    @endif
                                </li>
                                </ul>
                              </div>
                        </td>
                      </tr>
                         @endif
                      @endforeach
                    </tbody>
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
