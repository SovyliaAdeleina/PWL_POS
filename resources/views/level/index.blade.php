{{-- Praktikum 3 Jobsheet 7 --}}
@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('level/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        {{-- // Praktikum 4, Jobsheet 7, No 2 --}}
        <div class="row">
            <div class="col-ms-12">
                <div class="form-group row">
                    <label class="col-4 control-label col-form-label">Filter :</label>
                    <div class="col-8">
                        <select name="level_id" id="level_id" class="form-control" required>
                            <option value="">- Semua -</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Level Pengguna</small>
                    </div>
                </div>
            </div>
        </div>
    
        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
            <thead>
                <tr>
                    <th>Level_id</th>
                    <th>Level_kode</th>
                    <th>Level_nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush
@push('js')
{{-- Praktikum 4, Jobsheet 4, No 3 --}}
    <script>
        $(document).ready(function() {
            var dataUser = $('#table_level').DataTable({
                serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('level/list') }}",
                    "dataType": "json",
                    "type": "POST"
                    "data": function(d) {
                        d.level_id = $('#level_id').val();
                },
columns: [
    {
        data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
        className: "text-center",
        orderable: false,
        searchable: false
    },{
        data: "level_id", 
        className: "",
        orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
        searchable: true // searchable: true, jika ingin kolom ini bisa dicari
        columns: [{
                    data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "level_kode",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa  dicari
                }, {
                    data: "level_nama",
                    className: "",
                    orderable: true, // orderable: true, jika ingin kolom ini bisa  diurutkan
                    searchable: true // searchable: true, jika ingin kolom ini bisa  dicari
                }, {
                    data: "aksi",
                    className: "",
                    orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                    searchable: false // searchable: true, jika ingin kolom ini bisa  dicari
                }
            ]
        });

        // Praktikum 4, Jobsheet 7, No 4
        $('#level_id').on('change', function() {
                datalevel.ajax.reload();
        });

    });
        </script>
@endpush           