@extends('layouts.app')

@section('content')

<h2>Add Student</h2>

<div class="card3d">

<form action="/students" method="POST">

@csrf

<input type="text" name="name" class="form-control" placeholder="Name">

<br>

<input type="text" name="roll_no" class="form-control" placeholder="Roll">

<br>

<select name="class_id" class="form-control">

@foreach($classes as $class)

<option value="{{ $class->id }}">
{{ $class->class_name }}
</option>

@endforeach

</select>

<br>

<button class="btn btn-primary">Save</button>

</form>

</div>

@endsection