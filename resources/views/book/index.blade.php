@extends('layouts.template')

@section('content')
    <table class="table table-striped table-boardered table-hover">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            {{-- <th>Dibaca/Belum</th> --}}
            <th>Action</th>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($books as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ $item['penulis'] }}</td>
                    <td>{{ $item['tahun'] }}</td>
                    {{-- <td>{{ $item['pilih'] }}</td> --}}
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('book.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('book.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection