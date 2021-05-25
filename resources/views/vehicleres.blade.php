@extends('layouts.app')

@section('content')



    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
        <div class="modal-header">
            <div class="modal-body">
                <div class="form-group">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <label for="recipient-name" class="col-form-label">Driver Name:</label>
                    <input type="text" class="form-control" name="driver" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Vehicle Name:</label>
                    <input type="text" class="form-control" name="vehiclename" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Passenger Name:</label>
                    <input type="text" class="form-control"name="passenger">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Destination:</label>
                    <input type="text" class="form-control" name="destination">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Purpose:</label>
                    <input type="text" class="form-control" name="purpose" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Date of Travel</label>
                    <input type="text" class="form-control"name="date" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Time of Departure Office:</label>
                    <input type="text" class="form-control" name="timedepartureoffice">
                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tank Balance</label>
                    <input type="text" class="form-control"name="tankbalance" >
                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Balance in Tank</label>
                    <input type="text" class="form-control" name="balance">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Odometer Beginning of Trip</label>
                    <input type="text" class="form-control" name="odometerbeg">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Issued by Office from stock</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Purchased During Trip</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Used During the Trip</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Gear Oil Issued</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">lub Oil Issued</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Grease Issued</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Odometer End of trip</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Distance Travelled</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Remarks</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>


          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        </div>

      </div>
    </div>
  </div>
   <!-- END Modal -->
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ADD Vehicle Reservation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ action('VehicleController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Driver Name:</label>
                    <input type="text" class="form-control" name="driver" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Vehicle Name:</label>
                    <input type="text" class="form-control" name="vehiclename" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Passenger Name:</label>
                    <input type="text" class="form-control"name="passenger">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Destination:</label>
                    <input type="text" class="form-control" name="destination">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Purpose:</label>
                    <input type="text" class="form-control" name="purpose" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Date of Travel</label>
                    <input type="text" class="form-control"name="date" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Time of Departure Office:</label>
                    <input type="text" class="form-control" name="timedepartureoffice">
                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tank Balance</label>
                    <input type="text" class="form-control"name="tankbalance" >
                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Balance in Tank</label>
                    <input type="text" class="form-control" name="balance">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Odometer Beginning of Trip</label>
                    <input type="text" class="form-control" name="odometerbeg">
                </div>

            </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </form>

      </div>
    </div>
  </div>
   <!-- END Modal -->

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
                </span> VEHICLE
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">VEHICLE RESERVATION
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
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            ADD
                          </button>
                    </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Driver </th>
                            <th> Vehicle Name </th>
                            <th> Passenger </th>
                            <th> Destination  </th>
                            <th> Purpose </th>
                            <th> Date </th>
                            <th> timedepartureoffice  </th>
                            <th> Balance in tank </th>
                            <th> Odometer Beginning of Trip </th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($veh as $item )
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->driver }}</td>
                              <td>{{ $item->vehiclename }}</td>
                               <td>{{ $item->passenger }}</td>
                               <td>{{ $item->destination }}</td>
                               <td>{{ $item->purpose }}</td>
                               <td>{{ $item->date }}</td>
                               <td>{{ $item->timedepartureoffice }}</td>
                               <td>{{ $item->tankbalance }}</td>
                               <td>{{ $item->odometerbeg }}</td>



                                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">VIEW</button>
                                </td>
                                <td>
                                 <a href="#" class="btn btn-danger"> DELETE </a>
                                </td>

                                </tr>





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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->


@endsection
