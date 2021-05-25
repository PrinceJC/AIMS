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

                    </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>



                            <th> Topic </th>
                            <th> Requester  </th>
                            <th> Email  </th>
                            <th> Date  </th>
                            <th> Time Start </th>
                            <th> Time End  </th>
                            <th> Type  </th>
                            <th> Setup </th>
                            <th> Platform </th>
                            <th> Remarks:  </th>
                            <th> Actions  </th>


                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($zoom as $key => $zooms )
                            <tr>


                                <td>{{ $zooms->topic }}</td>
                                <td>{{ $zooms->name }}</td>
                                <td>{{ $zooms->email }}</td>
                                <td>{{ $zooms->date }}</td>
                                <td>{{ $zooms->time_start }}</td>
                                <td>{{ $zooms->time_start }}</td>
                                <td>{{ $zooms->type }}</td>
                                <td>{{ $zooms->setup }}</td>
                                <td>{{ $zooms->platform }}</td>
                                <td>{{ $zooms->remarks }}</td>

                                <form action="{{route('adminzoom.destroy',$zooms->id)}}" method="post">
                                    <td>
                                    <a href="{{route('adminzoom.edit', $zooms->id) }}"  class="btn btn-info" >EDIT</a>
                                    </td>
                                    <td>
                                        <a href="{{route('adminzoom.show', $zooms->id) }}"  class="btn btn-danger" >ADD TO CALENDAR</a>
                                        </td>



                                </form>






                                 @endforeach


                          </tr>
                        </tbody>
                      </table>

                    </div><br><br>
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
