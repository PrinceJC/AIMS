<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        /* ... */
    </style>
</head>

<body>
    <br><br><br><br>
        <div class="container">
            <div class="jumbotron">
                <h2>Zoom Reservation Calendar</h1>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">

                        <div class="panel-heading" style="background: purple ; color: white;">
                          Add Event to Calendar
                        </div>
                        <div class = "panel-body">
                            Task : Add Data
                        </div>
                            <form action="{{ action('ZoomCalendarController@update', $id) }}" method="POST">
                                {{ csrf_field() }}


                                    <div class="form-row">
                                        <div class="form-group col-md-3 ">
                                            <label for="recipient-name" class="col-form-label">Title:</label>
                                            <input  type="text" class="form-control"name="name" value="{{$events->name}}" >
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="recipient-name" class="col-form-label">Color:</label>
                                            <input  type="color" class="form-control" name="color"value="{{$events->color}}">
                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label for="recipient-name" class="col-form-label">Start Date:</label>
                                            <input type="datetime-local" class="form-control"name="date_start" value="{{$events->date_start}}">
                                        </div>

                                        <div class="form-group col-md-3 ">
                                            <label for="recipient-name" class="col-form-label">End Date:</label>
                                            <input type="datetime-local" class="form-control" name="date_end" value="{{$events->date_end}}">
                                        </div>

                                    </div>
                                    {{ method_field('PUT') }}
                                <div class="modal-footer">
                                    <a href="/zoomcalendar" class="btn btn-danger" >BACK</a>
                                    <button type="submit" class="btn btn-success">SAVE</button>
                                </div>
                            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
