@extends('layouts.app')

@section('content')

<h2>Attendance Report</h2>

<div class="card3d mb-4">

<form method="GET" action="/attendance-report">

<div class="row">

<div class="col-md-4">

<label>Date</label>

<input type="date" name="date" class="form-control">

</div>

<div class="col-md-4">

<label>Class</label>

<select name="class_id" class="form-control">

<option value="">All Classes</option>

@foreach($classes as $class)

<option value="{{ $class->id }}">
{{ $class->class_name }}
</option>

@endforeach

</select>

</div>

<div class="col-md-4 d-flex align-items-end">

<button class="btn btn-primary me-2">
Filter
</button>

<button onclick="window.print()" type="button"
class="btn btn-success">
Print
</button>

</div>

</div>

</form>

</div>


<div class="card3d">

<div class="table-responsive">

<table class="table table-dark">

<tr>
<th>Roll</th>
<th>Name</th>
<th>Class</th>
<th>Date</th>
<th>Lecture</th>
<th>Status</th>
</tr>

@foreach($records as $row)

<tr>

<td>{{ $row->roll_no }}</td>

<td>{{ $row->name }}</td>

<td>{{ $row->class_name }}</td>

<td>{{ $row->date }}</td>

<td>

{{ $row->start_time }} - {{ $row->end_time }}

</td>

<td>

@if($row->status == "Present")

<span class="badge bg-success">Present</span>

@else

<span class="badge bg-danger">Absent</span>

@endif

</td>

</tr>

@endforeach

</table>

</div>

</div>

@endsection