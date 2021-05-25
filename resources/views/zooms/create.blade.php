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
                </span> ZOOM
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                    <a href="/zoomcalendar"  class="btn btn-primary" >SHOW ZOOM CALENDAR</a>
                     <div class="card-body">
                    <h4 class="card-title">ZOOM RESERVATION
                        <br><br>
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
                                    <div class="form-group col-md-4 ">
                                        <input type="text" class="form-control" name="topic" placeholder="Topic">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <select  name="type" class="form-control" >
                                            <option selected>Schedule a</option>
                                            @foreach ($zoom as $zooms )
                                            <option>{{ $zooms->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <input type="text" class="form-control"name="participants" placeholder="Enter Participants">
                                    </div>


                                 <div class="form-group col-md-4 ">

                                    <input type="date" class="form-control"name="date" placeholder="When">
                                </div>
                                <div class="form-group col-md-4 ">
                                    <input type="time" class="form-control" name="time_start" placeholder="Time Start ">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="time" class="form-control"name="time_end"placeholder="Time End" >
                                </div>
                                <div class="form-group col-md-12 " style="margin-left: 25%;">


                                    <label><input type="checkbox" name="setup[]" value=" Use of Account"> Use of Account </label>
                                    <label><input type="checkbox" name="setup[]" value=" Conference Room"> Conference Room</label>
                                    <label><input type="checkbox" name="setup[]" value="Conference Microphon"> Conference Microphones </label>
                                    <label><input type="checkbox" name="setup[]" value=" Microphoner"> Microphone</label>
                                    <label><input type="checkbox" name="setup[]" value=" Projector"> Projector </label>
                                    <label><input type="checkbox" name="setup[]" value=" Other"> Other </label>

                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="text" class="form-control"name="others" placeholder="Others">
                            </div>

                                <div class="form-group col-md-4">
                                        <input type="hidden" name="reserver" class="form-control" value="{{ Auth::user()->id }}" >
                                </select>
                                </div>
                                <div class="form-group col-md-2 ">

                                    <input  type="hidden" class="form-control"name="remarks" value="Pending" >
                                    <div class="form-group col-md-6">
                                        <input  type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                            </div>

                            </div>

                        <div class="modal-footer">

                          <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </form><br>


                    </div><br>
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
