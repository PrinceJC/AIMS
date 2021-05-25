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
        <div class="container">
            <div class="jumbotron">
                <h2>Vehicle Reservation Calendar</h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th> ID </th>
                        <th> Title</th>
                        <th> Color </th>
                        <th> Start Date  </th>
                        <th> End Date </th>
                        <th> Action</th>

                      </tr>
                    </thead>
                    @foreach ($events as $key => $event )
                    <tbody>
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->color }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>


                                <th>
                                <a href="{{action('CalendarController@edit', $event['id']) }}"  class="btn btn-success" >EDIT</a>
                                </th>


                            </form>





                             @endforeach

                      </tr>
                    </tbody>
                  </table>
                  <a href="/calendar" class="btn btn-danger" >BACK</a>
            </div>
            </div>



</body>
</html>
