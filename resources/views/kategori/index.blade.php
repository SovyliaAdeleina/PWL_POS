@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <a href="kategori/ubah" class=""><center>Tambah Kategori</center></a> 
            <div> <a href={{route('/kategori/ubah',$d->kategori_id)}}>Ubah</a>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div> 
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

