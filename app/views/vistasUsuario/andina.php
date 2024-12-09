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
        <center>COMIDA ANDINA</center>
    </h1>
</div>

<div class="container">
    <?php
    // Array de datos para las tarjetas
    $cards = [
        [
            'title' => 'Cui frito',
            'image' => '/app/img/cui.png',
            'description' => 'Ají delicioso acompañado de pechuga de gallina deshilachada y especias peruanas.',
            'price' => '$20.00'
        ],
        [
            'title' => 'Pachamanca',
            'image' => '/app/img/pacha.png',
            'description' => 'Saboroso arroz cocinado con pollo, verduras frescas y una mezcla de especias autóctonas.',
            'price' => '$12.00'
        ],
        [
            'title' => 'Rocoto Relleno',
            'image' => '/app/img/roco.png',
            'description' => 'Pimiento rocoto relleno de carne sazonada, una explosión de sabores en cada bocado.',
            'price' => '$10.00'
        ],
        [
            'title' => 'Trucha Frita',
            'image' => '/app/img/trucha.png',
            'description' => 'Trucha frita dorada y crujiente, servida con guarnición de ensalada fresca y limón.',
            'price' => '$12.00'
        ],
        [
            'title' => 'Umitas',
            'image' => '/app/img/umi.png',
            'description' => 'Tamales de maíz suaves y esponjosos, rellenos de carne y especias aromáticas tradicionales.',
            'price' => '$12.00'
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
    <script src="/public/js/scriptsCategoria.js"></script>
</body>

</html>
