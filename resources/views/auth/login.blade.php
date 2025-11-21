<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Iniciar Sesión | SmileDu</title>

    <!-- FUENTE KUMBH SANS -->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ARCHIVO CSS DEL LOGIN -->
    @vite(['resources/css/login.css', 'resources/js/app.js'])
</head>

<body>

<div class="login-container">
    <div class="login-card">

        <!-- Sección Izquierda (Logo + Degradado) -->
        <div class="left-box">
            <img src="{{ asset('img/isoblack.png') }}" alt="SmileDu Logo">
        </div>

        <!-- Formulario -->
        <div class="right-box">

            <h2>¡Hola, Bienvenid@!</h2>
            <p class="subtitle">Inicia Sesión</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <label for="email">Correo *</label>
                <input id="email" type="email" name="email" class="input-field"
                       placeholder="tucorreo@smiledu.pe" required>

                <!-- PASSWORD -->
                <label for="password">Contraseña *</label>
                <input id="password" type="password" name="password" class="input-field" placeholder="12345678"required>

                <button type="submit" class="btn-login">Iniciar Sesión</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>


