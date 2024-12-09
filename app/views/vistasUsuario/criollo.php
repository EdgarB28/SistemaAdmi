<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Carrusel</title>
    <link rel="stylesheet" href="/app/css/categorias.css"> <!-- Enlaza tu CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
</head>

<header class="header">
    <nav class="navbar">
        <a class="nav-button" href="../index.php#seccion1">PROMOCIONES</a>
        <a class="nav-button" href="../index.php#seccion2">CATEGORÍAS</a>
        <a class="nav-button" href="#pedidos">PEDIDOS</a>
    </nav>
    <div class="login">
        <button class="login-button" onclick="window.location.href='public/index.php';">Ingresar</button>
    </div>
</header>

<body>
    <div class="titulo">
        <br><br><br><br>
        <h1>
            <center>COMIDA CRIOLLA</center>
        </h1>
    </div>

    <div class="container">
        <?php
        // Array de datos para las tarjetas
        $cards = [
            [
                'title' => 'Ají de Gallina',
                'image' => '/app/img/aji.png',
                'description' => 'Consiste en un ají o crema espesa con pechuga de gallina deshilachada',
                'price' => '$20.00'
            ],
            [
                'title' => 'Arroz con Pollo',
                'image' => '/app/img/arrozconpollo.png',
                'description' => 'Consiste en arroz cocinado con pollo, verduras, y sazonado con especias',
                'price' => '$12.00'
            ],
            [
                'title' => 'Pollo a la Brasa',
                'image' => '/app/img/brasa.png',
                'description' => 'Es considerado un platillo típico en el Perú y uno de los de mayor consumo',
                'price' => '$10.00'
            ],
            [
                'title' => 'Caucau',
                'image' => '/app/img/caucau.png',
                'description' => 'El cau cau es un guiso de la gastronomía peruana a base de mondongo y papas',
                'price' => '$12.00'
            ],
            [
                'title' => 'Chaufa de Pollo/Carne',
                'image' => '/app/img/chaufa.png',
                'description' => 'Arroz chino elaborado en Perú , platillo bandera de la gastronomia Peruana',
                'price' => '$12.00'
            ],
            [
                'title' => 'Chicharrón',
                'image' => '/app/img/chicharron.png',
                'description' => 'Trocitos de pescado marinado con aharina y huevo',
                'price' => '$43.00'
            ],
            [
                'title' => 'Tallarines Verdes',
                'image' => '/app/img/verdes.png',
                'description' => 'Tallarines bañados en pasta verde , con pieza de carne',
                'price' => '$54.00'
            ],
        ];

        // Generar las tarjetas
        foreach ($cards as $card) {
            echo '<div class="card-horizontal">';
            echo '<img src="' . $card['image'] . '" alt="' . $card['title'] . '">';
            echo '<div class="card-content">';
            echo '<h3>' . $card['title'] . '</h3>';
            echo '<p>' . $card['description'] . '</p>';
            echo '<p class="price">' . $card['price'] . '</p>';
            echo '</div>'; // Cierra card-content
            echo '<button class="aña-button" data-title="' . htmlspecialchars($card['title']) . '" data-price="' . htmlspecialchars($card['price']) . '" data-image="' . htmlspecialchars($card['image']) . '">+</button>';
            echo '</div>'; // Cierra card-horizontal
        }
        ?>
    </div>

    <div id="cart" class="cart-hidden">
        <h2>Carrito de Compras</h2>
        <button id="close-cart">Cerrar</button>
        <ul id="cart-items"></ul>
    </div>
    <div class="overlay"></div>
    <!--<script src="/js/scripts.js"></script>-->
</body>

</html>
