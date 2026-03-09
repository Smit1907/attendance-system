@extends('layouts.app')

@section('content')

<h2>Upload Students</h2>

<div class="card3d">

<form action="/students-import" method="POST" enctype="multipart/form-data">

@csrf

<input type="file" name="file" class="form-control">

<br>

<button class="btn btn-success">Upload</button>

</form>

</div>

@endsection