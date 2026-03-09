<table border="1">

<tr>
<th>Name</th>
<th>Roll</th>
<th>Date</th>
<th>Status</th>
</tr>

@foreach($records as $row)

<tr>
<td>{{ $row->name }}</td>
<td>{{ $row->roll_no }}</td>
<td>{{ $row->date }}</td>
<td>{{ $row->status }}</td>
</tr>

@endforeach

</table>