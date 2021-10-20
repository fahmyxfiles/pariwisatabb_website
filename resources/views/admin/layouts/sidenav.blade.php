<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="/admin">
          <img src="{{ asset('img/logo_inversed.png') }}" class="navbar-brand-img" alt="Barakati Baubau Logo" style="max-height: 50px;">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}" href="{{route('admin.index')}}" ><i class="ni ni-shop text-primary"></i><span class="nav-link-text">Utama</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('admin.event.index') ? 'active' : '' }}" href="{{route('admin.event.index')}}"><i class="ni ni-calendar-grid-58 text-orange"></i><span class="nav-link-text">Daftar Kegiatan</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/examples/pricing.html"><i class="ni ni-align-left-2 text-blue"></i><span class="nav-link-text">Daftar Berita</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>