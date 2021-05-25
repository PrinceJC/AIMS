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

                        <form action="{{ route('vehicles.update', $vehicles->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 ">
                                        <label for="recipient-name" class="col-form-label">Name of Driver of Vehicle:</label>
                                        <input disabled type="text" class="form-control" name="driver" value=" {{ Auth::user()->name }} " >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="recipient-name" class="col-form-label">Government Car to be used (Plate no.):</label>
                                            <select  name="vehicle_name" class="form-control" >
                                            <option selected>{{$vehicles->vehicle_name}}</option>
                                            @foreach ($vehicle as $vehs )

                                             <option>{{ $vehs->name }}</option>

                                            @endforeach

                                          </select>
                                      </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Name of authorized passenger:</label>
                                    <input type="text" class="form-control"name="passenger"value="{{$vehicles->passenger}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Place or places to be visited/inspected:</label>
                                    <input type="text" class="form-control" name="destination_route"value="{{$vehicles->destination_route}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="recipient-name" class="col-form-label">Purpose of Travel:</label>
                                    <input type="text" class="form-control" name="purpose" value="{{$vehicles->purpose}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Date of Travel</label>
                                    <input type="date" class="form-control"name="date_from"value="{{$vehicles->date_from}}" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Time of departure from office:</label>
                                    <input type="time" class="form-control" name="time_from"value="{{$vehicles->time_from}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Time of Arrival at location: </label>
                                    <input type="time" class="form-control"name="time_to" value="{{$vehicles->time_to}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Time of departure from location: </label>
                                    <input type="time" class="form-control"name="timedeparturelocation" value="{{$vehicles->timedeparturelocation}}">
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Approximate distance travelled :</label>
                                    <input type="text" class="form-control"  name="approxdistance"  value="{{$vehicles->approxdistance}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Balance in Tank:</label>
                                    <input type="text" id="tankbalance" class="form-control"  name="tankbalance"  value="{{$vehicles->tankbalance}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Issued by office from stock	:</label>
                                    <input type="text"id="officestock" class="form-control"  name="officestock"  value="{{$vehicles->officestock}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Add-purchased during trip:</label>
                                    <input type="text" id="purchased" class="form-control"  name="purchased"  value="{{$vehicles->purchased}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label"> Deduct: Used during the trip :</label>
                                    <input type="text" class="form-control"  name="used"  value="{{$vehicles->used}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label"> Balance in tank at the end of trip:</label>
                                    <input type="text" class="form-control"  name="balance"  value="{{$vehicles->balance}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label"> TOTAL:</label>
                                    <input type="text" id="total" class="form-control"  name="total"  value="{{$vehicles->total}}">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Gear Oil Issued</label>
                                    <input type="text" class="form-control"  name="gearoilissued" value="{{$vehicles->gearoilissued}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">lub Oil Issued</label>
                                    <input type="text" class="form-control"  name="luboilissued" value="{{$vehicles->luboilissued}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Grease Issued</label>
                                    <input type="text" class="form-control" name="greaseissued" value="{{$vehicles->greaseissued}}">

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Odometer Beginning of Trip</label>
                                    <input type="text" id="odometerbeg" class="form-control" name="odometerbeg"value="{{$vehicles->odometerbeg}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="recipient-name" class="col-form-label">Odometer End of trip</label>
                                    <input type="text" class="form-control" id="odometerend" name="odometerend" value="{{$vehicles->odometerend}}">
                                </div>

                                <div class="form-group col-md-6 =">
                                    <label for="recipient-name" class="col-form-label">Remarks</label>
                                     <input type="text" class="form-control"  name="remarks"value="{{$vehicles->remarks}}">
                                </div>
                                <div class="form-group col-md-6 =">
                                    <label for="recipient-name" class="col-form-label">Distance travelled</label>
                                     <input type="text" class="form-control" id="distance" name="distance"value="{{$vehicles->distance}}">
                                </div>
                                <div class="form-group col-md-6 =">
                                    <label for="recipient-name" class="col-form-label">Select Image</label>
                                     <input type="file" class="form-control"  name="files"value="{{$vehicles->files}}">
                                </div>

                            </div>
                                <div class="modal-footer">
                                    <a href="/vehicles" class="btn btn-danger" >BACK</a>
                                    <button type="submit" class="btn btn-primary">SAVE</button>
                                </div>

                    </form>


                    </div>
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
    <script src="{{ asset('assets/js/off-canvas.js ') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
<script>
$(document).ready(function(){
    $("#purchased").keyup(function(){
        totalScores = parseInt($("#purchased").val()) + parseInt($("#tankbalance").val()) +parseInt($("#officestock").val());
        $("#total").val(totalScores);

    });
    $("#odometerend").keyup(function(){
        totalScore = parseInt($("#odometerend").val())  - parseInt($("#odometerbeg").val());
        $("#distance").val(totalScore);
    });

});
</script>
@endsection
