<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>webprog.io || @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @yield('link')

    <script>
        window.addEventListener("load", () => {
            document.querySelector("#loader").classList.add('hidden')
        })
    </script>
</head>

<body>
    {{-- loader --}}
    <div id="loader">
        <div class="loader"></div>
    </div>
    {{-- end loader --}}

    <div class="{{ request()->is('/') ? '' : 'sub_page' }}">
        <div class="hero_area">
            <div class="bg-box">
                <img src="{{ asset('/images/hero-bg.jpg') }}" alt="">
            </div>
            <!-- header section strats -->
            <header class="header_section">
                <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container">
                        <a class="navbar-brand" href="{{ route('home.index') }}">
                            <span>
                                food.io
                            </span>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home.index') }}">صفحه اصلی</a>
                                </li>
                                <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('product.menu') }}">منو</a>
                                </li>
                                <li class="nav-item {{ request()->is('about-us') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('about.index') }}">درباره ما</a>
                                </li>
                                <li class="nav-item {{ request()->is('contact-us') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('contact.index') }}">تماس باما</a>
                                </li>
                            </ul>
                            <div class="user_option">
                                <a class="cart_link position-relative" href="{{ route('cart.index') }}">
                                    <i class="bi bi-cart-fill text-white fs-5"></i>

                                    {!! session()->has('cart')
                                        ? '<span class="position-absolute top-0 translate-middle badge rounded-pill">' .
                                            count(session()->get('cart')) .
                                            '</span>'
                                        : '' !!}

                                </a>

                                @auth
                                    <a href="{{ route('profile.index') }}" class="btn-auth">
                                        <i class="bi bi-person-fill"></i> <small>پروفایل</small>
                                    </a>
                                @endauth

                                @guest
                                    <a href="{{ route('auth.loginForm') }}" class="btn-auth">
                                        <i class="bi bi-person-fill"></i> <small>ورود / ثبت نام</small>
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->

            @if (request()->is('/'))
                @include('home.slider')
            @endif
        </div>
    </div>
