@extends('Components.Layout')
@section('title','My Profile ')
@section('main')
    
<div class="pagetitle">
  <h1>Halaman My Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/apps-user/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item">Halaman My Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
 
    <section class="section profile">

      @if (Session::get('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{Session::get('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> 
      @endif

        <div class="row">
          <div class="col-xl-4">
  
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
  
                <img src="{{Auth::user()->avatar()}}" alt="Profile" class="rounded-circle">
                <h2>{{Auth::user()->name}}</h2>
                <h3><i class="bi bi-clock-history"></i> Update :{{Auth::user()->updated_at->diffForHumans()}}</h3>
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
  
                 
  
                </ul>
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">
                        @if (strlen(Auth::user()->bio)>250)
                          {!! substr (Auth::user()->bio,0,250) !!} <a href="#" data-bs-toggle="modal" data-bs-target="#bio">Lanjutkan...</a>
                          @else
                            {!! Auth::user()->bio !!}
                          
                          @endif
                    </p>
  
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
                      <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                      <div class="col-lg-9 col-md-8">
                            @if (Auth::user()->gender==null)
                                <p class="text-danger">Belum Diinput</p>
                            @endif

                            @if (Auth::user()->gender=="0")
                            <p class="text">Laki-Laki</p>
                        @endif
                            @if (Auth::user()->gender=="1")
                            <p class="text">Perempuan</p>
                        @endif
                      </div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tempat</div>
                      <div class="col-lg-9 col-md-8">
                        @if (Auth::user()->tempat==null)
                        <p class="text-danger">Belum Diinput</p>
                    @endif

                    @if (Auth::user()->tempat)
                    <p class="">{{Auth::user()->tempat}}</p>
                @endif
                      </div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                      <div class="col-lg-9 col-md-8">
                        @if (Auth::user()->tl==null)
                        <p class="text-danger">Belum Diinput</p>
                    @endif

                    @if (Auth::user()->tl)
                    <p class="">{{\Carbon\carbon::parse(Auth::user()->tl)->isoformat('dddd DDD MMMM Y')}}</p>
                @endif
                      </div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8">
                        @if (Auth::user()->hp==null)
                        <p class="text-danger">Belum Diinput</p>
                    @endif

                    @if (Auth::user()->hp)
                    <p class="">{{Auth::user()->hp}}</p>
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
                    <form method="post" action="/apps-user/update-user-account/{{Auth::user()->id}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row mb-3">
                        @if (Auth::user()->avatar)
                            <input type="hidden" name="avatar_lama" value="{{Auth::user()->avatar}}" >
                        @endif
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="file" class="form-control" name="avatar">
                          @error('avatar')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="name" type="text" class="form-control" id="fullName" value="{{Auth::user()->name}}">
                        @error('name')
                          <p class="text-danger"></p>
                        @enderror
                        </div>
                      </div>
  
                     
  
                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="username" type="text" class="form-control" id="company" value="{{Auth::user()->username}}">
                          @error('username')
                          <p class="text-danger"></p>
                        @enderror
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8 col-lg-9">
                         <select name="gender" class="form-control">
                          <option value=""> Pilih </option>
                          <option value="0" @if (Auth::user()->gender=="0") selected @endif> Laki-Laki </option>
                          <option value="1" @if (Auth::user()->gender=="1") selected  @endif> Perempuan </option>
                         </select>
                          
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Tempat</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="tempat" type="text" class="form-control" id="Country" value="{{Auth::user()->tempat}}">
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="tl" type="date" class="form-control" id="Address" value="{{Auth::user()->tl}}">
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="hp" type="number" class="form-control" id="Phone" value="{{Auth::user()->hp}}">
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

                      <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="bio" class="tinymce-editor" id="about">{!!Auth::user()->bio!!}</textarea>
                        </div>
                      </div>
  
                     
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->
  
                  </div>
  
                  
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</section>

<!-- Modal Bio -->
<div class="modal fade" id="bio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail About</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         {!! Auth::user()->bio !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-octagon"></i> Close</button>

        </div>
      </div>
    </div>
  </div>
<!--- End Modal Bio--->  
@endsection