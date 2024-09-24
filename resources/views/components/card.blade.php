<div class="col mb-4">
    <div class="card bonostyle" style="width: 18rem;">
            <h5 class="card-title center pt-2 pb-2 TittleCard ">{{ $gift->name }}</h5>
        <div class="card-body ">
            <div class="row card-img">
                <img src="{{ $gift->urlimage }}" class=" " alt="...">
            </div>
            <p class="card-text ">{{ $gift->description }}</p>
            <p class="card-text ">Fecha de expiración: {{ $gift->expirationDate }}</p>
            <p class="card-text ">Dirección de la empresa: {{ $gift->direccionEmpresa }}</p> <!-- Campo de dirección -->
            <form class="w-100" action="{{ route('reclama.bono', ['id' => $gift->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-hkc w-100">Reclamar</button>
            </form>
        </div>
    </div>
</div>
