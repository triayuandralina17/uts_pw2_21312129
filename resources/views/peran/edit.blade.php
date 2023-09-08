@extends('layout.master')

	@section('judul')
    Edit Film
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
    <form method="post" action="/film/{{ $film->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $film->judul }}" class="form-control">
        </div>
        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Ringkasan</label>
            <input type="text" name="ringkasan" value="{{ $film->ringkasan }}" class="form-control">
        </div>
        @error('ringkasan')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" value="{{ $film->tahun }}" class="form-control">
        </div>
        @error('tahun')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Poster</label>
            <input type="text" name="poster" value="{{ $film->poster }}" class="form-control">
        </div>
        @error('poster')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Genre</label>
            <input type="text" name="genre" value="{{ $film->genre }}" class="form-control">
        </div>
        @error('genre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
@endsection