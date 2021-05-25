<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        /* ... */
    </style>
</head>

<body>
<br><br>

                <h2 style="margin-left: 40%;">Vehicle Reservation Calendar</h1>
                    <a style="margin-left: 17%;" href="/vrs" class="btn btn-danger" >BACK</a>
                    <a style="margin-left: ;" href="/userdisplaydata" class="btn btn-warning">Show Events </a>

            <div class="row">


             <br><br><br>

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




</body>
</html>
