@extends('adminlte::page')

@section('title', 'Level')

@section('content_header')
    <h1>Level</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Form Tambah Level</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{ url('/level') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Kode Level</label>
              <input type="text" name="level_kode" class="form-control @error('level_kode') is-invalid @enderror" placeholder="Masukkan Kode level">
            </div>
          </div>
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Level</label>
              <input type="text" name="level_nama" class="form-control @error('level_nama') is-invalid @enderror" placeholder="Masukkan Nama Level">
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
