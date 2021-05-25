 <table class="table">
    <thead>
         <tr>
            <th> ID </th>
            <th> Facility Name: </th>
            <th> Reserver Name: </th>
            <th> Start Date: </th>
            <th> End Date:   </th>
            <th> Time Start: </th>
            <th> Time End:  </th>
            <th> Status:  </th>


        </tr>
    </thead>
    <tbody>
        <tr>
           @foreach ($facilities as $key => $facility )
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->reserver }}</td>
                <td>{{ $facility->date_start }}</td>
                <td>{{ $facility->date_end }}</td>
                <td>{{ $facility->time_start }}</td>
                <td>{{ $facility->time_end }}</td>
                <td>{{ $facility->status }}</td>
          @endforeach

         </tr>
    </tbody>
</table>
