<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Mister Burger</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

                <!-- Favicon -->
                <link href="img/icon-burg2.png" rel="icon">

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



     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        
    </head>
    <body >

        <div class="container-xxl bg-white p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Cocinando...</span>
                </div>
            </div>
            <!-- Spinner End -->
            <!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa-solid fa-burger"></i>Mr Burger</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ url('/') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px;     text-align: left;"><i class="fa-solid fa-house fa-lg" style="color: #fea116; "></i></a>
                <a href="{{ url('/nosotros') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px;     text-align: left;">Nosotros</a>
                <a href="{{ url('/servicios') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px;     text-align: left;">Servicios</a>
                <a href="{{ url('/menu') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px;     text-align: left;">Nuestra Carta</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                    style="border-bottom-width: 0em; height: max-content; border: none; padding: 5px 0; margin: 29px; text-align: left;" data-bs-toggle="dropdown">Blog</a>
                    <div class="dropdown-menu m-0" style="border-radius: 12px; min-width: 4rem;  background-color: #202d4d;">
                        <a href="{{ url('/nuestro_equipo') }}" class="dropdown-item"  style="color: #fea116; border-bottom-width: 0em; height: max-content; border: none; margin-top: 0px; text-align: left;">Nuestro Equipo</a>
                        <a href="{{ url('/testimonios') }}" class="dropdown-item" style="color: #fea116; border-bottom-width: 0em; height: max-content; margin-top: 0px; text-align: left;">Testimonios</a>
                    </div>
                </div>
                <a href="{{ url('/contacto') }}" class="btn btn-sm btn-outline-light" style="border-bottom-width: 0em; height: max-content; border: none; margin-top: 30px;     text-align: left;">Contacto</a>
            </div>
            <div class="d-flex align-items-center ms-lg-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-sm btn-outline-light me-2" style="border: none;">Dashboard</a>
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
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-light" style="border: none; ">Register</a>
                        @endif --}}
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Disfruta de Nuestro<br>Deliciosa burger</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Escoge las mejores hamburguesas artesanales, que preparados con productos de primera calidad.</p>
                    <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Reserva su Pedido</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="img/hyy.png" alt="" style="height: 600px; width: 600px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

            
        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Maestros de cocina</h5>
                                <p>Los maestros son especialistas en alta cocina y comida saludable.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa-solid fa-burger text-primary mb-4" style="font-size: 50px;"></i>

                                <h5>Comida de calidad</h5>
                                <p>La calidad de nuestra comida es lo que nos caracteriza en comparación con la competencia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Pedido en línea</h5>
                                <p>Compra ahora y la entrega será de manera inmediata.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Servicio 24/7</h5>
                                <p>Nuestra hora de atención es las 24 horas de los 7 días de la semana.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/habur-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/plato-hamburguesas.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Sobre nosotros</h5>
                        <h1 class="mb-4">Bienvenido a<i class="fa-solid fa-burger fa-lg" style="color: #fea116;"></i>Hamburguesería</h1>
                        <p class="mb-4">En Mr Burger, nos dedicamos a ofrecer hamburguesas artesanales de alta calidad, utilizando ingredientes 
                            frescos para crear combinaciones únicas y deliciosas. Nuestra misión es proporcionar una experiencia de compra conveniente
                             y satisfactoria, tanto en línea como en nuestras sucursales físicas.</p>
                        <p class="mb-4">Nos destacamos por mantener altos estándares de calidad y un excelente servicio al cliente. Aspiramos a ser líderes 
                            en el mercado de hamburguesas artesanales.
                        </p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Años de </p>
                                        <h6 class="text-uppercase mb-0">EXPERIENCIA</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">MAESTROS COCINEROS</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">El Menu</h5>
                    <h1 class="mb-5">Productos más populares</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach($categories as $index => $category)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $index === 0 ? 'active' : '' }}" data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                                <!-- Condicional para iconos -->
                                @if($category->name === 'Clásicos')
                                    <i class="fa-solid fa-2x fa-burger-cheese"></i>
                                @elseif($category->name === 'Especiales')
                                    <i class="fa-solid fa-burger-soda fa-2x text-primary"></i>
                                @elseif($category->name === 'Bebidas')
                                     <i class="fa-solid fa-2x fa-cup-straw-swoosh"></i>
                                @else
                                    <i class="fa-solid fa-utensils fa-2x text-primary"></i> <!-- Icono por defecto -->
                                @endif
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">{{ $category->name }}</h6>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($categories as $index => $category)
                        <div id="tab-{{ $category->id }}" class="tab-pane fade {{ $index === 0 ? 'show active' : '' }} p-0">
                            <div class="row g-4">
                                @foreach($category->products as $product)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{ $product->name }}</span>
                                                <span class="text-primary fw-bold">${{ $product->price }}</span>
                                            </h5>
                                            <small class="fst-italic">{{ $product->description }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->



        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservación</h5>
                        <h1 class="text-white mb-4">Reserve en línea</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Correo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="datetime">Fecha & Tiempo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select1">
                                          <option value="1">Personas 1</option>
                                          <option value="2">Personas 2</option>
                                          <option value="3">Personas 3</option>
                                        </select>
                                        <label for="select1">Número de personas</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                        <label for="message">Solicitud especial</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Reservar ahora</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Integrantes del Desarrollado</h5>
                    <h1 class="mb-5">Los Programadores</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/serg.png" alt="Imagen del equipo">
                            </div>
                            <h5 class="mb-0">Sergio Luis Alvarez Miranda</h5>
                            <small>Desarrollador</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/Luiss.png" alt="">
                            </div>
                            <h5 class="mb-0">Luis Rodrigo Mora Torres</h5>
                            <small>Desarrollador</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/david.jpg" alt="" style="width: 83.4%">
                            </div>
                            <h5 class="mb-0">David Dominguez Ladera</h5>
                            <small>Desarrollador</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="img/Hiad.png" alt="" style="width: 83.4%">
                            </div>
                            <h5 class="mb-0">Hiad Javier Palomino Vivanco</h5>
                            <small>Desarrollador</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->



        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Empresa</h4>
                        <a class="btn btn-link" href="">Sobre nosotros</a>
                        <a class="btn btn-link" href="">Contacta con nosotros</a>
                        <a class="btn btn-link" href="">Reserva</a>
                        <a class="btn btn-link" href="">Política de privacidad</a>
                        <a class="btn btn-link" href="">Términos y Condiciones</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contactanos</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Calle 123, Surco.</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+51 2345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>MisterBur@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Apertura</h4>
                        <h5 class="text-light fw-normal">Lunes- Sabado</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Domingo</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Boletin informativo</h4>
                        <p>Somos una empresa que pertenece al sector alimenticio</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Correo">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Inscribirse</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#"> Mr Burger</a>,   Todos los Derechos Reservados.
                            {{-- <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br> --}}
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Inicio</a>
                                <a href="">Ayuda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" 
        style="border-radius: 50%;
               width: 60px; 
               height: 60px; 
               display: flex; 
               justify-content: center; 
               align-items: center;">
       <i class="fa-solid fa-arrow-up-short-wide"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/adfd87b550.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib//wow/wow.min.js') }}" defer></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}" defer></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}" defer></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}" defer></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}" defer></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}" defer></script>
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
   <!-- Template Javascript -->
  <script src="{{ asset('js/main.js') }}" defer></script>
        
</body>

</html>
