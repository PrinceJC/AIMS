@extends('layouts.app')

@section('content')
@if($errors->any())

    <div class="alert alert-danger">
        <strong>Sorry Check back your input! </strong> your process failed please try again! <br><br><br>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif


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
                    <h4 class="card-title">VEHICLE REQUISITION
                        @if(count($errors) >0)

                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error )
                                        <li> {{ $error}}</li>
                                    @endforeach
                                </ul>
                             </div>
                        @endif

                        <form action="{{ route('vrs.update', $vehicles->id) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Vehicle Name:</label>
                                    <select  name="vehicle_name" class="form-control">
                                        <option selected>{{$vehicle[0]->vehicle_name}}</option>
                                        @foreach ($vehic as $vehs )
                                        <option value="{{ $vehs->id }}">{{ $vehs->name }}</option>

                                      @endforeach
                                      </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Driver Name:</label>
                                    <select  name="driver" class="form-control">
                                        <option selected>{{$vehicle[0]->driver_name}}</option>
                                    @foreach ($veh as $vehs )
                                     <option value="{{ $vehs->id }}">{{ $vehs->name }}</option>

                                   @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3 ">
                                    <label for="recipient-name" class="col-form-label">Date of Trip from: </label>
                                    <input type="date" class="form-control"name="date_from"value="{{$vehicles->date_from}}" >
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="recipient-name" class="col-form-label">Date of Trip to: </label>
                                    <input type="date" class="form-control"name="date_to" value="{{$vehicles->date_to}}">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="recipient-name" class="col-form-label">Time of Trip From: </label>
                                    <input type="time" class="form-control"name="time_from" value="{{$vehicles->time_from}}">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="recipient-name" class="col-form-label">Time of Trip to: </label>
                                    <input type="time" class="form-control"name="time_to" value="{{$vehicles->time_to}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Destination Route:</label>
                                    <input type="text" class="form-control" name="destination_route" value="{{$vehicles->destination_route}}">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Passenger Name:</label>
                                    <input type="text" class="form-control"name="passenger"value="{{$vehicles->passenger}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Purpose of Travel:</label>
                                    <input type="text" class="form-control" name="purpose" value="{{$vehicles->purpose}}">
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Charge to:</label>
                                    <input type="text" class="form-control" name="charge_to"value="{{$vehicles->charge_to}}">
                                </div>
                            </div>
                            <div class="form-row">

                            </div>

                            <div class="modal-footer">
                                <a href="/vrs/show" class="btn btn-danger" >BACK</a>
                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>

                        </div>
                    </form>
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
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->

@endsection
