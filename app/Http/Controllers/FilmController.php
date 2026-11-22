<?php

namespace App\Http\Controllers;

use App\Models\{
    Film,
    Genre,
    Kritik,
    Peran,
};
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function movies()
    {
        //
        $genreFilm = null;
        $films = Film::select('id','title', 'poster','year')
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18);
        return view('components/movies', compact('films', 'genreFilm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genres = Genre::all();
        return view('components.film-create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(\Illuminate\Http\Request $request)
{
    // Proses simpan data
    \App\Models\Film::create([
        'title' => $request->title,
        'year' => $request->year,
        'sinopsis' => $request->sinopsis,
        'genre_id' => $request->genre_id,
        'poster' => $request->poster ?? '1.jpg',
    ]);

    return redirect()->route('movies')->with('success', 'Film berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
        $filmByGenre    = Film::select('id','title', 'poster','year', 'sinopsis')
                        ->where('genre_id', '=', $film->genre_id)
                        ->OrderBy('created_at', 'asc')
                        ->limit(7)
                        ->get();
        $filmByRelease  = Film::select('id','title', 'poster','year')
                        ->where('year', '=', Carbon::now()->format('Y'))
                        ->OrderBy('created_at', 'asc')
                        ->limit(9)
                        ->get();
        $comments        = Kritik::select('comment', 'user_id')
                        ->where('film_id', '=', $film->id)
                        ->orderBy('created_at', 'asc')
                        ->limit(10)
                        ->get();
        $perans         = Peran::all()->where('film_id', '=', $film->id);
        return view('components.movie-show', compact('film','filmByGenre','filmByRelease','comments', 'perans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
        $genres = Genre::all();
        return view('components.film-edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\Illuminate\Http\Request $request, Film $film)
    {
        //
        $film->update([
            'title' => $request->title,
            'year' => $request->year,
            'sinopsis' => $request->sinopsis,
            'genre_id' => $request->genre_id,
            'poster' => $request->poster ?? $film->poster, // Jika poster kosong, gunakan poster lama
        ]);

        return redirect()->route('movies')->with('success', 'Film berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
        $film->delete();

        return redirect()->route('movies')->with('success', 'Film berhasil dihapus!');
    }

  public function movieHome()
{
    $films = Film::select('id','title', 'poster','year')
            ->OrderBy('created_at', 'asc')
            ->limit(9)->get();
    $filmFutured = Film::select('id','title', 'poster','year')
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->limit(6)->get();
    $filmRecentAdded = Film::select('id','title', 'poster','year')
                ->orderByDesc('created_at', 'asc')
                ->limit(6)->get();
    $filmSlidey = Film::select('title', 'poster','sinopsis')
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->limit(6)->get();
                
    // Ubah dari 'components/home' menjadi 'home' saja
    return view('home', compact('filmSlidey','films','filmFutured','filmRecentAdded'));
}

  public function moviesByGenre($genre)
    {
        $genreFilm = Genre::where('id', '=', $genre)->first();
        $films = Film::select('id','title', 'poster','year')
                ->where('genre_id', '=', $genre)
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18);
        return view('components/movies', compact('films','genreFilm'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $genreFilm = null;

        $films = Film::select('id', 'title', 'poster', 'year')
                    ->where('title', 'like', "%{$keyword}%")
                    ->orderByDesc('year')
                    ->paginate(18);

        return view('components.movies', compact('films', 'genreFilm'));
    }
}