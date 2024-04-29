<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
    @if(auth()->user()->rol ==='empresa')
    <a class="navbar-brand" href="{{ route('gifts.all') }}">
                    {{ config('app.name', 'Laravel') }}
    </a>
    @elseif(auth()->user()->rol ==='admin' )
    <a class="navbar-brand" href="{{ route('user.all') }}">
                    {{ config('app.name', 'Laravel') }}
    </a>
    @endif

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
            </ul>
        </div>
    </div>
</nav>
