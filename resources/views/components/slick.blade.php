
<div class="container">
    <p style="font-size: 22px; text-decoration-color:#B686D2 !important;" class="text-center text-decoration-underline mt-4"> Empresas Aliadas</p>

    <div class="slider-marcas">

        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/promo1.png') }}" alt="">
        </div>
        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/promo2.png') }}" alt="">
        </div>
        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/promo3.png') }}" alt="">
        </div>
        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/promo4.png') }}" alt="">
        </div>
        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/promo5.png') }}" alt="">
        </div>
        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/promo6.png') }}" alt="">
        </div>
        <div class="boxMarcas"> 
            <img class="img-marcas" src="{{ asset('img/estampados.png') }}" alt="">
        </div>
        <div class="boxMarcas">
            <img class="img-marcas" src="{{ asset('img/americanlogo.png') }}" alt="">
        </div> 

    </div>

</div>


<!-- Envuelve tu código JavaScript dentro de $(document).ready() -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.slider-marcas').slick({
            slidesToShow: 4,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
            centerMode: true,
            prevArrow: '<button class="custom-slick-prev"><i class="fas fa-chevron-left fa-beat"></i></button>',
            nextArrow: '<button class="custom-slick-next"><i class="fas fa-chevron-right"></i></button>'
        });
    });
</script>

