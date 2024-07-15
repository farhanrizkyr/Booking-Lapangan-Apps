@extends('Components_Admin.Layout')
@section('title','Ubah Password')
@section('main')

@if (Session::get('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong>  {{Session::get('gagal')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (Session::get('berhasil'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil!</strong>  {{Session::get('berhasil')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="pagetitle">
  <h1>Halaman Ubah Password</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Ubah Password</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
 <div class="card" style="padding:25px;">
    <form action="{{route('update-pw-admin')}}" method="post">
        @csrf
       <div class="group">
        <label for="">Password Lama</label>
        <input type="password" name="old_password" class="form-control">
        @error('old_password')
            <p class="text-danger">{{$message}}</p>
        @enderror
       </div>

       <div class="group">
        <label for="">Password Baru</label>
        <input type="password" name="new_password" class="form-control">
        @error('new_password')
            <p class="text-danger">{{$message}}</p>
        @enderror
       </div>

       <div class="group">
        <label for="">Konfirmasi Password Baru</label>
        <input type="password" name="ulang_password" class="form-control">
        @error('ulang_password')
            <p class="text-danger">{{$message}}</p>
        @enderror
       </div>
       <button class="btn btn-primary mt-3"><i class="bi bi-key-fill"></i> Ubah Password</button>
    </form>


 </div>
</section>
@endsection