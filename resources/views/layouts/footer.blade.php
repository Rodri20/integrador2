<!-- resources/views/layouts/footer.blade.php -->
</div>
<!-- Content End -->

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
                    &copy; <a class="border-bottom" href="#"> Mister Burger</a>,   Todos los Derechos Reservados.
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

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}" defer></script>
<script src="{{ asset('lib/easing/easing.min.js') }}" defer></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}" defer></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}" defer></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}" defer></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}" defer></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}" defer></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>