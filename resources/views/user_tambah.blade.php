{{-- <!DOCTYPE html>
<html>
<head>
    <title>Tambah Data User</title>
</head>
<body>
    <h1>Form Tambah Data User</h1>
    <form method="post" action="{{ url('/user/tambah_simpan') }}">

    {{ csrf_field() }}

    <label>Username</label>
    <input type="text" name="username" placeholder="Masukkan Username">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" placeholder="Masukkan Nama">
    <br>
    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan Password">
    <br>
    <label>Level ID</label>
    <input type="number" name="level_id" placeholder="Masukkan ID Level">
    <br><br>
    <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>
</html> --}}

@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Form Tambah User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ url('/user/tambah_simpan') }}" method="post">
                {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                    <label>Pilih Level</label>
                    <input type="text" name="level_id" class="form-control @error('level_id') is-invalid @enderror" placeholder="Masukkan ID Level">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/user') }}" class="btn btn-secondary mx-3">Back</a>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
