@extends('layouts.app')

@section('content')

@if(session('success'))

<div class="alert alert-success">
{{ session('success') }}
</div>

@endif


@if(session('warning'))

<div class="alert alert-danger">
{{ session('warning') }}
</div>

@endif


<div class="d-flex justify-content-between mb-3">

<h2>Mark Attendance</h2>

<a href="/attendance" class="btn btn-secondary">
<i class="fa fa-arrow-left"></i> Back
</a>

</div>


<div class="card3d">

<form id="attendanceForm" action="/save-attendance" method="POST">

@csrf

<input type="hidden" name="class_id" value="{{ $class_id }}">


<!-- Date + Lecture Slot -->

<div class="row mb-4">

<div class="col-md-4">

<label>Date</label>

<input type="date"
name="date"
class="form-control"
value="{{ date('Y-m-d') }}">

</div>

<div class="col-md-4">

<label>Lecture Start</label>

<input type="time"
name="start_time"
class="form-control">

</div>

<div class="col-md-4">

<label>Lecture End</label>

<input type="time"
name="end_time"
class="form-control">

</div>

</div>


<!-- Quick Stats -->

<div class="mb-3">

<span class="badge bg-success">
Present: <span id="presentCount">0</span>
</span>

<span class="badge bg-danger ms-2">
Absent: <span id="absentCount">0</span>
</span>

</div>


<!-- Control Buttons -->

<div class="mb-3">

<button type="button"
class="btn btn-success me-2"
onclick="presentAll()">

Present All

</button>

<button type="button"
class="btn btn-danger"
onclick="absentAll()">

Absent All

</button>

</div>


<div class="table-responsive">

<table class="table table-dark">

<tr>
<th>Roll</th>
<th>Name</th>
<th>Attendance</th>
</tr>

@foreach($students as $student)

<tr>

<td>{{ $student->roll_no }}</td>

<td>{{ $student->name }}</td>

<td>

<label class="switch">

<input
type="checkbox"
class="attendanceToggle"
name="absent[{{ $student->id }}]">

<span class="slider"></span>

</label>

</td>

</tr>

@endforeach

</table>

</div>

</form>

</div>


<!-- Sticky Save Button -->

<div class="sticky-save">

<button
type="submit"
form="attendanceForm"
class="btn btn-primary w-100">

Save Attendance

</button>

</div>


<style>

/* Toggle */

.switch{
position:relative;
display:inline-block;
width:60px;
height:34px;
}

.switch input{
display:none;
}

.slider{
position:absolute;
cursor:pointer;
top:0;
left:0;
right:0;
bottom:0;
background-color:#00cc66;
transition:.4s;
border-radius:34px;
}

.slider:before{
position:absolute;
content:"";
height:26px;
width:26px;
left:4px;
bottom:4px;
background:white;
transition:.4s;
border-radius:50%;
}

input:checked + .slider{
background:#ff4d4d;
}

input:checked + .slider:before{
transform:translateX(26px);
}


/* Sticky Save */

.sticky-save{
position:fixed;
bottom:0;
left:0;
right:0;
background:#111;
padding:10px;
box-shadow:0 -2px 10px rgba(0,0,0,0.5);
}


/* Mobile spacing */

body{
padding-bottom:70px;
}

</style>


<script>

function updateStats(){

let toggles=document.querySelectorAll(".attendanceToggle");

let absent=0;

toggles.forEach(t=>{
if(t.checked) absent++;
});

let total=toggles.length;

let present=total-absent;

document.getElementById("presentCount").innerText=present;
document.getElementById("absentCount").innerText=absent;

}

document.querySelectorAll(".attendanceToggle")
.forEach(el=>{
el.addEventListener("change",updateStats);
});


function presentAll(){

document.querySelectorAll(".attendanceToggle")
.forEach(el=>el.checked=false);

updateStats();

}

function absentAll(){

document.querySelectorAll(".attendanceToggle")
.forEach(el=>el.checked=true);

updateStats();

}

updateStats();

</script>

@endsection