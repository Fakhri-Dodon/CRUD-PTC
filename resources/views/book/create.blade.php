@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    
    <form action="{{ route('book.store') }}" method="POST" class="card p-3">
        @csrf

        <div class="mb-3 row">
            <label for="judul" class="col sm-2 col-form-label">Judul Buku : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col sm-2 col-form-label">Nama penulis : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col sm-2 col-form-label">Tahun Terbit: </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="tahun" name="tahun">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pilih" class="col-sm-2 col-from-label">Sudah Dibaca/belum:</label>
            <div class="col-sm-10">
                <select name="pilih" id="pilih" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                    <option value="sudah">Sudah</option>
                    <option value="belum">Belum</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Tambah Data Buku</button>
    </form>
@endsection