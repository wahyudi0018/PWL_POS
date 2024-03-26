@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- <div class="card-body">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <!-- input teks -->
                    <div class="form-group">
                        <label>Level id</label>
                        <input type="text" class="form-control" placeholder="id">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div> --}}
    <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Level</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-sm-6">
                <!-- input kode level -->
                <div class="form-group">
                  <label>Kode Level</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kode Level">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- input nama level -->
                <div class="form-group">
                  <label>Nama Level</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Level">
                </div>
              </div>
            </div>
          </form>
          <div type="submit" class="btn btn-info">Submit</div>
        </div>
        <!-- /.card-body -->
      </div>

    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Form Tambah User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-sm-6">
                <!-- input username -->
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Masukkan Username">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- input nama user -->
                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama User">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- input password -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Masukkan Kata Sandi">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <!-- pilih level -->
                <div class="form-group">
                  <label>Pilih Level</label>
                  <select class="form-control">
                    <option>Administrator</option>
                    <option>Manager</option>
                    <option>Staff</option>
                    <option>Customer</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
          <div type="submit" class="btn btn-info">Submit</div>
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

