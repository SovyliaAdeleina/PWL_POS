@extends('layout.template')

@section('content')
   <div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($level)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
            Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
          <form method="POST" action="{{ url('/level/'.$level->level_id) }}" 
            class="form-horizontal">
            @csrf
            {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit 
                yang butuh method PUT -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Level</label>
                    <div class="col-11">
                        <select class="form-control" id="level_id" name="level_id" required>
                            <option value="">- Pilih Level -</option>
                            @foreach($level as $item)
                            <option value="{{ $item->level_id }}" @if($item->level_id == 
$user->level_id) selected @endif>{{ $item->level_nama }}</option>
@endforeach
</select>
@error('level_id')
<small class="form-text text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="form-group row">
<label class="col-1 control-label col-form-label">Level_kode</label>
<div class="col-11">
<input type="text" class="form-control" id="Level_id"
name="Level_id" value="{{ old('level_id', $level->level_id) }}" required>
@error('Level_id')
<small class="form-text text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="form-group row">
<label class="col-1 control-label col-form-label">Level_kode</label>
<div class="col-11">
<input type="text" class="form-control" id="nama" name="nama"
value="{{ old('nama', $level->nama) }}" required>
@error('nama')
<small class="form-text text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="form-group row">
<label class="col-1 control-label col-form-label">Password</label>
<div class="col-11">
<input type="password" class="form-control" id="password"
name="password">
@error('password')
<small class="form-text text-danger">{{ $message }}</small>
@else
<small class="form-text text-muted">Abaikan (jangan diisi) jika tidak ingin mengganti password level.</small>
@enderror
</div>
</div>
<div class="form-group row">
<label class="col-1 control-label col-form-label"></label>
<div class="col-11">
<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
<a class="btn btn-sm btn-default ml-1" href="{{ url('user') 
}}">Kembali</a>
</div>
</div>
</form>
@endempty
</div>
</div>
@endsection
@push('css')
@endpush
@push('js')
@endpush

