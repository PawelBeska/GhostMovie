<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/bootstrap-reboot.min.css')}}'">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/plyr.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/photoswipe.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/default-skin.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/main.css')}}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{URL::asset('assets/home/icon/favicon-32x32.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{URL::asset('assets/home/icon/favicon-32x32.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('assets/home/icon/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('assets/home/icon/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('assets/home/icon/apple-touch-icon-144x144.png')}}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>GhostMovie - Logowanie</title>

</head>
<body class="body">

<div class="sign section--bg" data-bg="{{URL::asset('assets/home/img/section/section.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">


                <div class="sign__content">

                    <!-- authorization form -->

                    {!! Form::open(['class'=>'sign__form','url'=>route('home.register.ajax')]) !!}

                    <div id="error"></div>

                    <a href="{{route('home.index')}}" class="sign__logo">
                        <img src="{{URL::asset('assets/home/img/logo.svg')}}" alt="">
                    </a>

                    <div class="sign__group">
                        {!! Form::text('login',null,['class'=>'sign__input','placeholder'=>'Login','required']) !!}

                    </div>
                    <div class="sign__group">
                        {!! Form::email('email',null,['class'=>'sign__input','placeholder'=>'Email','required']) !!}

                    </div>

                    <div class="sign__group">
                        {!! Form::password('password',['class'=>'sign__input','placeholder'=>'Hasło','required']) !!}
                    </div>
                    <div class="sign__group">
                        {!! Form::password('password_confirmation',['class'=>'sign__input','placeholder'=>'Powtórz hasło','required']) !!}
                    </div>

                    {!! Form::submit('Zarejestruj się',['class'=>'sign__btn']) !!}

                    <span class="sign__text">Masz już konto? <a href="{{route('home.login')}}">Zaloguj się!</a></span>
                {!! Form::close() !!}
                <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JS -->
<script src="{{URL::asset('assets/home/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/jquery.mousewheel.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/jquery.mCustomScrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/wNumb.js')}}"></script>
<script src="{{URL::asset('assets/home/js/nouislider.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/plyr.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/jquery.morelines.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/photoswipe.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/photoswipe-ui-default.min.js')}}"></script>
<script src="{{URL::asset('assets/home/js/main.js')}}"></script>
<script>
    var sign__form = $("form.sign__form");
    sign__form.submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: sign__form.attr('action'),
            type: 'POST',
            data: sign__form.serialize(),
            success: function (data) {
                $('#error').empty();
                if(data['error'])
                {
                    $('#error').prepend('<div class="isa_error">' + data['error'] + ' </div>');
                }
                if(data['success']) {
                    $('#error').prepend('<div class="isa_success">' + data['success'] + ' </div>');
                }
            },
            error: function (data) {
                $('#error').empty();
                var l = JSON.parse(data.responseText);
                var i = 0;
                $.each(l['errors'], function (heading, text) {
                    i++;
                    $('#error').prepend('<div class="isa_error">' +text + ' </div>');
                });
            }
        });
    });
</script>
</body>
</html>
