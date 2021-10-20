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
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-success">Tambah Kegiatan</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Link</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Periode Registrasi</th>
                <th scope="col">Periode Kegiatan</th>
                <th scope="col">Tipe Pendaftaran</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($events as $event)
              <tr>
                <td>
                  {{ $loop->index+1 }}
                </td>
                <th scope="row">
                  {{ $event->name }}
                </th>
                <td>
                  <a href="{{ route('event.show', ['name' => $event->slug]) }}" target="_blank">
                    Lihat
                  </a>
                </td>
                <td>
                  {{ $event->location }}
                </td>
                <td>
                  {{ $event->start_registration->format('d-m-Y H:i:s') }} s.d<br> {{ $event->end_registration->format('d-m-Y H:i:s') }}
                </td>
                <td>
                  {{ $event->start_event->format('d-m-Y H:i:s') }} s.d<br> {{ $event->end_event->format('d-m-Y H:i:s') }}
                </td>
                <td>
                  {{ $event->getRegistrarTypeText() }}
                </td>
                <td class="table-actions">
                  <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Sunting">
                    <i class="fas fa-user-edit"></i>
                  </a>
                  <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7">Tidak ada kegiatan</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection