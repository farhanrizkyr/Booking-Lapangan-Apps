@extends('Components.Layout')
@section('title','Booking Lapangan')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman Booking Lapangan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-user/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Booking Lapangan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
<div class="table-responsive">
    <a href="/apps-user/list-lapangan" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i> Kembali </a>
    <div class="card" style="padding:25px;">
        <table class="table table-hover">
            <thead>
              <tr>
               <td> Nama  Lapangan </td>
                 <td>:</td>
                <td>{{$booking->nama_lapangan}}</td>
              </tr>

              <td> Harga  Lapangan </td>
              <td>:</td>
             <td>{{$booking->harga}}</td>
           </tr>

           <td> Gambar Lapangan </td>
             <td>:</td>
            <td><img style="width:30%;" src="{{url('Gambar_lapangan',$booking->gambar)}}" alt=""></td>
          </tr>

          <td> Jenis  Rumput Lapangan </td>
             <td>:</td>
             <td>{{$booking->jenis_rumput}}</td>
          </tr>

          <td> Description Lapangan </td>
          <td>:</td>
         <td>{!!$booking->desc!!}</td>
            </thead>
        </table>


















</div>



 </div>
</section>
@endsection