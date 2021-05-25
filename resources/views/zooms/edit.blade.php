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
                </span> FACILITY
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

                        <form action="{{ route('zooms.update', $zoom->id) }}" method="POST"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-row">
                                <div class="form-group col-md-6 ">
                                    <label for="recipient-name" class="col-form-label">Type :</label>
                                        <select  name="type" class="form-control"  >
                                            <option selected>{{$zoom->type}}</option>
                                            @foreach ($zooms as $zoom )
                                            <option>{{ $zoom->name }}</option>

                                            @endforeach

                                        </select>
                                </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">Reserver:</label>
                                        <input type="text" class="form-control"name="reserver" value="{{ Auth::user()->name }}" >
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control"name="email" value="{{$zoom->email}}">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">Date:</label>
                                        <input type="date" class="form-control"name="date" value=" {{ $zoom->date}}">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">Topic:</label>
                                        <input type="text" class="form-control" name="topic" value="{{$zoom->topic}}">
                                    </div>
                                    <div lass="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">Start Time:</label>
                                        <input type="time" class="form-control" name="time_start" value="{{$zoom->time_start}}">
                                    </div>
                                    <div lass="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">End Time:</label>
                                        <input type="time" class="form-control"name="time_end" value="{{$zoom->time_end}}" >
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="recipient-name" class="col-form-label">Setup</label>
                                        <input type="text" class="form-control"name="setup" value=" {{ $zoom->setup}} ">
                                    </div>


                            </div>


                            </div>

                        <div class="modal-footer">
                                 <a href="/zoomcalendar"  class="btn btn-danger">BACK</a>
                                <button type="submit" class="btn btn-primary">SAVE</button>
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

@endsection
