<!-- page title -->
<section class="section section--first section--bg" data-bg="{{URL::asset('assets/home/img/section/section.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__wrap">
                    <!-- section title -->
                    <h2 class="section__title">Filmy</h2>
                    <!-- end section title -->

                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="#">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Filmy</li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->

<!-- filter -->
<div class="filter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter__content">
                    <div class="filter__items">
                        <!-- filter item -->
                        {!! Form::open(['url'=>route('home.movies.ajax'),'id'=>'filter','style'=>'display:contents;']) !!}

                        <div class="filter__item" id="filter__genre">
                            <span class="filter__item-label">{{__('app.genre')}}:</span>

                            {!! Form::hidden('genre',null) !!}

                            <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Brak">
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" id="genres" aria-labelledby="filter-genre">
                            </ul>
                        </div>
                        <!-- end filter item -->

                        <!-- filter item -->
                        <div class="filter__item" id="filter__year">
                            <span class="filter__item-label">{{__('app.relase_year')}}:</span>

                            {!! Form::hidden('years_start',null) !!}
                            {!! Form::hidden('years_end',null) !!}
                            <div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="filter__range">
                                    <div id="filter__years-start"></div>
                                    <div id="filter__years-end"></div>
                                </div>
                                <span></span>
                            </div>

                            <div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-year">
                                <div id="filter__years"></div>
                            </div>
                        </div>
                        <!-- end filter item -->
                    </div>
                    <div class="filter__item" id="filter__year">
                        <span class="filter__item-label">Tytuł:</span>
                        {!! Form::text('title',null,['class'=>'profile__input','style'=>'height:30px;font-size:13px']) !!}
                    </div>
                    <!-- filter btn -->
                    {!! Form::submit('Zastosuj',['class'=>'filter__btn']) !!}
                    <!-- end filter btn -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end filter -->

<div class="list-items"></div>
<!-- catalog -->
<div class="catalog">
    <div class="container">
        <div class="row" id="movies">
        </div>
     <script>
         const Item = ({ id, poster, url, title,rating }) => ` <div class="col-6 col-sm-4 col-lg-3 col-xl-2"><div class="card"> <div class="card__cover"><img src="${poster}" alt=""/><a href="${url}" class="card__play"><i class="icon ion-ios-play"></i></a></div><div class="card__content"><h3 class="card__title"><a href="${url}">${title}</a></h3><span class="card__category" id="genres_${id}"></span><span class="card__rate"><i class="icon ion-ios-star"></i>${rating}</span></div></div></div>`;
         $.ajax({
             url: '/ajax/movies/genres',
             type: 'POST',
             data: {'_token':"{{csrf_token()}}"},
             success: function (data) {
                 $.each(data, function (heading, text) {
                     $('#genres').prepend('<li>'+text+'</li>');
                 });
                 $('.scrollbar-dropdown').mCustomScrollbar({
                     axis: "y",
                     scrollbarPosition: "outside",
                     theme: "custom-bar"
                 });

                 $('.accordion').mCustomScrollbar({
                     axis: "y",
                     scrollbarPosition: "outside",
                     theme: "custom-bar2"
                 });
             },
             error: function (data) {

             }
         });
         $(document).ready(function () {
             $.ajax({
                 url: '/ajax/movies',
                 type: 'POST',
                 data: {'_token':"{{csrf_token()}}"},
                 success: function (data) {
                     console.log(data);
                     $('div#movies').html('').prepend(data['data'].map(Item).join(''));
                     $.each(data['data'], function (heading, text) {
                         $.each(text['movies_genre'], function (genre_head, genre_text) {
                             $('span#genres_'+text['id']).prepend('<a href="#">'+genre_text['name']+'</a>');
                         });
                     });
                 },
                 error: function (data) {

                 }
             });

             var FILTER = $("form#filter");
             FILTER.submit(function (e) {
                 e.preventDefault();
                 $.ajax({
                     url: FILTER.attr('action'),
                     type: 'POST',
                     data: FILTER.serialize(),
                     success: function (data) {
                         $('div#movies').html('').prepend(data['data'].map(Item).join(''));
                         $.each(data['data'], function (heading, text) {
                             $.each(text['movies_genre'], function (genre_head, genre_text) {
                                 $('span#genres_'+text['id']).prepend('<a href="#">'+genre_text['name']+'</a>');
                             });
                         });
                     },
                     error: function (data) {
                      console.log('error');
                     }
                 });
             });
         });
     </script>
            <!-- paginator -->
            <div class="col-12">
                <ul class="paginator">
                    <li class="paginator__item paginator__item--prev">
                        <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                    </li>
                    <li class="paginator__item"><a href="#">1</a></li>
                    <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
                    <li class="paginator__item"><a href="#">3</a></li>
                    <li class="paginator__item"><a href="#">4</a></li>
                    <li class="paginator__item paginator__item--next">
                        <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                    </li>
                </ul>
            </div>
            <!-- end paginator -->
        </div>
    </div>
</div>
<!-- end catalog -->

<!-- expected premiere -->
<section class="section section--bg" data-bg="{{URL::asset('assets/home/img/section/section.jpg')}}">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12">
                <h2 class="section__title">Expected premiere</h2>
            </div>
            <!-- end section title -->

            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{URL::asset('assets/home/img/covers/cover.jpg')}}" alt="">
                        <a href="#" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
                        <span class="card__category">
								<a href="#">Action</a>
								<a href="#">Triler</a>
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{URL::asset('assets/home/img/covers/cover3.jpg')}}" alt="">
                        <a href="#" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">Benched</a></h3>
                        <span class="card__category">
								<a href="#">Comedy</a>
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{URL::asset('assets/home/img/covers/cover2.jpg')}}" alt="">
                        <a href="#" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">Whitney</a></h3>
                        <span class="card__category">
								<a href="#">Romance</a>
								<a href="#">Drama</a>
								<a href="#">Music</a>
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{URL::asset('assets/home/img/covers/cover6.jpg')}}" alt="">
                        <a href="#" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">Blindspotting</a></h3>
                        <span class="card__category">
								<a href="#">Comedy</a>
								<a href="#">Drama</a>
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{URL::asset('assets/home/img/covers/cover4.jpg')}}" alt="">
                        <a href="#" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
                        <span class="card__category">
								<a href="#">Action</a>
								<a href="#">Triler</a>
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card__cover">
                        <img src="{{URL::asset('assets/home/img/covers/cover5.jpg')}}" alt="">
                        <a href="#" class="card__play">
                            <i class="icon ion-ios-play"></i>
                        </a>
                    </div>
                    <div class="card__content">
                        <h3 class="card__title"><a href="#">Benched</a></h3>
                        <span class="card__category">
								<a href="#">Comedy</a>
							</span>
                        <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- section btn -->
            <div class="col-12">
                <a href="#" class="section__btn">Show more</a>
            </div>
            <!-- end section btn -->
        </div>
    </div>
</section>
<!-- end expected premiere -->
