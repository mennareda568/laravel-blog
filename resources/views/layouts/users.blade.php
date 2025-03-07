<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Blog System </title>

    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/style.css') }} />
</head>

<body>

    <main>

        <!-- ################# Header Starts Here#######################--->

        <header id="menu-jk">

            <div id="nav-head" class="header-nav">
                <div class="container">
                    <div class="row">
                     
                        <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#contact_us">Contact Us</a></li>
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                 

                                @endguest

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </header>


        <section>
            @yield('content')
        </section>

    </main>

</body>

<script src={{ asset('js/jquery-3.2.1.min.js') }}></script>
<script src={{ asset('js/popper.min.js') }}></script>
<script src={{ asset('js/bootstrap.min.js') }}></script>

</html>
