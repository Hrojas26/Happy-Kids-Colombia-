<div class="card" style="width: 18rem;">
  <h5 class="card-title">{{ $gift->name }}</h5>
  <div class="card-body">
    <img src="{{ $gift->urlimage }}" class="card-img-top" alt="...">
    <p class="card-text">{{ $gift->description }}</p>
    <p class="card-text">Empresa: {{ $gift->company }}</p>
    <p class="card-text">Fecha de expiración: {{ $gift->expirationDate }}</p>
    <a href="#" class="btn btn-primary">Reclama</a>
  </div>
</div>
