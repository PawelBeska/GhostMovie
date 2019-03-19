

@if ($paginator->hasPages())
    {{-- Pagination Elements --}}


    <li class="paginator__item paginator__item--prev">
        @if($paginator->currentPage()!==1)
            <a href="{{url('/') .Request::getRequestUri()}}?page={{$paginator->currentPage()+1}}"><i class="icon ion-ios-arrow-back"></i></a>
        @else
            <a disabled="true"><i class="icon ion-ios-arrow-back"></i></a>
        @endif
    </li>
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            {{$element}}
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="paginator__item paginator__item--active"><a href="#">{{$page}}</a></li>
                @else
                    @if($paginator->currentPage()<=$page+2&&$paginator->currentPage()>=$page-2)
                        @if(strpos(url('/') .Request::getRequestUri(),'?')== true)

                            @if(strpos(url('/') .Request::getRequestUri(),'?page')== true)
                                <li class="paginator__item"><a href="{{str_replace("?page=".$paginator->currentPage(),'',url('/') .Request::getRequestUri())}}?page={{$page}}">{{$page}}</a></li>
                            @else()
                                <li class="paginator__item"><a href="{{str_replace("?page=".$paginator->currentPage(),'',url('/') .Request::getRequestUri())}}&page={{$page}}">{{$page}}</a></li>

                            @endif()
                        @else
                            <li class="paginator__item"><a href="{{url('/') .Request::getRequestUri()}}?page={{$page}}">{{$page}}</a></li>

                        @endif
                    @endif()
                @endif
            @endforeach
        @endif

    @endforeach

    <li class="paginator__item paginator__item--next">
        @if($paginator->currentPage()!==$paginator->lastPage())
        <a href="{{url('/') .Request::getRequestUri()}}?page={{$paginator->currentPage()+1}}"><i class="icon ion-ios-arrow-forward"></i></a>
        @else
            <a disabled="true"><i class="icon ion-ios-arrow-forward"></i></a>

        @endif
    </li>
@endif
<script>
    var moviePagination = $('ul.paginator').find('a');
    moviePagination.on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url : $(this).attr('href'),
            type: 'post',
            data: $("form#filter").serialize(),
        }).done(function (data) {
            console.log(data)
            $('div#movies').html('').prepend(data['data'].map(Item).join(''));
            $.each(data['data'], function (heading, text) {
                $.each(text['movies_genre'], function (genre_head, genre_text) {
                    $('span#genres_'+text['id']).prepend('<a href="#">'+genre_text['name']+'</a>');
                });
            });
            $('ul.paginator').html(data[0]);
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    });
</script>