@extends('layouts.app')

@section('content')

<h2>Students</h2>

<div class="card3d mb-4">

<form method="GET" action="/students">

<div class="row">

<div class="col-md-4">

<label>Select Class</label>

<select name="class_id" class="form-control">

<option value="">All Classes</option>

@foreach($classes as $class)

<option value="{{ $class->id }}">

{{ $class->class_name }}

</option>

@endforeach

</select>

</div>


<div class="col-md-4">

<label>Search Student</label>

<input type="text" name="search" class="form-control" placeholder="Search by name">

</div>

<div class="col-md-4 d-flex align-items-end">

<button class="btn btn-primary me-2">

Filter

</button>

<a href="/students/create" class="btn btn-success">

Add Student

</a>

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
<th>Action</th>
</tr>

@foreach($students as $student)

<tr>

<td>{{ $student->roll_no }}</td>

<td>{{ $student->name }}</td>

<td>{{ $student->class_name }}</td>

<td>

<a href="/students/{{ $student->id }}/edit"
class="btn btn-warning btn-sm">

Edit

</a>

<form action="/students/{{ $student->id }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

</div>

@endsection