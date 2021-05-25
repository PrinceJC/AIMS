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
                </span> ZOOM RESERVATION
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                    <a href="/zooms"  class="btn btn-danger" >BACK</a>
                  <div class="card-body">
                    <h4 class="card-title">ZOOM RESERVATION
                        <div class="form-row">
                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
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
                                      @foreach ($data as $key => $datas )
                                      <tr>

                                          <td>{{ Auth::user()->name }}</td>
                                          <td>{{ $datas->topic }}</td>
                                          <td>{{ $datas->email }}</td>
                                          <td>{{ $datas->date }}</td>
                                          <td>{{ $datas->time_start }}</td>
                                          <td>{{ $datas->time_end }}</td>
                                          <td>{{ $datas->type }}</td>
                                          <td>{{ $datas->platform }}</td>
                                          <td>{{ $datas->setup }}</td>
                                          <td>{{ $datas->remarks }}</td>

                                          <form action="{{route('zooms.destroy',$datas->id)}}" method="post">
                                              <td>
                                              <a href="{{route('zooms.edit', $datas->id) }}"  class="btn btn-info" >EDIT</a>
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
