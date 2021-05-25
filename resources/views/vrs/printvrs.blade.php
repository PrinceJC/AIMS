<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">

          <h4 class="card-title" style="margin-left:30%;">VEHICLE REQUISITION SLIP</h4>

                <div>
                    <label for="recipient-name" style="margin-left:80%;" class="col-form-label">Date:___________ </label>
                    <div class="col-md-8"  style="margin-left:85%; margin-top: -20px;">
                        <strong> {{ $vehicles[0]->date_from}} </strong>
                    </diV>
                </div>

                  <div class="form-group col-md-6 " >
                      <br><br>
                      <label for="recipient-name" class="col-form-label" style="margin-left:2%;">Vehicle :___________________</label>
                      <div class="col-md-8" style="margin-left:20%;margin-top: -20px;">
                          <strong> {{ $vehicles[0]->vehicle_name}} </strong>
                      </div>
                    </div>
                  <div class="form-group col-md-6 " style="margin-top: -20px;">
                      <label for="recipient-name" class="col-form-label" style="margin-left:60%;" >Driver :____________________</label>
                      <div class="col-md-8" style="margin-left:75%;margin-top: -25px;">
                          <strong> {{ $vehicles[0]->driver_name}} </strong>
                      </div>
                  </div>


                      <br>
                    <label for="recipient-name" style="margin-left:2%;" class="col-form-label">Date of Trip from:______________/_______________To: _______________/______________ </label>
                    <label for="recipient-name" class="col-form-label" style="margin-left:23%; margin-top: -30px;" >Date</label>
                    <label for="recipient-name" class="col-form-label" style="margin-left:15%;margin-top: -30px;" >Timeout</label>
                    <label for="recipient-name" class="col-form-label" style="margin-left:10%; margin-top: -25px;" >Date</label>
                    <label for="recipient-name" class="col-form-label" style="margin-left:12%;margin-top: -20px;" >Timein</label>
                    <div class="col-md-8"  style="margin-left:20%;margin-top:-3.5%;">
                        <strong> {{ $vehicles[0]->date_from}} &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;    {{ $vehicles[0]->time_from}} &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp;  {{ $vehicles[0]->date_to}} &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; {{ $vehicles[0]->time_to}} </strong>
            </div>
              <div class="form-row" ><br>
                  <div class="form-group col-md-6">
                      <label for="recipient-name" class="col-form-label" style="margin-left: 2%;">Destination(s): (State Actual Route) &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;   Passenger(s):</label><br><br>
                      <label for="recipient-name" class="col-form-label" style="margin-left: 2%;">Route:  _______________________________ &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; _______________________________  </label><br>
                      <label for="recipient-name" class="col-form-label" style="margin-left: 9%;">_______________________________ &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; _______________________________                          </label><br>
                      <label for="recipient-name" class="col-form-label" style="margin-left: 9%;">_______________________________&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; _______________________________</label><br>
                      <div class="col-md-8" style="margin-left:10%;margin-top:-8%;">
                          <strong> {{ $vehicles[0]->destination_route}} </strong>
                      </div>
                  </div>

                      <div class="col-md-8" style="margin-left:55%;margin-top:-8%;">
                              <strong> {{ $vehicles[0]->passenger}} </strong>
                      </div>

                      <br><br><br><br>
                  <div class="form-group col-md-6">
                      <label for="recipient-name" class="col-form-label"style="margin-left: 2%;">Purpose of Travel:______________________________________________________________</label><br>
                      <div class="col-md-8"style="margin-left:20%;margin-top:-4%;">
                          <strong> {{ $vehicles[0]->purpose}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="recipient-name" class="col-form-label"style="margin-left: 2%;">Charge to:____________________________________________________________________</label><br>
                      <div class="col-md-8"style="margin-left:20%;margin-top:-4%;">
                          <strong> {{ $vehicles[0]->charge_to}} </strong>
                      </div>
                  </div><br>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="col-form-label"style="margin-left: 2%;">=====================================================================</label><br><br><br>
                </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="recipient-name" class="col-form-label"style="margin-left: 2%;">Requested by:_________________________&nbsp;  &nbsp;Recommended by:_________________________</label>
                          <div class="col-md-8"style="margin-left:20%;margin-top:-5.5%;">
                              <strong>  {{ Auth::user()->name }} </strong>
                          </div>
                  </div>
                         <div class="col-md-8"style="margin-left:65%;margin-top:-6.5%;">
                              <strong> {{ $vehicles[0]->recommended_by}} </strong>
                          </div><br>
                          <label for="recipient-name" class="col-form-label"style="margin-left: 20%;">Name & Signature &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Office of the ARD</label>

                        <br><br><br><br>
                  <div class="form-group col-md-4">
                      <label for="recipient-name" class="col-form-label"style="margin-left: 2%;">Noted by :</label><br><br>
                          <div class="col-md-8" style="margin-left:18%;margin-top:-5.5%;">
                              <span>EDUARDO P. TESORERO </strong></span><br>
                              <span>---------------------------------- </span><br>
                              <span>&nbsp;&nbsp;&nbsp;ARD-FASD</span><br>

                          </div>
                    </div>
                    <div class="col-md-8"style="margin-left:55%; margin-top:-18%;">
                        <span>DR. ANTHONY C. SALES CESO III</strong></span><br>
                        <span>---------------------------------------------- </span><br>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regional Director </span>
                  </div>
              </div>



        </div>
      </div>
    </div>
  </div>
