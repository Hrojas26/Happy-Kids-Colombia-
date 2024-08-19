<!-- Sidebar -->

<div class="col-md-3">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">DASHBOARD</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            @if(auth()->user()->rol ==='empresa')
                <li class="nav-item">
                    <a href="#create-bonos" class="nav-link active" aria-current="page" onclick="showForm(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#create-bonos"></use></svg>
                        Crea Bonos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#bonos" class="nav-link" onclick="showGifts(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#bonos"></use></svg>
                        Bonos
                    </a>
                </li>
            @else
                <li class="nav-item active">
                    <a href="#user-all" class="nav-link"  onclick="showUsers(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#user-all"></use></svg>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#bonos-all" class="nav-link" onclick="showGiftsAdmin(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#bonos-all"></use></svg>
                        Donaciones
                    </a>
                </li>
            @endif
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#inforation-user" onclick="showUserInfo(this)">Información de Empresa</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
