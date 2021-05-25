@extends('layouts.app')

@section('content')





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
                    <h4 class="card-title">SUPER ADMIN
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


                    </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> IMAGE </th>
                            <th> NAME </th>
                            <th> EMAIL </th>
                            <th> ACTION </th>


                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($data as $row )
                            <tr>
                                <td><img src="{{ URL::to('/') }}/ images/ {{ $row->image }}" clasee="img-thumbnail" width="75" ></td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $vehicle->email }}</td>


                             @endforeach

                          </tr>
                        </tbody>
                      </table>

                     {!! $data->links() !!}
                    </div>
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


@endsection
