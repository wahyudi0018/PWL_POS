@extends('layout.app')

{{-- Customize Layout Sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="float-right" style="position: relative; z-index: 1;">
                    <a href="{{ url('kategori/create') }}" class="btn btn-primary">ADD CATEGORY</a>
                </div>
                {{ $dataTable->table()}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts()}}
@endpush
