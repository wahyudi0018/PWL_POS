{{-- @extends('m_user/template') --}}
@extends('layout.app')

@section('subtitle', 'User')
@section('content_header_title', 'M_User')
@section('content_header_subtitle', 'Tambah')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <div class="card-title "><h2>Tambah User</h2></div>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Ops</strong> Input gagal<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('m_user.store') }}" method="POST">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Level_id:</strong>
                    <input type="text" name="level_id" class="form-control" placeholder="Masukkan level"></input>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username"></input>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama"></input>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-secondary float-left" href="{{ route('m_user.index') }}">Back</a>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
