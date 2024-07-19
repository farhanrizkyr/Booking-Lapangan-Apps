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
             <th>Aksi</th>
             
         </tr>
        </thead>

        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->jadwal->nama_lapangan}}</td>
                    <td>
                      @if ($data->status==0)
                           <span class="badge bg-danger">Belum Lunas</span>
                      @endif
                    </td>
                    <td><a class="btn btn-success btn-sm" href="/Bukti_Transfers/{{$data->bukti_bayar}}"><i class="bi bi-download"></i> Download</a></td>
                    <td>
                      <a href="#"  data-bs-toggle="modal" data-bs-target="#konfirmas/{{$data->id}}" class="btn btn-info btn-sm"><i class="bi bi-pen-fill"></i> Konfirmasi</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

</div>


@foreach ($datas as $data)
    <!-- Modal -->
<div class="modal fade" id="konfirmas/{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="/list-booking-lapangan-user/update-status/{{$data->id}}" method="post">
        @csrf
        <div class="grup">
          <label for="">Status Pembayaran</label>
          <select name="status" class="form-control">
            <option value="0" @if ($data->status=="0")selected @endif>Belum Lunas</option>
            <option value="1" @if ($data->status=="1")selected @endif>Lunas</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endforeach
</section>
@endsection