<!-- FOOTER ================================================== -->
<!-- SHAPE
  ================================================== -->
<div class="position-relative mt-n8">
    <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
        <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0V480H2880V0H2160Z" fill="currentColor" />
        </svg>
    </div>
</div>
<footer class="py-8 py-md-11 shadow bg-gray-200">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 text-center">

                <a class="navbar-brand" style="color:var(--green);" href="{{ route('home') }}">
                    {{ config('app.name') }}
                </a>

                <ul class="list-unstyled list-inline list-social mb-6 mb-md-0 text-center">
                    <li class="list-inline-item list-social-item mr-3">
                        <a href="#!" class="text-decoration-none">
                            <i class="fab fa-instagram" style='color:#e1306c;'></i>
                        </a>
                    </li>
                    <li class="list-inline-item list-social-item mr-3">
                        <a href="#!" class="text-decoration-none">
                            <i class="fab fa-facebook" style='color:#3b5998;'></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-2 col-lg-2">
            </div>
            <div class="col-12 col-md-3 col-lg-3">

                <h6 class="font-weight-bold text-uppercase text-gray-700 border-bottom">
                    Contactenos
                </h6>

                <ul class="list-unstyled text-muted mb-0">
                    <li class="mb-3">
                        <a class="text-reset text-bold" href="tel:573104659572" style="text-decoration:none;">
                            <i class="fas fa-phone-alt"></i> (+57) 310 465 9572 </a>
                    </li>
                    <li class="mb-3">
                        <a class="d-none d-lg-block" style="color:#25d366;text-decoration:none;font-weight:bold;" href="https://web.whatsapp.com/send?phone=573104659572&text=Hola%20CIVILSA" target="_blank">
                            <i class="fab fa-whatsapp" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Da clic aquí!"></i>
                            Hablemos en Whatsapp !
                        </a>
                        <a class="d-block d-sm-none" style="color:#25d366;text-decoration:none;font-weight:bold;" href="https://api.whatsapp.com/send?phone=573104659572&text=Hola%20CIVILSA" target="_blank">
                            <i class="fab fa-whatsapp" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Da clic aquí!"></i>
                            Hablemos en Whatsapp !
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <ul class="list-unstyled text-muted mb-0">
                    <h6 class="font-weight-bold text-uppercase text-gray-700 border-bottom">
                        Encuentranos en
                    </h6>
                    <li class="mb-3">
                        <p href="#!" class="href text-reset">
                            <i class="fas fa-map-pin"></i> Medellín (Ant.)
                        </p>
                    </li>
                    <li class="mb-3">
                        <p href="#!" class="href text-reset">
                            <i class="fas fa-map-marker-alt"></i> Carrera 59 # 27B - 387
                        </p>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>

<div class="bg-gray-200 container-fluid footer-bg2" style="background-image: url('/img/grafico-bg.svg');">
    <div class="row">
        <div class="col-lg-12 text-right">
            <div class="copyright">
                <p class="font-weight-bold">© {{ config('app.name') }} | {{ date('Y') }} Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</div>
<a href="#" class="back-to-top"><i class="fas fa-chevron-up floating"></i></a>