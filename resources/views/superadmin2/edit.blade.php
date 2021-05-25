@extends('layouts.app')

@section('content')
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
                </span> MANAGE USERS
              </h3>

            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">CREATE NEW USER

                        <form action="{{ route('superadmin2.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="modal-body">
                                <label for="recipient-name" class="col-form-label">Enter Name:</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg">
                                </div>
                                <br><br>
                                <label for="recipient-name" class="col-form-label">Enter Email:</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" value="{{ $data->email }}"class="form-control input-lg">
                                </div>
                                <br><br>
                                <label for="recipient-name" >Upload File:</label>
                                <div class="col-md-8">
                                    <input type="file" name="image"/>
                                    <img src="{{ URL::to('/') }} /images/{{ $data->image }}"
                                    class="img-thumbnail" width="100" />
                                    <input type="hidden" name="hidden_image" value=" {{ $data->image }}" />
                                </div>




                            </div>

                            <div class="modal-footer">
                                <a href="/superadmin2" class="btn btn-danger" >BACK</a>
                                <input type="submit" name="edit" value="Submit" class="btn btn-primary">
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
