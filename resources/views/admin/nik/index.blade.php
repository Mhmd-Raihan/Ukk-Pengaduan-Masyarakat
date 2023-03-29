@extends('admin.layouts.main')
@section('title', 'Data NIK')

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
        <h1>Data NIK</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Back</a></li>
            <li class="breadcrumb-item active">NIK</li>
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
                  <h5 class="card-title"><a href="{{ route('nik.create') }}" class="btn btn-success">Create</a></span></h5>

                  <table class="table table-borderless ">
                      <thead>
                          <tr>
                              <th scope="col">No</th>
                              <th scope="col">NIK</th>
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas as $item)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nik }}</td>
                        <td>
                            <div class="dropup-center dropup">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Click
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('nik.edit', $item->id) }}"</a>Edit</li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('nik.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
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
