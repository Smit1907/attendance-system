@extends('layouts.app')

@section('content')

<h2>Attendance Percentage</h2>

<div class="card3d">

<div class="table-responsive">

<table class="table table-dark">

<tr>
<th>Roll</th>
<th>Name</th>
<th>Attendance %</th>
</tr>

@foreach($data as $row)

<tr>

<td>{{ $row['roll'] }}</td>

<td>{{ $row['name'] }}</td>

<td>

<div class="progress">

<div class="progress-bar bg-success"
style="width: {{ $row['percentage'] }}%">

{{ $row['percentage'] }}%

</div>

</div>

</td>

</tr>

@endforeach

</table>

</div>

</div>

@endsection