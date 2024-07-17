@extends('Components.Layout')
@section('title','Ubah Password')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman Ubah Password</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-user/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Ubah Password</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


@if (Session::get('status'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Gagal!</strong> {{Session::get('status')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
@endif

@if (Session::get('berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil!</strong> {{Session::get('berhasil')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
@endif

<section class="section">
 <div class="card" style="padding:22px;">
  <form action="{{route('update-pw-user')}}" method="post">
    @csrf
  <div class="grup">
<div class="grup"><label for="">Password Lama</label>
<input type="password" name="password_lama" class="form-control">
@error('password_lama')
    <p class="text-danger">{{$message}}</p>
@enderror
</div>

<div class="grup">
  <div class="grup"><label for="">Password baru</label>
  <input type="password" name="password_baru" class="form-control">
  @error('password_baru')
    <p class="text-danger">{{$message}}</p>
@enderror
  </div>

  <div class="grup">
    <div class="grup"><label for="">Konfirmasi Password baru</label>
    <input type="password" name="password_baru1" class="form-control">
    @error('password_baru1')
    <p class="text-danger">{{$message}}</p>
@enderror
    </div>

<button class="btn btn-primary mt-3">Update</button>
</form>
</div> 
 
</section>
@endsection