@extends('templates.index')

@section('content')
<div class="general">
    <div class="container">
        <h2>Dashboard Admin - Manajemen Film</h2>
        <p class="text-muted" style="margin-bottom: 20px;">Kelola data film untuk website manajemen film.</p>
        
        <a href="{{ route('movies.create') }}" class="btn btn-success" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah Film Baru</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="background: #fff; color: #333;">
                <thead>
                    <tr style="background: #111; color: #fff;">
                        <th>No</th>
                        <th>Judul Film</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\Film::all() as $index => $film)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $film->title }}</td>
                        <td>{{ $film->year }}</td>
                        <td>
                            <a href="{{ route('movies.edit', $film->id) }}" class="btn btn-primary btn-xs">Edit</a>
                            <form action="{{ route('movies.destroy', $film->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection