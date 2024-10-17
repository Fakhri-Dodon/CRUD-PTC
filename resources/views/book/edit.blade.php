@extends('layouts.template')

@section('content')
@if ($book)
    <form action="{{ route('book.update', $book['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Buku :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $book['judul'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis Buku :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $book['penulis'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $book['tahun'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pilih" class="col-sm-2 col-form-label">Dibaca/Belum :</label>
            <div class="col-sm-10">
                <select name="pilih" id="pilih" class="form-select">
                    <option disabled selected hidden>Pilih</option>
                    <option value="sudah" {{ $book['pilih'] == 'sudah' ? 'selected' : '' }}>Sudah</option>
                    <option value="belum" {{ $book['pilih'] == 'belum' ? 'selected' : '' }}>Belum</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@else
    <p>Book Not Found.</p>
@endif
@endsection