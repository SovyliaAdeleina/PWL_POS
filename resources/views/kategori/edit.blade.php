@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Edit kategori</h3>
            </div>

            <form method="edit" action="../edit">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placehold
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placehol
                    </div>

                    <div class="form-group">
                        <label for="IDKategori">ID Kategori</label>
                        <input type="text" class="form-control" id="IDKategori" name="IDKategori" placehol
                    </div>
                </div>

                <div class="card-footer">
                <button type="save" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
            <div> <a href={{route('/kategori/ubah',$d->kategori_id)}}>Ubah</a>

    </div>
@endsection

