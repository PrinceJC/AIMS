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

                  <div class="card-body">
                    <h4 class="card-title">VEHICLE RESERVATION
                        <br><br>

                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th> Vehicle Name </th>
                                  <th> Reserved_by </th>
                                  <th> Passenger </th>
                                  <th> Destination  </th>
                                  <th> Purpose </th>
                                  <th> Date From </th>
                                  <th> Date To </th>
                                  <th> Status </th>

                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  @foreach ($vehicles as $key => $vehicle )
                                  <tr>
                                      <td>{{ $vehicle->vehicle_name }}</td>
                                      <td>{{ $vehicle->reserve_name }}</td>
                                      <td>{{ $vehicle->passenger }}</td>
                                      <td>{{ $vehicle->destination_route }}</td>
                                      <td>{{ $vehicle->purpose }}</td>
                                      <td>{{ $vehicle->date_from }}</td>
                                      <td>{{ $vehicle->date_to }}</td>
                                      <td>{{ $vehicle->status }}</td>


                                      <form action="{{route('vehicles.destroy',$vehicle->id)}}" method="post">

                                          <td>
                                          <a href="{{route('vehicles.edit', $vehicle->id) }}"  class="btn btn-info" >EDIT FOR TRIP TICKET</a>

                                          </td>
                                          <td>
                                              <a href="{{route ('vehicles.show', $vehicle->id)}} "  class="btn btn-warning" >SHOW</a>
                                              </td>

                                      </form>
                                       @endforeach

                                </tr>
                              </tbody>
                            </table>

                          </div>
                          <br><br><br>
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
