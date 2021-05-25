<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <style>
        /* ... */
    </style>
</head>

<body>
<br><br>
<div class="row">
    <div class="col-12 grid-margin">
                <h2 style="margin-left: 40%;">Zoom Reservation Calendar</h1>
                    <a style="margin-left: 17%;" class="btn btn-info" href="/zoom" class="btn btn-danger" >BACK</a>
                    <a href="userzoomdisplaydata"class="btn btn-warning"> Show Events </a>

            <div class="row">
                <br>


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
                <div class="col-md-8 col-md-offset-2">
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


</body>
</html>
