@extends('layout.master')

	@section('judul')
    Edit Peran
    @endsection

    
@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(function(){
        $('#example1').DataTable();
    });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

	@section('content')
    <form method="post" action="/peran/{{ $peran->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $peran->judul }}" class="form-control">
        </div>
        @error('Film')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Cast</label>
            <input type="text" name="ringkasan" value="{{ $peran->ringkasan }}" class="form-control">
        </div>
        @error('Cast')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Nama</label>
            <input type="number" name="tahun" value="{{ $peran->tahun }}" class="form-control">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Poster</label>
            <input type="text" name="poster" value="{{ $peran->poster }}" class="form-control">
        </div>
        @error('action')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Action</label>
            <input type="text" name="genre" value="{{ $peran->genre }}" class="form-control">
        </div>
        @error('action')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
@endsection