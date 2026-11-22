@extends('templates.index')

@section('content')
<!-- general -->
    <div class="general">
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured Movies</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">
                            
                            <!-- Perulangan menggunakan data dari Controller -->
                            @foreach ($filmFutured as $index => $film)
                            <div class="col-md-2 w3l-movie-gride-agile" style="margin-bottom: 25px;">
                                <div class="sout-agile">
                                    <a href="{{ route('movies.show', $film->id) }}" class="hvr-sweep-to-bottom">
                                        <!-- MEMANGGIL POSTER AMAN DARI DUPLIKASI PATH -->
                                        <img src="{{ asset('storage/' . str_replace('storage/', '', $film->poster)) }}" alt="{{ $film->title }}" class="img-responsive" />
                                    </a>
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </div>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <!-- Judul Film sesuai Database -->
                                        <h6><a href="{{ route('movies.show', $film->id) }}">{{ $film->title }}</a></h6>                            
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <!-- Tahun sesuai Database -->
                                        <p>{{ $film->year }}</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                            @endforeach

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- //general -->
@endsection