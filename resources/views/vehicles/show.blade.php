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
                </span> VEHICLE
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">VEHICLE RESERVATION </h4>

                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label for="recipient-name" class="col-form-label">Name of Driver of Vehicle:</label>
                                <div class="col-md-8">
                                    <strong> {{ Auth::user()->name }}  </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="recipient-name" class="col-form-label">Government Car to be used (Plate no.):</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->vehicle_name}} </strong>
                                </div>
                            </div>
                         </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label for="recipient-name" class="col-form-label">Name of authorized passenger:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->passenger}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Place or places to be visited/inspected:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->destination_route}} </strong>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="recipient-name" class="col-form-label">Purpose of Travel:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->purpose}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Date of Travel</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->date_from}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Time of Departure Office:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->time_from}} </strong>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Time of Departure from location:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->timedeparturelocation}} </strong>
                                </div>
                            </div>


                            <div class="form-groupcol-md-2">
                                <label for="recipient-name" class="col-form-label">Approximate distance travelled</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->approxdistance}} </strong>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Balance in Tank:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->tankbalance }} </strong>
                                </div>
                            </div>


                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Issued by office from stock:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->officestock}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Add-purchased during trip:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->purchased}} </strong>
                                </div>
                            </div>

                             <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">TOTAL:</label>

                                <div class="col-md-8">
                                    <strong> {{$vehicles->total}} </strong>
                                </div>
                            </div>
                             <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Deduct: Used during the trip:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->used}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label"> Balance in tank at the end of trip:</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->balance}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Gear Oil Issued</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->gearoilissued}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">lub Oil Issued</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->luboilissued}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Grease Issued</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->greaseissued}} </strong>
                                </div>

                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Odometer Beginning of Trip</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->odometerbeg}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Odometer End of trip</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->odometerend}} </strong>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="recipient-name" class="col-form-label">Distance travelled</label>

                                <div class="col-md-8">
                                    <strong> {{ $vehicles->distance}} </strong>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Remarks</label>

                             <div class="col-md-8">
                                <strong> {{ $vehicles->remarks}} </strong>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Status</label>

                             <div class="col-md-8">
                                <strong> {{ $vehicles->status}} </strong>
                            </div>
                        </div>



                        </div>
                        <div class="modal-footer">
                            <a href="/vehicles" class="btn btn-danger" >BACK</a>
                            <a href="{{ url('/printvehicle/' .$vehicles->id) }}" class="btn btn-primary" >PRINT</a>


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
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
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
