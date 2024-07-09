@extends('Components_Admin.Layout')
@section('title','List Lapangan Futsal')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman List Lapangan Futsal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman List Lapangan Futsal</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
@if (Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil !</strong> {{Session::get('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (Session::get('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal !</strong> {{Session::get('gagal')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<a href="/apps-admin/tambah-lapangan-futsal/" class="btn btn-primary mb-3">
   <i class="bi bi-plus-circle"></i> Tambah Lapangan Futsal</a>
<section class="section">
 <div class="table-responsive">
    <table class="table  datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lapangan</th>
                 <th>Upload</th>
                <th>Gambar</th>
                <th>Jenis Rumput</th>
                <th>Descripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lapangans as $data)
            <tr>
             <th>{{$loop->iteration}}</th>
             <td>{{$data->nama_lapangan}}</td>
             <td>{{$data->created_at->isoformat('dddd D, MMMM Y')}}</td>
             <td><img width="100px;" src="{{url('Gambar_Lapangan',$data->gambar)}}" alt=""></td>
             <td>{{$data->jenis_rumput}}</td>
             <td>
              @if (strlen($data->desc)>50)
                {!!  substr($data->desc,0,50) !!} <a href="#" data-bs-toggle="modal" data-bs-target="#desc/{{$data->id}}">Lanjutkan...</a>
                 

                 @else
                 {!! $data->desc !!}
                @endif
                 
             </td>
             <td>
                   <a class="btn btn-warning" href="/apps-admin/ubah-data-lapangan-futsal/{{$data->id}}"><i class="bi bi-pencil-square"></i> Edit</a>
                  <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete/{{$data->id}}"><i class="bi bi-trash"></i> Delete</a>
             </td>
            </tr>
            @endforeach
        </tbody>
    
      
     </table>
 </div>

 @foreach ($lapangans  as $data)
 <!-- Modal -->
<div class="modal fade" id="delete/{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header bg-danger text-white">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data Lapangan</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
     <form  method="POST" action="/apps-admin/hapus-lapangan-futsal/{{$data->id}}">
        @csrf
        @method('delete')
     Apakah Anda Ingin Menghapus Data {{$data->nama_lapangan}} ?
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Close</button>
    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
  </form>
  </div>
</div>
</div>
</div>
@endforeach

 @foreach ($lapangans  as $data)
     <!-- Modal -->
<div class="modal fade" id="desc/{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Description Lapangan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {!! $data->desc !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Close</button>
  
      </div>
    </div>
  </div>
</div>
 @endforeach
</section>
@endsection