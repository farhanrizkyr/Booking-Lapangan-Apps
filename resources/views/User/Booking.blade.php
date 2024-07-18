@extends('Components.Layout')
@section('title')
Booking- {{$booking->nama_lapangan}}
@endsection
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
               <tr>
              <td> Harga  Lapangan </td>
              <td>:</td>
             <td>{{$booking->harga}}</td>
           </tr>
           <tr>
           <td> Gambar Lapangan </td>
             <td>:</td>
            <td><img style="width:30%;" src="{{url('Gambar_lapangan',$booking->gambar)}}" alt=""></td>
          </tr>

          <tr>
          <td> Jenis  Rumput Lapangan </td>
             <td>:</td>
             <td>{{$booking->jenis_rumput}}</td>
          </tr>
          <tr>
          <td> Description Lapangan </td>
          <td>:</td>
         <td>{!!$booking->desc!!}</td>
          </tr>
            </thead>
        </table>
</div>

 </div>


<hr>
 <h4>Booking Lapangan Futsal</h4>

 <div class="card text-center">
  <div class="card-header">
  <i class="bi bi-clipboard-check-fill"></i>  Booking Lapangan Futsal
  </div>
  <div class="card-body">
  <form action="/apps-user/proses-daftar/{{$booking->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="grup">

      <div class="grup">
        <input type="hidden" name="nama_lapangan" value="{{$booking->id}}">
        <label for="">Tanggal Awal</label>
        <input type="date" name="tanggal_awal" class="form-control">
        @error('tanggal_awal')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <label for="">Jam Awal</label>
      <input type="time" name="jam_awal" class="form-control">
      @error('jam_awal')
          <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

    <div class="grup">
      <label for="">Tanggal Akhir</label>
      <input type="date" name="tanggal_akhir" class="form-control">
      @error('tanggal_akhir')
          <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

    <div class="grup">
      <label for="">Jam Akhir</label>
      <input type="time" name="jam_akhir" class="form-control">
      @error('jam_akhir')
          <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

      <div class="grup">
        <label for="">Bukti Pembayaran </label>
        <input type="file" name="bukti_bayar" class="form-control">
        @error('bukti_bayar')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <button class="btn btn-primary mt-2"><i class="bi bi-floppy"></i> Booking</button>
  </form>

  </div>
  <div class="card-footer text-body-secondary">
Form Booking Lapangan Futsal
  </div>
</div>
</section>
@endsection