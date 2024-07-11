@extends('Components_Admin.Layout')
@section('title','Pengaturan Profile')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman Pengaturan Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman Pengaturan Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
    <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
           <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                @if (Session::get('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Berhasil !</strong> {{Session::get('status')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
  
                <img src="{{Auth::user()->avatar()}}" alt="Profile" class="rounded-circle">
                <h2>{{Auth::user()->name}}</h2>
                <h3>
                    @if (Auth::user()->role=="0")
                    <span><i class="bi bi-circle-fill text-info"></i> Admin</span>
                @endif
  
                @if (Auth::user()->role=="1")
                <span><i class="bi bi-circle-fill text-warning"></i> Petugas</span>
            @endif
                </h3>
                <div class="social-links mt-2">
                
                </div>
              </div>
            </div>
  
          </div>
  
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
  
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>
  
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>
  
               
  
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>
  
                </ul>
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                    <h5 class="card-title">Profile Details</h5>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8">{{Auth::user()->name}}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Username</div>
                      <div class="col-lg-9 col-md-8">{{Auth::user()->username}}</div>
                    </div>
  
                  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Gender</div>
                      <div class="col-lg-9 col-md-8">

                        @if (Auth::user()->gender==null)
                            Belum Diinput
                        @endif

                        @if (Auth::user()->gender=="0")
                        Laki-Laki
                        @endif

                        @if (Auth::user()->gender=="1")
                        Perempuan
                        @endif
                      </div>
                    </div>
  
                   
                  
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                    </div>
  
                  </div>
  
                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
  
                    <!-- Profile Edit Form -->
                    <form method="POST" enctype="multipart/form-data" action="/apps-admin/ubah-pengaturan/{{Auth::user()->id}}">
                        @csrf
                         @if (Auth::user()->avatar)
                             <input type="hidden" name="avatar_lama" value="{{Auth::user()->avatar}}">
                         @endif
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="pt-2">
                            <input type="file" name="avatar" class="form-control">
                            @error('avatar')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="name" type="text" class="form-control" id="fullName" value="{{Auth::user()->name}}">
                          @error('name')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                        </div>
                      </div>

                        <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="username" type="text" class="form-control" id="fullName" value="{{Auth::user()->username}}">
                          @error('username')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                        </div>
                      </div>
  
                     
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                        <div class="col-md-8 col-lg-9">
                        <select name="gender" class="form-control">
                            <option value="">Pilih</option>
                            <option value="0" @if(Auth::user()->gender=="0") selected  @endif>Laki Laki</option>
                            <option value="1" @if(Auth::user()->gender=="1") selected  @endif>Perempuan</option>
                        </select>
                        </div>
                      </div>
                     
  
                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="text" class="form-control" id="Email" value="{{Auth::user()->email}}">
                          @error('email')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                        </div>
                      </div>
  
  
                   
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->
  
                  </div>
  
               
  
                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>
  
                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->
  
                  </div>
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  

</section>
@endsection