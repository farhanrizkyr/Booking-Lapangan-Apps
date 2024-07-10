@extends('Components_Admin.Layout')
@section('title','Tambah Edit Lapangan Futsal')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman Edit Lapangan Futsal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Edit Lapangan Futsal</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
 <div class="card" style="padding:23px;">
<form action="/apps-admin/proses-ubah-data-lapangan-futsal/{{$data->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="grup">

        <input type="hidden" name="gambar_lama" value="{{$data->gambar}}">
        <label for="">Nama Lapangan</label>
        <input type="text" name="nama_lapangan" class="form-control"  value="{{$data->nama_lapangan}}">
        @error('nama_lapangan')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="grup">

        <label for="">Harga Lapangan</label>
        <input type="integer" name="harga" class="form-control"  value="{{$data->harga}}">
        @error('harga')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="grup">
            <label for="">Gambar Lapangan</label>
            <input type="file" name="gambar" class="form-control">
            @error('gambar')
                <p class="text-danger">{{$message}}</p>
            @enderror
        
    </div>
    <div class="col">
       <img src="{{url('Gambar_Lapangan',$data->gambar)}}" width="30%" alt="">
    </div>


</div>
    
    <div class="grup">
        <label for="">Jenis Rumput</label>
        <input type="text" name="jenis_rumput" class="form-control" value="{{$data->jenis_rumput}}">
        @error('jenis_rumput')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    
    <div class="grup">
        <label for="">Description</label>
       <textarea name="desc" class="tinymce-editor">{{$data->desc}}</textarea>
    </div>
    @error('desc')
            <p class="text-danger">{{$message}}</p>
        @enderror

<button class="btn btn-outline-primary mt-4"><i class="bi bi-floppy"></i> Simpan</button>
</form>
 </div>

</section>
@endsection