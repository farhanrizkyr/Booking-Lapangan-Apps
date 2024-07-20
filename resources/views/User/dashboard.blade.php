@extends('Components.Layout')
@section('title','Dashboard')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-user/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
 <div class="row">
<div class="col">
  <div class="card">
    <div class="card-header">
     Jumlah List Booking Lapangan Futsal
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$not}} List Booking</h5>
      <a href="/apps-user/list-booking-lapangan" class="btn btn-primary"><i class="bi bi-arrow-right"></i> Go somewhere</a>
    </div>
  </div>
</div>
<div class="col">
  <div class="card">
    <div class="card-header">
     Jumlah Lapangan Futsal
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$lap }} Lapangan </h5>
      <a href="/apps-user/list-lapangan" class="btn btn-primary"><i class="bi bi-arrow-right"></i> Go somewhere</a>
    </div>
  </div>
</div>


<div class="col">
  <div class="card">
    <div class="card-header">
      Jumlah History Booking Lapangan Futsal 
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$app}} Jumlah History Booking</h5>
    
      <a href="/apps-user/history-booking-lapangan-futsal" class="btn btn-primary"><i class="bi bi-arrow-right"></i>  Go somewhere</a>
    </div>
  </div>
</div>

 </div>

</section>
@endsection