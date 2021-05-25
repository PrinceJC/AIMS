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
                </span> ZOOM
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">

                  <div class="card-body">
                    <h4 class="card-title">ZOOM RESERVATION
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
                        <form action="{{ action('ZoomController@store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 ">
                                        <input type="text" class="form-control" name="topic" placeholder="Topic">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select  name="type" class="form-control" >
                                            <option selected>Choose a type</option>
                                            @foreach ($zoom as $zooms )
                                            <option>{{ $zooms->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 ">

                                        <select  name="setup" class="form-control">
                                            <option selected>Select Setup...</option>
                                            @foreach ($setup as $setups )
                                            <option>{{ $setups->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                <div class="form-group col-md-6">

                                    <input  type="email" class="form-control" name="email"placeholder="Enter email">
                                </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">

                                    <input type="text" class="form-control"name="participants" placeholder="Enter Participants">
                                </div>
                                 <div class="form-group col-md-2 ">

                                    <input type="date" class="form-control"name="date" placeholder="When">
                                </div>
                                <div class="form-group col-md-2 ">
                                    <input type="time" class="form-control" name="time_start" placeholder="Time Start ">
                                </div>
                                <div class="form-group col-md-2 ">

                                    <input type="time" class="form-control"name="time_end"placeholder="Time End" >
                                </div>
                                <div class="form-group col-md-2">


                                        <input type="hidden" name="reserver" class="form-control" value="{{ Auth::user()->id }}" >

                                  </select>
                                </div>
                                <div class="form-group col-md-2 ">

                                    <input  type="hidden" class="form-control"name="remarks" value="Pending" >
                                </div>
                            </div>

                            </div>

                        <div class="modal-footer">

                          <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </form>


                    </div>
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

                                  <form action="{{route('zoom.destroy',$datas->id)}}" method="post">
                                      <td>
                                      <a href="{{route('zoom.edit', $datas->id) }}"  class="btn btn-info" >EDIT</a>
                                      </td>
                                      <td>
                                          <a href="{{route ('zoom.show', $datas->id)}} "  class="btn btn-warning" >SHOW</a>
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
