@extends('layouts.app')

@section('content')
<h1 class="title">Inicio</h1>

<div class="banner">
    <img src="{{ asset('img/bannerinicio.png') }}" class="bannerinicio">
    <p> Aquí se mostrara los datos totales generados</p>
</div>

<div class="cards-container">

    <div class="card card-docentes">
        <h3>Docentes</h3>
        <img src="{{ asset('img/docentes01.png') }}" class="docentes">
        <p class="number">50</p>
    </div>

    <div class="card card-alumnos">
        <h3>Alumnos</h3>
        <img src="{{ asset('img/alumnos02.png') }}" class="alumnos">
        <p class="number">8</p>
    </div>

    <div class="card card-cursos">
        <h3>Cursos</h3>
        <img src="{{ asset('img/cursos03.png') }}" class="cursos">
        <p class="number">12</p>
    </div>

    <div class="card card-matriculas">
        <h3>Matrículas</h3>
        <img src="{{ asset('img/matriculas04.png') }}" class="matroculas">
        <p class="number">40</p>
    </div>

</div>

<!-- dentro de tu .charts-container -->
<div class="charts-container">
    <div class="chart-box">
        <h4>Alumnos aprobados por año</h4>
        <canvas id="barStudentsChart" width="300" height="600"></canvas>
    </div>

    <div class="chart-box">
        <h4>Distribución por cursos</h4>
        <canvas id="doughnutCoursesChart" width="400" height="600"></canvas>
    </div>
</div>


@endsection
