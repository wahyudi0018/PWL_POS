@extends('layout.app')

@section('subtitle', 'kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Delete')

@section('content')
    <div class="container">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">HAPUS KATEGORI</h3>
            </div>

            <div class="card-footer">
                <form id="deleteForm" method="POST" action="{{ route('kategori.destroy', $kategori->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="{{ url('/kategori') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

