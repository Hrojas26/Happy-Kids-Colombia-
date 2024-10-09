@include('components.headerPage')
{{-- popup --}}
{{-- @include('components.Popup', ['popUpId' => 'PopUpHome','title' => '¡Interactua con nuestros objetos 3D!','videoUrl' => asset('img/robot.mp4'),'modalDescripcion' => 'explora nuestra web y juega con nuestros objetos 3D, oprime y arrastra.']) --}}
{{-- popup end --}}

<div class="rox">

    <div class="row">
        <div class="col-12 px-0">
            <img class="img-fluid w-100" src="{{ asset('img/1.jpg') }}" alt="...">
            <div id="container3D">
            </div>
            <div class="card w-40 cardbanner">
                <!-- Ejemplo de uso en una vista Blade -->
                <div class="card-body">
                  <h3 class="card-title">Happy Kids Colombia</h3>
                  <p class="card-text fs-5">"Somos la única plataforma web que te permite ver en tiempo real el recorrido de tus donaciones."</p>
                  <a href="{{ route('donaRegalo') }}" class="btn btn-dark">DONAR</a>
                </div>
              </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="rox">
        </div>
        {{-- Carrousel para usar --}}
        {{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-wrap="true">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
        {{-- Carrousel para usar end --}}
    </div>
<!-- Caja de Donaciones Totales -->
    <div class="row">
        <div class="row">
            <h3 class="text-center mt-5" >¿Cómo funciona happy kids colombia?</h3>
            <p class="text-center ">Te explicaremos cómo funciona Happy Kids Colombia y cómo puedes participar en este proyecto como donante.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4 mt-0">
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">1. Registrate</h5>
                  <p class="card-text">Crea tu cuenta en nuestra plataforma para empezar a donar. Completa el formulario con tus datos y únete a la comunidad de donantes.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card2.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">2. Dona Juguetes</h5>
                  <p class="card-text">Dona tus juguetes. No importa si son nuevos o usados, ya sea uno o muchos; tu contribución hará una gran diferencia en la vida de los niños.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card3.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">3. Reclama tu Bono</h5>
                  <p class="card-text">Si has donado 10 juguetes, podrás reclamar un bono de descuento en diferentes establecimientos disponibles. ¡Aprovecha esta recompensa por tu generosidad!</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card grow-on-hover">
                <img src="{{ asset('img/card4.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">4. Canjea tu Bono</h5>
                  <p class="card-text">Te enviaremos el bono a tu correo. Úsalo en diferentes establecimientos de tu elección y disfruta de descuentos especiales. ¡Gracias a ti por ser parte de este proyecto y por hacer feliz a un niño!</p>
                </div>
              </div>
            </div>
        </div>
    </div>

</div>


@include('components.section')
@include('components.slick')
@include('components.footerPage')
