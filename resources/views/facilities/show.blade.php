@extends('layouts.app')

@section('content')


<html lang="en">



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
                    <a href="/facilities"  class="btn btn-danger" >Back</a>
                  <div class="card-body">
                    <h4 class="card-title">FACILITY RESERVATION
                        <div class="form-row">
                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th> ID </th>
                                      <th> Facility Name: </th>
                                      <th> Reserver Name: </th>
                                      <th> Start Date: </th>
                                      <th> End Date:   </th>
                                      <th> Time Start: </th>
                                      <th> Time End:  </th>
                                      <th> Status:  </th>



                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      @foreach ($facility as $key => $facilities )
                                      <tr>
                                          <td>{{ ++$key }}</td>
                                          <td>{{ $facilities->facilityname }}</td>
                                          <td>{{ Auth::user()->name }}</td>
                                          <td>{{ $facilities->date_start }}</td>
                                          <td>{{ $facilities->date_end }}</td>
                                          <td>{{ $facilities->time_start }}</td>
                                          <td>{{ $facilities->time_end }}</td>
                                          <td>{{ $facilities->status }}</td>

                                          <form action="{{route('facilities.destroy',$facilities->id)}}" method="post">
                                              <td>
                                              <a href="{{route('facilities.edit', $facilities->id) }}"  class="btn btn-info" >EDIT</a>
                                              </td>
                                              <td>

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
