<!DOCTYPE html>
<html>
<head>

<title>Attendance System</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* Responsive font */

html{
font-size:16px;
}

@media(max-width:768px){

html{
font-size:14px;
}

h2{
font-size:1.3rem;
}

}

@media(max-width:480px){

html{
font-size:13px;
}

}

body{
background:linear-gradient(-45deg,#0f2027,#203a43,#2c5364,#000);
background-size:400% 400%;
animation:gradient 12s ease infinite;
color:white;
}

@keyframes gradient{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

/* sidebar */

.sidebar{
width:240px;
height:100vh;
background:#111;
position:fixed;
left:0;
top:0;
padding:20px;
transition:0.3s;
z-index:1000;
}

.sidebar a{
display:block;
color:white;
padding:10px;
margin-bottom:8px;
border-radius:8px;
text-decoration:none;
}

.sidebar a:hover{
background:#333;
}

/* main content */

.main{
margin-left:260px;
padding:30px;
}

/* mobile navbar */

.mobile-nav{
display:none;
background:#111;
padding:10px;
}

/* responsive */

@media(max-width:900px){

.sidebar{
left:-240px;
}

.sidebar.show{
left:0;
}

.main{
margin-left:0;
padding:20px;
}

.mobile-nav{
display:flex;
justify-content:space-between;
align-items:center;
}

}

/* cards */

.card3d{
background:rgba(255,255,255,0.08);
padding:25px;
border-radius:20px;
backdrop-filter:blur(10px);
box-shadow:0 10px 30px rgba(0,0,0,0.4);
transition:0.3s;
}

.card3d:hover{
transform:translateY(-8px);
}

/* tables responsive */

.table-responsive{
overflow-x:auto;
}

button{
min-height:45px;
}

</style>

</head>

<body>

<!-- Mobile Navbar -->

<div class="mobile-nav">

<button onclick="toggleSidebar()" class="btn btn-light btn-sm">

<i class="fa fa-bars"></i>

</button>

<h5>Attendance</h5>

</div>

<!-- Sidebar -->

<div class="sidebar" id="sidebar">

<h4 class="mb-4">Attendance</h4>

<a href="/dashboard"><i class="fa fa-chart-line"></i> Dashboard</a>

<a href="/classes"><i class="fa fa-school"></i> Classes</a>

<a href="/students"><i class="fa fa-users"></i> Students</a>

<a href="/students-upload"><i class="fa fa-upload"></i> Upload Students</a>

<a href="/attendance"><i class="fa fa-check"></i> Mark Attendance</a>

<a href="/attendance-report"><i class="fa fa-file"></i> Reports</a>

<a href="/attendance-percentage"><i class="fa fa-chart-pie"></i> Percentage</a>

</div>

<!-- Main Content -->

<div class="main">

@yield('content')

</div>

<script>

function toggleSidebar(){

document.getElementById("sidebar").classList.toggle("show");

}

</script>

</body>
</html>