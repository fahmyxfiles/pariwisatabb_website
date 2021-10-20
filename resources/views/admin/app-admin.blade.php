<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template</title>
   <!-- Favicon -->
   <link rel="icon" href="{{ asset('assets/img/brand/favicon.png" type="image/png') }}">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css" type="text/css') }}">
   <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css') }}">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0" type="text/css') }}">
 </head>
 
 <body>
   @include('layouts.sidenav')
   <!-- Main content -->
   <div class="main-content" id="panel">
     @include('layouts.topnav')
     <!-- Header -->
     <!-- Header -->
     <div class="header bg-primary pb-6">
       <div class="container-fluid">
         @yield('page_header')
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--6">
        @yield('page_contents')
        @include('layouts.footer')
     </div>
   </div>
   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
   <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
   <!-- Optional JS -->
   <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
   <!-- Argon JS -->
   <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
   <!-- Demo JS - remove this in your project -->
   <script src="{{ asset('assets/js/demo.min.js') }}"></script>
 </body>
 
 </html>