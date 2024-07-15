@extends('layouts.app')
@section('title', 'Nosotros')
@section('content')
        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonios</h5>
            <h1 class="mb-5">¡Nuestros Clientes Dicen!</h1>
        </div>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $testimonials = [
                        ['name' => 'Tasty Sevilla', 'date' => '29 Junio 2024', 'review' => 'Una opción más para tomar burgers en pleno centro. Están ricas pero hay muchísima competencia y cada vez con más nivel.', 'img' => 'img/testimonial-1.jpg'],
                        ['name' => 'Antonio Jimenez Solano', 'date' => '15 Junio 2024', 'review' => 'Buena Comida y ambiente agradable en Familia.', 'img' => 'img/testimonial-2.jpg'],
                        ['name' => 'Inés', 'date' => '8 Mayo 2024', 'review' => 'Las hamburguesas son increíbles. Con una variedad de panes, de guarnición (las papas vienen incluidas) y carta con propuestas muy vanguardistas.', 'img' => 'img/testimonial-3.jpg'],
                        ['name' => 'Lukáš Machek', 'date' => '5 Mayo 2024', 'review' => 'Hermoso', 'img' => 'img/testimonial-4.jpg'],
                        // Agrega más reseñas aquí
                        ['name' => 'María Pérez', 'date' => '1 Julio 2024', 'review' => 'Excelente servicio y comida deliciosa.', 'img' => 'img/testimonial-5.jpg'],
                        ['name' => 'Juan González', 'date' => '3 Julio 2024', 'review' => 'Ambiente muy acogedor y personal amable.', 'img' => 'img/testimonial-6.jpg'],
                        ['name' => 'Laura Martínez', 'date' => '5 Julio 2024', 'review' => 'Las mejores hamburguesas que he probado.', 'img' => 'img/testimonial-7.jpg'],
                        ['name' => 'Carlos López', 'date' => '7 Julio 2024', 'review' => 'Me encanta este lugar, siempre vuelvo.', 'img' => 'img/testimonial-8.jpg'],
                        ['name' => 'Ana García', 'date' => '9 Julio 2024', 'review' => 'Calidad y precio inmejorables.', 'img' => 'img/testimonial-9.jpg'],
                        ['name' => 'Miguel Hernández', 'date' => '11 Julio 2024', 'review' => 'Muy recomendable para una cena familiar.', 'img' => 'img/testimonial-10.jpg'],
                        ['name' => 'Sofía Rodríguez', 'date' => '13 Julio 2024', 'review' => 'Volveré sin dudarlo, todo excelente.', 'img' => 'img/testimonial-11.jpg'],
                        ['name' => 'David Fernández', 'date' => '15 Julio 2024', 'review' => 'Comida de calidad y atención rápida.', 'img' => 'img/testimonial-12.jpg'],
                        ['name' => 'Elena Ramírez', 'date' => '17 Julio 2024', 'review' => 'Un lugar perfecto para compartir con amigos.', 'img' => 'img/testimonial-13.jpg'],
                        ['name' => 'Pedro Morales', 'date' => '19 Julio 2024', 'review' => 'La mejor experiencia gastronómica.', 'img' => 'img/testimonial-14.jpg'],
                        ['name' => 'Julia Díaz', 'date' => '21 Julio 2024', 'review' => 'Delicioso, repetiré sin duda.', 'img' => 'img/testimonial-15.jpg'],
                    ];
                @endphp

                @foreach(array_chunk($testimonials, 3) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($chunk as $testimonial)
                        <div class="col-md-4">
                            <div class="testimonial-item bg-transparent border rounded p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="img-fluid rounded-circle me-3" src="{{ $testimonial['img'] }}" alt="{{ $testimonial['name'] }}" style="width: 50px; height: 50px;">
                                    <div>
                                        <h5 class="mb-0">{{ $testimonial['name'] }}</h5>
                                        <small>{{ $testimonial['date'] }}</small>
                                    </div>
                                </div>
                                <p>{{ $testimonial['review'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
</div>
        <!-- Testimonial End -->
@endsection