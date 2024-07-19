@extends('Components_Admin.Layout')
@section('title','List Booking Lapangan User')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman List Booking Lapangan User</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman List Booking Lapangan User</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  @if (Session::get('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{Session::get('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
  @endif
 

<div class="table-responsive">
    <table class="table table-hover  datatable">
        <thead>
         <tr>
             <th>No</th>
             <th>Nama User</th>
             <th>Nama Lapangan</th>
             <th>Status</th>
             <th>Bukti Pembayaran</th>
             
         </tr>
        </thead>

        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->jadwal->nama_lapangan}}</td>
                    <td>
                      @if ($data->status==1)
                           <span class="badge bg-success">Lunas</span>
                      @endif
                    </td>
                    <td><a class="btn btn-success btn-sm" href="/Bukti_Transfers/{{$data->bukti_bayar}}"><i class="bi bi-download"></i> Download</a></td>
                   
                </tr>
            @endforeach
        </tbody>
      </table>

</div>


</section>
@endsection