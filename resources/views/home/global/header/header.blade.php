<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <!-- header logo -->
                        <a href="index.html" class="header__logo">
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
                                <a href="signin.html" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>Zarejestruj się</span>
                                </a>
                                @else
                                <li class="header__nav-item">
                                    <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<i class="icon ion-ios-arrow-down"></i></a>

                                    <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                        <li><a href="catalog1.html">Catalog Grid</a></li>
                                        <li><a href="catalog2.html">Catalog List</a></li>
                                        <li><a href="details1.html">Details Movie</a></li>
                                        <li><a href="{{ route('logout') }}">Wyloguj</a></li>
                                    </ul>
                                </li>
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

    <!-- header search -->
    <form action="#" class="header__search">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" placeholder="Search for a movie, TV Series that you are looking for">

                        <button type="button">search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
</header>