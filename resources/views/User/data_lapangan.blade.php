@extends('Components.Layout')
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

@if (Session::get('gagal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal !!</strong> {{Session::get('gagal')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<section class="section">
 <div class="table-responsive">
    <table class="table  datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lapangan</th>
                <th>Harga</th>
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
             <td>{{$data->harga}}</td>
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
                   <a class="btn btn-warning" href="/apps-user/booking-lapangan-futsal/{{$data->id}}"><i class="bi bi-pencil-square"></i> Booking</a>
                  
             </td>
            </tr>
            @endforeach
        </tbody>
    
      
     </table>
 </div>

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