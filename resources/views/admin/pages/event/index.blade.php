@extends('admin.app')

@section('title') Visit Baubau Admin - Daftar Kegiatan @endsection

@section('page_header')

<!-- Header -->
<div class="header-body">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Daftar Kegiatan</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#">Daftar Kegiatan</a></li>
            </ol>
        </nav>
        </div>
    </div>
</div>


@endsection

@section('page_contents')

<div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Daftar Kegiatan</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Link</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Mulai Registrasi</th>
                <th scope="col">Selesai Registrasi</th>
                <th scope="col">Mulai Kegiatan</th>
                <th scope="col">Selesai Kegiatan</th>
                <th scope="col">Tipe Pendaftaran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  /argon/
                </th>
                <td>
                  4,569
                </td>
                <td>
                  340
                </td>
                <td>
                  <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection