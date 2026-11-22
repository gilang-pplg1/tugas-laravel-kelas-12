@extends('templates.index')

@section('content')
<div class="general">
    <div class="container">
        <h2>Dashboard User - Daftar Film</h2>
        <p class="text-muted" style="margin-bottom: 20px;">Selamat datang! Pilih film kesukaanmu untuk membaca sinopsis, memberikan rating, atau menulis komentar.</p>

        <div class="w3_agile_featured_movies">
            @foreach (\App\Models\Film::all() as $film)
            <div class="col-md-2 w3l-movie-gride-agile" style="margin-bottom: 25px;">
                <div class="sout-agile">
                    <a href="{{ route('movies.show', $film->id) }}" class="hvr-sweep-to-bottom">
                        <!-- Tampilkan gambar/poster atau placeholder aman -->
                        <img src="{{ asset('template/images/user.jpg') }}" title="{{ $film->title }}" class="img-responsive" alt="{{ $film->title }}" />
                    </a>
                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                </div>
                <div class="mid-1 agileits_w3layouts_mid_1_home">
                    <div class="w3l-movie-text">
                        <h6><a href="{{ route('movies.show', $film->id) }}">{{ $film->title }}</a></h6>                            
                    </div>
                    <div class="mid-2 agile_mid_2_home">
                        <p>{{ $film->year }}</p>
                        <div class="block-stars">
                            <ul class="w3l-ratings">
                                <li><a href="{{ route('movies.show', $film->id) }}"><i class="fa fa-star" aria-hidden="true"></i> Beri Rating</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection