<!-- Sidebar -->

<div class="col-md-3">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="20" height="0"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Administrar HKC  </span>
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
                <li class="nav-item">
                    <a href="#user-all" class="nav-link"  onclick="showUsers(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#user-all"></use></svg>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#create-user-admin-page" class="nav-link" aria-current="page" onclick="CreateUserAdmin(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#create-user-admin-page"></use></svg>
                        Crear usuario
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#ver-bonos" class="nav-link" aria-current="page" onclick="ShowAllBonos(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#ver-bonos"></use></svg>
                        Bonos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#create-bonos-two" class="nav-link" aria-current="page" onclick="showFormAdmin(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#create-bonos-two"></use></svg>
                        Crear Bonos
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#donaciones-all" class="nav-link active" onclick="showEstadoDonaciones(this)">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#donaciones-all"></use></svg>
                        Donaciones
                    </a>
                     <!-- Submenú que se desplegará al hacer clic en Donaciones -->
                     <div class="collapse" id="donacionesSubmenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="#sub-opcion-1" class="nav-link" onclick="showSubOpcion1(this)">
                                    Sub-Opción 1
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sub-opcion-2" class="nav-link" onclick="showSubOpcion2(this)">
                                    Sub-Opción 2
                                </a>
                            </li>
                        </ul>
                    </div>

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
