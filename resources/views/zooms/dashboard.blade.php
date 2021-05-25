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
                </span> FACILITY
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Zoom RESERVATION
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
                        <div class="float-right">
                            <a href="{{ route('zoom.create') }}" class="btn btn-lg btn-success" >Add Zoom Reservation</a>
                        </div>

                    </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Requester </th>
                            <th> Topic </th>
                            <th> Email  </th>
                            <th> Date  </th>
                            <th> Time Start </th>
                            <th> Time End  </th>
                            <th> Type  </th>
                            <th> Platform  </th>
                            <th> Setup </th>
                            <th> Remarks:  </th>



                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($zoom as $key => $zooms )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ $zooms->topic }}</td>
                                <td>{{ $zooms->email }}</td>
                                <td>{{ $zooms->date }}</td>
                                <td>{{ $zooms->time_start }}</td>
                                <td>{{ $zooms->time_end }}</td>
                                <td>{{ $zooms->type }}</td>
                                <td>{{ $zooms->platform }}</td>
                                <td>{{ $zooms->setup }}</td>
                                <td>{{ $zooms->remarks }}</td>

                                <form action="{{route('zoom.destroy',$zooms->id)}}" method="post">
                                    <td>
                                    <a href="{{route('zoom.edit', $zooms->id) }}"  class="btn btn-info" >EDIT</a>
                                    </td>
                                    <td>
                                        <a href="{{route ('zoom.show', $zooms->id)}} "  class="btn btn-warning" >SHOW</a>
                                        </td>

                                </form>






                                 @endforeach

                          </tr>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>


          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 AIMS. All Rights Reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">DOST XI | <a href="https://www.facebook.com/princes.robilla/" target="_blank"> Developed by  </a> ICT SECTION</span>
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
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->


@endsection
