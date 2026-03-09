@extends('layouts.app')

@section('content')

<h2>Classes</h2>

<a href="/classes/create" class="btn btn-primary mb-3">Add Class</a>

<div class="card3d">

<table class="table table-dark">

<tr>
<th>ID</th>
<th>Class Name</th>
</tr>

@foreach($classes as $class)

<tr>
<td>{{ $class->id }}</td>
<td>{{ $class->class_name }}</td>
</tr>

@endforeach

</table>

</div>

@endsection