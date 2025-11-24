
<aside class="sidebar">

    <div class="sidebar-header">
        <img src="{{ asset('img/smiledublack.png') }}" class="sidebar-logo">
       <!-- <h2 class="sidebar-title">smiledu</h2>-->
    </div>

    <nav class="sidebar-menu">
        <a href="./dashboard" class="menu-item">
            <img src="{{ asset('img/inicio.png') }}" class="inicio">
            Inicio
        </a>

        <a href="./docentes" class="menu-item">
            <img src="{{ asset('img/docentes.png') }}" class="docentes">
            Docentes
        </a>

        <a href="./alumnos" class="menu-item">
            <img src="{{ asset('img/alumnos.png') }}" class="alumnos">
            Alumnos
        </a>

        <a href="./cursos" class="menu-item">
            <img src="{{ asset('img/cursos.png') }}" class="cursos">
            Cursos
        </a>

        <a href="./matriculas" class="menu-item">
            <img src="{{ asset('img/matriculas.png') }}" class="matriculas">
            Matrículas
        </a>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                <!--<img src="{{ asset('img/cerrarsesion.png') }}" class="close">-->
                 Cerrar Sesión
            </button>
        </form>
    </div>

</aside>
