@extends('Components_Admin.Layout')
@section('title','Tambah Lapangan Futsal')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman Tambah Lapangan Futsal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Tambah Lapangan Futsal</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
 <div class="card" style="padding:23px;">
<form action="/apps-admin/upload-lapangan-futsal" enctype="multipart/form-data" method="post">
    @csrf
    <div class="grup">
        <label for="">Nama Lapangan</label>
        <input type="text" name="nama_lapangan" class="form-control">
        @error('nama_lapangan')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="grup">
        <label for="">Gambar Lapangan</label>
        <input type="file" name="gambar" class="form-control">
        @error('gambar')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="grup">
        <label for="">Jenis Rumput</label>
        <input type="text" name="jenis_rumput" class="form-control">
        @error('jenis_rumput')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="grup">
        <label for="">Description</label>
       <textarea name="desc" class="tinymce-editor"></textarea>
    </div>
    @error('desc')
            <p class="text-danger">{{$message}}</p>
        @enderror

<button class="btn btn-outline-primary mt-4"><i class="bi bi-floppy"></i> Simpan</button>
</form>
 </div>

</section>
@endsection