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
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $user->name}}</th>
                            <th>{{ $user->email}}</th>
                            <th>{{ implode(',', $user->roles()->get()->pluck('name')->toArray())}}</th>
                            <th>
                                <a href="{{ route('superadmin.users.edit',$user->id ) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                </a>
                                <form action="{{ route('superadmin.users.destroy', $user->id)}}" method="POST" class="float-left">
                                    @csrf
                                    {{ @method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </th>

                        </tr>
                        @endforeach
                </tbody>
              </table>
              {{$users->links()}}
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © DOSTXI 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developer : <a href="https://www.facebook.com/princes.robilla/" target="_blank">Princes Grace Robilla </a> DOSTXI</span>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->

@endsection
