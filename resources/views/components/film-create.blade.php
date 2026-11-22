@extends('templates.index')

@section('content')
<div class="general">
    <div class="container" style="max-width: 600px;">
        <h2>Tambah Film Baru</h2>
        
        <form action="{{ route('movies.store') }}" method="POST" style="margin-top: 20px;">
            @csrf
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label>Judul Film:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Tahun Rilis:</label>
                <input type="number" name="year" class="form-control" required>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Genre:</label>
                <select name="genre_id" class="form-control" required>
                    <option value="">-- Pilih Genre --</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Nama File Poster (Contoh: 1.jpg, 2.jpg):</label>
                <input type="text" name="poster" class="form-control" placeholder="1.jpg" required>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label>Sinopsis:</label>
                <textarea name="sinopsis" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #ff8d00; border: none;">Simpan Film</button>
        </form>
    </div>
</div>
@endsection