@extends('layout.master')

	@section('judul')
    Tambah cast
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
    <form method="post" action="/cast">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="" class="form-control">
</div>
@error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Umur</label>
            <input type="number" name="umur" value="" class="form-control">
</div>
@error('umur')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Bio</label>
            <textarea class="form-control" name="bio"></textarea>
</div>
@error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection