@extends('layouts.app')

@section('content')

<h2>Add Class</h2>

<div class="card3d">

<form action="/classes" method="POST">

@csrf

<input type="text" name="class_name" class="form-control" placeholder="Class Name">

<br>

<button class="btn btn-success">Save</button>

</form>

</div>

@endsection