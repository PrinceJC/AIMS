<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">FACILITY RESERVATION
              <div class="form-row">
              <div class="form-group col-md-6 ">
                  <label for="recipient-name" class="col-form-label">Facility Name:</label>
                  <div class="col-md-8">
                      <strong> {{ $facilities->facilityname}} </strong>
                  </div>
              </div>
              <div class="form-group col-md-6 ">
                  <label for="recipient-name" class="col-form-label">Reserver Name:</label>
                  <div class="col-md-8">
                      <strong>{{ Auth::user()->name }} </strong>
                  </div>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-2 ">
                  <label for="recipient-name" class="col-form-label">Start Dat:</label>
                  <div class="col-md-8">
                      <strong> {{ $facilities->date_start}} </strong>
                  </div>
              </div>
              <div  class="form-group col-md-2 ">
                  <label for="recipient-name" class="col-form-label">End Date:</label>
                  <div class="col-md-8">
                      <strong> {{ $facilities->date_end}} </strong>
                  </div>
              </div>
              <div class="form-group col-md-2 ">
                  <label for="recipient-name" class="col-form-label">Start Time:</label>
                  <div class="col-md-8">
                      <strong> {{ $facilities->time_start}} </strong>
                  </div>
              </div>
              <div  class="form-group col-md-2 ">
                  <label for="recipient-name" class="col-form-label">End Time:</label>
                  <div class="col-md-8">
                      <strong> {{ $facilities->time_end}} </strong>
                  </div>
              </div>
              <div class="form-group col-md-2 ">
                  <label for="recipient-name" class="col-form-label">Status:</label>
                  <div class="col-md-8">
                      <strong> {{ $facilities->status}} </strong>
                  </div>
              </div>
          </div>


          </div>
        </div>
      </div>
    </div>
  </div>
