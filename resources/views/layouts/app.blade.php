<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Vite solo para js -->
    @vite(['resources/js/app.js'])

    <!-- Tu css del dashboard -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>SmileDu – Dashboard</title>
</head>

<body>

<div class="dashboard-container">

    @include('partials.sidebar')

    <main class="main-content">
        @yield('content')
    </main>

</div>

</body>
</html>



