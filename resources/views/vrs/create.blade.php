@extends('layouts.app')

@section('style')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection
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
                    <a href="vrs/show"  class="btn btn-primary" >View My Reservations List</a>
                  <div class="card-body">
                    <h4 class="card-title">VEHICLE REQUISITION
                        <br>
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

                        <form action="{{ action('VrsController@store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Vehicle Name:</label>
                                        <select  name="vehicle_name" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach ($vehicles as $vehs )

                                         <option>{{ $vehs->name }}</option>

                                        @endforeach

                                      </select>
                                  </div>
                                <div class="form-group col-md-6 ">
                                    <div class="form-group col-md-6">
                                        <label for="recipient-name" class="col-form-label">Driver Name:</label>
                                            <select  name="driver" class="form-control">
                                            <option selected>Choose...</option>
                                             @foreach ($veh as $vehs )

                                             <option value="{{ $vehs->id }}">{{ $vehs->name }}</option>

                                           @endforeach
                                          </select>
                                      </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-3">
                                    <label for="recipient-name" class="col-form-label">Date of Trip from: </label>
                                    <input type="date" class="form-control"name="date_from" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="recipient-name" class="col-form-label">Date of Trip to: </label>
                                    <input type="date" class="form-control"name="date_to" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="recipient-name" class="col-form-label">Time of Trip From: </label>
                                    <input type="time" class="form-control"name="time_from" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="recipient-name" class="col-form-label">Time of Trip to: </label>
                                    <input type="time" class="form-control"name="time_to" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Destination Route (For multiple Destination kindly separate with comma (,) ): </label>
                                    <input type="text" class="form-control" name="destination_route">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Passenger Name  (For multiple Passengers kindly separate with comma (,) ):</label>
                                    <input type="text" class="form-control"name="passenger">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Purpose of Travel:</label>
                                    <input type="text" class="form-control" name="purpose" >
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Charge to:</label>
                                            <select  name="charge_to" class="form-control">
                                            <option selected>Choose...</option>
                                             @foreach ($charge as $charges )

                                             <option>{{ $charges->name }}</option>

                                           @endforeach
                                          </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 ">

                                      <input type="hidden" class="form-control" name="recommended_by"  value="{{ $head[0]->name }}">
                                </div>
                                <div class="form-group col-md-4 ">

                                    <input type="hidden" class="form-control"name="status" value="pending" >
                                </div>
                                <div class="form-group col-md-4 ">
                                    <input type="hidden" class="form-control" name="reserved_by" value="{{ Auth::user()->id }}">

                                </div>
                            </div>



                            </div>

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                    </form>

                        <div class="panel panel-default">
                            <div class="panel-heading" style="background: purple ; color: white;">
                               Reservations Schedule [Full - Calendar]
                            </div>
                            <div class = "panel-body">
                                {!! $calendar->calendar() !!}
                                {!! $calendar->script() !!}
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
    @endsection
    @section('script')

    @endsection


