<!-- resources/views/layouts/header.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Laravel')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/hamburguesa-icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/adfd87b550.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa-solid fa-burger"></i>Mister Burger</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ url('/') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px; text-align: left;"><i class="fa-solid fa-house fa-lg" style="color: #fea116; "></i></a>
                <a href="{{ url('/nosotros') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px; text-align: left;">Nosotros</a>
                <a href="{{ url('/servicios') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px;  text-align: left;">Servicios</a>
                <a href="{{ url('/menu') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px; text-align: left;">Nuestra Carta</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                    style="border-bottom-width: 0em; height: max-content; border: none; padding: 5px 0; margin: 29px; text-align: left;" data-bs-toggle="dropdown">Blog</a>
                    <div class="dropdown-menu m-0" style="border-radius: 12px; min-width: 4rem;  background-color: #202d4d;">
                        <a href="{{ url('/nuestro_equipo') }}" class="dropdown-item"  style="color: #fea116; border-bottom-width: 0em; height: max-content; border: none; margin-top: 0px; text-align: left;">Nuestro Equipo</a>
                        <a href="{{ url('/testimonios') }}" class="dropdown-item" style="color: #fea116; border-bottom-width: 0em; height: max-content; margin-top: 0px; text-align: left;">Testimonios</a>
                    </div>
                </div>
                <a href="{{ url('/contacto') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px; text-align: left;">Contacto</a>
            </div>
            <div class="d-flex align-items-center ms-lg-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}"  class="btn btn-sm btn-outline-light me-2" style="border: none;">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light" style="border: none;"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-to-bracket fa-lg" style="color: #fea116;"></i>
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light me-2" style="margin-left: 2px;  border: none;"><i class="fa-solid fa-user fa-lg" style="color: #fea116;"></i></a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-light" style="border: none;">Register</a>
                        @endif --}}
                    @endauth
                @endif
            </div>
        </div>
    </nav>


<!-- Navbar & Hero End -->


    <!-- Content Start -->
    <div class="container">
