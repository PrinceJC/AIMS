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

                    <h4 class="card-title">FACILITY RESERVATION </h4>
                        @if(count($errors) >0)

                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error )
                                        <li> {{ $error}}</li>
                                    @endforeach
                                </ul>
                             </div>
                        @endif
                        <br><br>
                        <div class="modal-footer">

                        </div>
                        <form action="{{ route('adminzoom.update', $zoom->id) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="modal-body">



                                <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Status</label>
                                        <select  name="remarks" class="form-control">
                                        <option  selected>{{$zoom->remarks}}</option>
                                        @foreach ($remarks as $remark )

                                         <option>{{ $remark->name }}</option>

                                        @endforeach

                                      </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="col-form-label">Platform</label>
                                    <select  name="platform" class="form-control">
                                        <option  selected>Select Platform</option>
                                        @foreach ($platform as $platforms )

                                         <option>{{ $platforms->name }}</option>

                                        @endforeach

                                      </select>

                                  </div>



                            </div>

                            <div class="modal-footer">
                                <a href="/adminzoom"  class="btn btn-danger">BACK</a>
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
