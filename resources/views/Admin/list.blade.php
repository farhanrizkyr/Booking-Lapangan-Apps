@extends('Components_Admin.Layout')
@section('title',' List Account Admin')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman List Account Admin</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman  List Account Admi</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
@if (Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil !</strong> {{Session::get('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<a href="/apps-admin/register/" class="btn btn-primary mb-3">
   <i class="bi bi-plus-circle"></i> Tambah Data Account  Admin</a>
<section class="section">
 <table class="table  datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>


    <tbody>
        @foreach ($datas as $data)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$data->name}}</td>
                <td>
                    @if ($data->role=="0")
                        <span class="badge bg-info">Admin</span>
                    @endif

                    @if ($data->role=="1")
                    <span class="badge bg-warning">Petugas</span>
                @endif
                </td>
                <td>{{$data->username}}</td>
                <td>
                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#role/{{$data->id}}"><i class="bi bi-pencil-fill"></i> Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete/{{$data->id}}"><i class="bi bi-trash-fill"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
 </table>


 @foreach ($datas as $data)
     <!-- Modal -->
<div class="modal fade" id="role/{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Role</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="/apps-admin/update-role/{{$data->id}}" method="post">
         @csrf
         <div class="grup">
            <label for="">Edit Role</label>
            <select name="role" class="form-control">
                <option value="0" @if ($data->role=="0") selected @endif> Admin</option>
                <option value="1" @if ($data->role=="1") selected @endif>petugas</option>
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


 @foreach ($datas as $data)
     <!-- Modal -->
<div class="modal fade" id="delete/{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/apps-admin/delete/{{$data->id}}" method="post">
        @csrf
        @method('delete')
      <div class="modal-body">
       <p class="bold">Apakah Ingin Menghapus User Dengan Nama {{$data->name}}  ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-octagon-fill"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="bi bi-trash"></i> Delete</button>
      </form>
      </div>
    </div>
  </div>
</div>
 @endforeach
</section>
@endsection