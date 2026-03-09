@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>

<div class="row mt-4">

<div class="col-md-3">
<div class="card3d text-center">
<h4>Total Students</h4>
<h2>{{ $totalStudents }}</h2>
</div>
</div>

<div class="col-md-3">
<div class="card3d text-center">
<h4>Present</h4>
<h2>{{ $present }}</h2>
</div>
</div>

<div class="col-md-3">
<div class="card3d text-center">
<h4>Absent</h4>
<h2>{{ $absent }}</h2>
</div>
</div>

<div class="col-md-3">
<div class="card3d text-center">
<h4>Attendance %</h4>
<h2>{{ $percentage }}%</h2>
</div>
</div>

</div>

<br>

<div class="card3d">

<canvas id="chart"></canvas>

</div>

<script>

const ctx=document.getElementById('chart');

new Chart(ctx,{
type:'pie',
data:{
labels:['Present','Absent'],
datasets:[{
data:[{{ $present }},{{ $absent }}],
backgroundColor:['#00ff99','#ff4d4d']
}]
}
});

</script>

@endsection