<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><h4 class="text-left">Home</h4></a>
        <a class="navbar-brand" href="/email" style="color:#777"><h4 class="text-left">Soporte</h4></a>
        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer; float: right">
                Cerrar sesión
            </button>
        </form>
    </div>
</nav>
