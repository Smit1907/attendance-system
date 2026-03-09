@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

<div class="card3d">

<form action="/students/{{ $student->id }}" method="POST">

@csrf
@method('PUT')

<label>Name</label>

<input type="text"
name="name"
class="form-control"
value="{{ $student->name }}">

<br>

<label>Roll</label>

<input type="text"
name="roll_no"
class="form-control"
value="{{ $student->roll_no }}">

<br>

<label>Class</label>

<select name="class_id" class="form-control">

@foreach($classes as $class)

<option value="{{ $class->id }}"
@if($student->class_id==$class->id) selected @endif>

{{ $class->class_name }}

</option>

@endforeach

</select>

<br>

<button class="btn btn-primary">

Update Student

</button>

</form>

</div>

@endsection