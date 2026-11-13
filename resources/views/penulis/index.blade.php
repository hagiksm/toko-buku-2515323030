@extends('layouts.app')

@section('title', 'Daftar Penulis — BookStore')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Penulis</h1>
        <a href="{{ route('penulis.create') }}" class="btn btn-primary">+ Tambah Penulis</a>
    </div>

    @if ($daftarPenulis->isEmpty())
        <div class="alert alert-info">Belum ada penulis.</div>
    @else
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Negara</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarPenulis as $penulis)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penulis->name }}</td>
                        <td>{{ $penulis->country ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('penulis.edit', $penulis->id) }}" class="btn btn-sm btn-outline-primary">Ubah</a>
                            <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin menghapus penulis ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection