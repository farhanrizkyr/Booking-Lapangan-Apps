<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="card" style="padding:22px;">
     <form action="{{route('proses-register-admin')}}" method="post">
        @csrf
        <div class="grup">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="grup">
            <label for="">Role</label>
          <select name="role" class="form-control">
            <option value="">Pilih</option>
            <option value="0" @if(old('role')=="0")selected  @endif>Admin</option>
            <option value="1" @if(old('role')=="1")selected  @endif>Petugas</option>
          </select>
            @error('role')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="grup">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control">
            @error('username')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="grup">
            <label for="">E-Mail</label>
            <input type="text" name="email" class="form-control">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="grup">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="grup">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
            @error('password_confirmation')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-primary">Register</button>
     </form>
    </div>
</body>
</html>