<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">



          <h4 class="card-title" style="margin-left:30%; font-size:12px;"> DRIVER'S TRIP TICKET </h4>
              <div class="form-row">
                <strong for="recipient-name"style=" font-size:12px;" class="col-form-label">A. To be filled by the Administrative Official Authorizing Official Travel:
                </strong><br><br>
                  <div class="form-group col-md-6 ">
                      <label for="recipient-name" class="col-form-label"style="margin-left:3%; font-size:11px;">1 .Name of Driver of Vehicle___________________________________________________________</label>
                      <div class="col-md-8" style="margin-left:35%;margin-top:-2.5%;font-size:11px;">
                          <strong> {{ Auth::user()->name }}  </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-6 ">
                      <label for="recipient-name" class="col-form-label"style="margin-left:3%; font-size:11px; ">2. Government Car to be used (Plate no.)_________________________________________________</label>

                      <div class="col-md-8" style="margin-left:40%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->vehicle_name}} </strong>
                      </div>
                  </div>
               </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="recipient-name" class="col-form-label"style="margin-left:3%; font-size:11px;">3. Name of authorized passenger _______________________________________________________
                    </label>

                      <div class="col-md-8"style="margin-left:40%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->passenger}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="recipient-name" class="col-form-label"style="margin-left:3%;font-size:11px;">4. Place or places to be visited/inspected	________________________________________________
                    </label>

                      <div class="col-md-8" style="margin-left:40%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->destination_route}} </strong>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-3" >
                      <label for="recipient-name" class="col-form-label"style="margin-left:3%;font-size:11px; ">5. Purpose of Travel	_________________________________________________________________
                    </label>

                      <div class="col-md-8"style="margin-left:40%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->purpose}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-2">
                      <label for="recipient-name" class="col-form-label"style="margin-left:3%;font-size:11px; ">6. Date of Travel	___________________________________________________________
                        <div class="col-md-8"style="margin-left:40%;margin-top:-2%;font-size:11px;">
                            <strong> {{ $vehicles->date_from}} </strong>
                        </div>
                    </div>

                    </label><br>
                    <span style="font-size:11px; ">Approved by:</span><br>
                    <div class="col-md-8"style="margin-left:55%;  ">
                        <strong style="font-size:11px;">DR. ANTHONY C. SALES CESO III</strong><br>
                        <span style="font-size:11px;">------------------------------------------------</span><br>
                        <span style="font-size:11px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regional Director </span>

                    </div>
                    <br>
                    <strong for="recipient-name" class="col-form-label"style="font-size:12px; ">B.	TO BE FILLED BY THE DRIVER:
                    </strong><br><br>
                  <div class="form-group col-md-2">
                      <label for="recipient-name" class="col-form-label" style="font-size:11px; ">1.Time of departure from office/garrage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________am/pm
                    </label>

                      <div class="col-md-8"style="margin-left:35%;margin-top:-2%; font-size:11px;">
                          <strong> {{ $vehicles->time_from}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-2" style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">2.	Time of arrival at (per No. 4 above)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________am/pm
                    </label>

                      <div class="col-md-8"style="margin-left:35%;margin-top:-1.8%;font-size:11px;">
                          <strong> {{ $vehicles->time_to}} </strong>
                      </div>
                  </div>


                  <div class="form-groupcol-md-2"style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">3.	Time of departure from (per No. 4 above)&nbsp;&nbsp;&nbsp;&nbsp;______________________am/pm
                    </label>

                      <div class="col-md-8"style="margin-left:35%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->timedeparturelocation}} </strong>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-2"style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">4.	Time of arrival  back to office / garrage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________am/pm
                    </label>

                      <div class="col-md-8"style="margin-left:35%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->balance}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-2" style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">5.	Approximate distance travelled (to and from)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________km
                    </label>

                      <div class="col-md-8"style="margin-left:35%;margin-top:-2%;font-size:11px;">
                          <strong> {{ $vehicles->approxdistance}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-2" style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">6.	Gasoline issued, purchase and consumed :
                    </label><br>
                    <label for="recipient-name" class="col-form-label" style="margin-left:5%;font-size:11px;">a.)	Balance in Tank &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________________________________	liters
                    </label><br>
                    <div class="col-md-8"style="margin-left:35%;margin-top:-2%;font-size:11px;">
                        <strong> {{ $vehicles->tankbalance}} </strong>
                    </div>
                    <label for="recipient-name" class="col-form-label"style="margin-left:5%;font-size:11px;">	b.)	Issued by office from stock	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________liters
                    </label><br>
                    <div class="col-md-8"style="margin-left:35%;margin-top:-2%;font-size:11px;">
                        <strong> {{ $vehicles->officestock}} </strong>
                    </div>
                    <label for="recipient-name" class="col-form-label"style="margin-left:5%;font-size:11px;">	c.)	Add-purchased during trip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________liters
                    </label><br>
                    <div class="col-md-8"style="margin-left:35%;margin-top:-2%;font-size:11px;">
                        <strong> {{ $vehicles->purchased}} </strong>
                    </div>
                    <label for="recipient-name" class="col-form-label"style="margin-left:5%;font-size:11px;">	d.)	Deduct: Used during the trip (to and from)&nbsp;&nbsp;__________________liters
                    </label><br>
                    <div class="col-md-8"style="margin-left:38%;margin-top:-7.5;font-size:11px;">
                        <strong> {{ $vehicles->used}} </strong>
                    </div>
                    <label for="recipient-name" class="col-form-label"style="margin-left:5%;font-size:11px;">	e.) Balance in tank at the end of trip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________liters
                    </label><br>
                    <div class="col-md-8"style="margin-left:38%;margin-top:-2%;font-size:11px;font-size:11px;">
                        <strong> {{ $vehicles->balance}} </strong>
                    </div>
                    <label for="recipient-name" class="col-form-label"style="margin-left:35%;font-size:11px;">TOTAL&nbsp;&nbsp;_____________________	liters
                    </label><br>

                    <div class="col-md-8"style="margin-left:45%;margin-top:-2.8%;font-size:11px;">
                        <strong> {{ $vehicles->total}} </strong>
                    </div>



                  <div class="form-group col-md-2"style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">7.	Gear oil issued&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__________________________________________	liters
                    </label>

                      <div class="col-md-8"style="margin-left:30%;margin-top:-2.2%;font-size:11px;">
                        <strong> {{ $vehicles->greaseissued}} </strong>
                      </div>

                  </div>
                  <div class="form-group col-md-2"style="font-size:11px;">
                    <label for="recipient-name" class="col-form-label">	8.	Lub oil issued&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________________________	liters
                  </label>
                  <div class="col-md-8"style="margin-left:30%;margin-top:-2.2%;font-size:11px;">
                    <strong> {{ $vehicles->luboilissued}} </strong>
                  </div>
                  <div class="form-group col-md-2"style="font-size:11px;">
                    <label for="recipient-name" class="col-form-label">	9.	Grease issued&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________________________	liters
                  </label>
                  <div class="col-md-8"style="margin-left:30%;margin-top:-2.2%;font-size:11px;">
                    <strong> {{ $vehicles->greaseissued}} </strong>
                  </div>
              </div>
                  <div class="form-group col-md-2"style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label">10. Odometer readings, if any:</label><br>
                        <label for="recipient-name" class="col-form-label" sytle="margin-left: 30%;font-size:11px;">	At beginning of trip ___________________________________________
                            <div class="col-md-8"style="margin-left:30%;margin-top:-2.2%;font-size:11px;">
                                <strong> {{ $vehicles->odometerbeg}} </strong>
                            </div>
                        </label>


                  </div>
                  <div class="form-group col-md-2"style="font-size:11px;">
                      <label for="recipient-name" class="col-form-label"  sytle="margin-left: 10%;font-size:11px;"> At end of trip	________________________________________________
                    </label>

                      <div class="col-md-8"style="margin-left:30%;margin-top:-2.2%;font-size:11px;">
                          <strong> {{ $vehicles->odometerend}} </strong>
                      </div>
                  </div>
                  <div class="form-group col-md-2"style="font-size:11px;">
                    <label for="recipient-name" class="col-form-label">	Distance travelled ____________________________________________km
                  </label>

                    <div class="col-md-8"style="margin-left:30%;margin-top:-2.4%;font-size:11px;">
                        <strong> {{ $vehicles->distance}} </strong>
                    </div>
                </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-6"style="font-size:11px;">
                  <label for="recipient-name" class="col-form-label">Remarks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________________________________________________________________________
                  </label>

                   <div class="col-md-8"style="margin-left:20%;margin-top:-2.3%;font-size:11px;">
                      <strong> {{ $vehicles->remarks}} </strong>
                  </div>
              </div>
              <br>
              <strong for="recipient-name" class="col-form-label">	I HEREBY CERTIFY that the above statements are true and correct.
            </strong><br><br>
            <div class="form-group col-md-2"style="margin-top:10px;font-size:11px;">
                <div class="col-md-8"style="margin-left:10%;margin-top:-1%;font-size:11px;">
                    <p> {{ $vehicles->date_from}} </p>
                </div>
                <label for="recipient-name" class="col-form-label"style="margin-left:3%; font-size:11px;">_______________________________</label><br>
                <label for="recipient-name" class="col-form-label"style="margin-left:10%; font-size:11px;">DATE</label>
              </div>
              <div class="form-group col-md-6" style="margin-top:-20%;font-size:11px;">
                <div class="col-md-8"style="margin-left:60%;font-size:11px; ">
                    <p> Driver </p>
                </div>
                <label for="recipient-name" class="col-form-label"style="margin-left:50%; font-size:11px; ">_______________________________</label><br>
                <label for="recipient-name" class="col-form-label"style="margin-left:60%;font-size:11px;">Driver's Signature</label>
            </div>
              </div>
              <br>
              <strong for="recipient-name" class="col-form-label" style="font-size:11px;">	I/WE HEREBY CERTIFY that the car was used on official business.
            </strong><br><br>
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label" style="font-size:11px;">Passengers: (Signature over printed name)</label><br>
                <label for="recipient-name" class="col-form-label" style="font-size:11px;">_______________________________ &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; _______________________________  </label><br>
                <label for="recipient-name" class="col-form-label" style="font-size:11px;">_______________________________ &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; _______________________________ </label><br>
                <label for="recipient-name" class="col-form-label" style="font-size:11px;">_______________________________&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; _______________________________</label><br>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
