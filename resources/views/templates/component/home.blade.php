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
                            
                            <!-- Perulangan manual angka 1 sampai 12 agar poster langsung tampil -->
                            @for ($i = 1; $i <= 12; $i++)
                            <div class="col-md-2 w3l-movie-gride-agile" style="margin-bottom: 25px;">
                                <div class="sout-agile">
                                    <a href="#" class="hvr-sweep-to-bottom">
                                        <img src="{{ asset('template/images/' . $i . '.jpg') }}" title="Poster Film" class="img-responsive" alt="Poster Film" />
                                    </a>
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </div>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="#">Judul Film {{ $i }}</a></h6>                            
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2026</p>
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
                            @endfor

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- //general -->
@endsection