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
                <th scope="col">Page name</th>
                <th scope="col">Visitors</th>
                <th scope="col">Unique users</th>
                <th scope="col">Bounce rate</th>
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
              <tr>
                <th scope="row">
                  /argon/index.html
                </th>
                <td>
                  3,985
                </td>
                <td>
                  319
                </td>
                <td>
                  <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                </td>
              </tr>
              <tr>
                <th scope="row">
                  /argon/charts.html
                </th>
                <td>
                  3,513
                </td>
                <td>
                  294
                </td>
                <td>
                  <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                </td>
              </tr>
              <tr>
                <th scope="row">
                  /argon/tables.html
                </th>
                <td>
                  2,050
                </td>
                <td>
                  147
                </td>
                <td>
                  <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                </td>
              </tr>
              <tr>
                <th scope="row">
                  /argon/profile.html
                </th>
                <td>
                  1,795
                </td>
                <td>
                  190
                </td>
                <td>
                  <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection