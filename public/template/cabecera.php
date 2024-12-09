<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Carrusel</title>
    <link rel="stylesheet" href="../app/css/inicio.css"> <!-- Enlaza tu CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a class="nav-button" href="#seccion1" onclick="smoothScroll(event, 'seccion1')">PROMOCIONES</a>
            <a class="nav-button" href="#seccion2" onclick="smoothScroll(event, 'seccion2')">CATEGORÍAS</a>
            <a class="nav-button" href="#pedidos" onclick="smoothScroll(event, 'pedidos')">PEDIDOS</a>
        </nav>
        <div class="login">
            <button class="login-button" onclick="window.location.href='/app/views/login.php';">Ingresar</button>
        </div>
    </header>