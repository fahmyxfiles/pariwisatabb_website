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
    <div class="col-xl-8">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Kunjungan Halaman</h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
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
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Social traffic</h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Referral</th>
                <th scope="col">Visitors</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  Facebook
                </th>
                <td>
                  1,480
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">60%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Facebook
                </th>
                <td>
                  5,480
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">70%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Google
                </th>
                <td>
                  4,807
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">80%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Instagram
                </th>
                <td>
                  3,678
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">75%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  twitter
                </th>
                <td>
                  2,645
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">30%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection