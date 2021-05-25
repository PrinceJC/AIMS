@extends('layouts.app')

@section('content')
@if(count($errors) >0)

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
            <li> {{ $error}}</li>
        @endforeach
    </ul>
 </div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success">
<p> {{ \Session::get('success') }}</p>
</div>
@endif

<html lang="en">
  <head>
    <!-- Required meta tags -->
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AIMS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico') }}" />
  </head>
  <body>



    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          @include('layouts.sidebar')
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header">
                  <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                      <i class="mdi mdi-home"></i>
                    </span> EQUIPMENT CATEGORY
                  </h3>
                 </div>




                </div>
              </div>
            </div>


          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © DOSTXI 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developer : <a href="https://www.facebook.com/princes.robilla/" target="_blank">Princes Grace Robilla </a> DOSTXI</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/dashboard.js') }}"></script>
    <script src="{{asset('assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
  </body>

@endsection
