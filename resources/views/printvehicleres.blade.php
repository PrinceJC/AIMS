@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <tbody>
                        <tr>
                          @foreach ($veh as $item )
                          <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->driver }}</td>
                            <td>{{ $item->vehiclename }}</td>
                             <td>{{ $item->passenger }}</td>
                             <td>{{ $item->destination }}</td>
                             <td>{{ $item->purpose }}</td>
                             <td>{{ $item->date }}</td>
                             <td>{{ $item->timedepartureoffice }}</td>
                             <td>{{ $item->tankbalance }}</td>
                             <td>{{ $item->odometerbeg }}</td>
                             <td>

                          @endforeach
                        </tr>
                      </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
