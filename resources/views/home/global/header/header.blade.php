<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <!-- header logo -->
                        <a href="{{route('home.index')}}" class="header__logo">
                            <img src="{{URL::asset('assets/home/img/logo.svg')}}" alt="">
                        </a>
                        <!-- end header logo -->

                        <!-- header nav -->
                        <ul class="header__nav">
                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button">Home</a>
                            </li>
                            <!-- end dropdown -->

                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button">Filmy</a>
                            </li>
                            <!-- end dropdown -->

                            <li class="header__nav-item">
                                <a href="pricing.html" class="header__nav-link">Seriale</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="faq.html" class="header__nav-link">Pomoc</a>
                            </li>


                        </ul>
                        <!-- end header nav -->

                        <!-- header auth -->
                        <div class="header__auth">

                            @guest()
                                <a href="{{route('home.login')}}" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>Zaloguj się</span>
                                </a>
                                @else
                                <a href="{{route('home.user')}}" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>{{Auth::user()->login}}</span>
                                </a>

                                @endguest

                        </div>
                        <!-- end header auth -->

                        <!-- header menu btn -->
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- end header menu btn -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>