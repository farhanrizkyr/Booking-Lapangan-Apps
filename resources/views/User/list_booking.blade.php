@extends('Components.Layout')
@section('title','List Booking Lapangan')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman List Booking Lapangan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-user/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Booking Lapangan</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

    @if (Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil !!</strong> {{Session::get('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


 <table class="table  datatable">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Lapangan</th>
        <th>Tanggal Awal</th>
        <th>Jam Awal</th>
        <th>Tanggal Selesai</th>
        <th>Jam Selesai</th>
        <th>Status</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>
    @foreach ($datas as  $data)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$data->jadwal->nama_lapangan}}</td>
          <td>{{\Carbon\carbon::parse($data->tanggal_awal)->isoformat('dddd D MMMM Y')}}</td>
          <td>{{$data->jam_awal}}</td>
          <td>{{\Carbon\carbon::parse($data->tanggal_akhir)->isoformat('dddd D MMMM Y')}}</td>
          <td>{{$data->jam_akhir}}</td>
          <td>
            @if ($data->status==0)
                 <span class="badge bg-danger">Belum Lunas</span>
            @endif
          </td>
          <td>{{$data->jadwal->harga}}</td>
          <td>
           <a href="#" class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#delete/{{$data->id}}"><i class="bi bi-trash-fill"></i> Delete</a>
          </td>
          
        </tr>
    @endforeach
</tbody>
 </table>

</section>

@foreach ($datas as  $data)

<!-- Modal  Delete-->
<div class="modal fade" id="delete/{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <p>Apakah Anda Ingin Menghapus Data {{$data->jadwal->nama_lapangan}} dari List Booking Lapangan</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Close</button>
           <form action="/apps-user/delete/{{$data->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
           </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
<!-- End Modal  Delete-->
@endsection