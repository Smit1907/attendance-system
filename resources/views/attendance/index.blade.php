@extends('layouts.app')

@section('content')

<h2>Select Class</h2>

<div class="card3d">

<form action="/get-students" method="POST">

@csrf

<select name="class_id" class="form-control">

@foreach($classes as $class)

<option value="{{ $class->id }}">
{{ $class->class_name }}
</option>

@endforeach

</select>

<br>

<button class="btn btn-primary">Load Students</button>

</form>

</div>

@endsection