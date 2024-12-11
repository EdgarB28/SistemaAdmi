<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Carrusel</title>
    <link rel="stylesheet" href="/app/css/categorias.css"> <!-- Enlaza tu CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome -->
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
        <!-- <h1>
            <center>COMIDA ANDINA</center>
        </h1>-->
    </div>

    <div class="container">
        <?php
    if (isset($_GET['codCategoria'])) {
        $codCategoria = htmlspecialchars($_GET['codCategoria'], ENT_QUOTES, 'UTF-8');
    } else {
        $codCategoria = null;
    }
    ?>


    </div>


    <div id="cart" class="cart-hidden">
        <h2>Carrito de Compras</h2>
        <button id="close-cart">Cerrar</button>
        <ul id="cart-items"></ul>
    </div>
    <div id="carrito-flotante">
        <span id="icono-carrito">🛒</span>
        <div id="contenido-carrito">
            <p>Tu carrito está vacío</p>
            <button id="ver-carrito">Ver carrito</button>
        </div>
    </div>



    <div class="overlay"></div>
    <script src="/public/js/scriptsCategoria.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(async function() {
        $('#ver-carrito').on('click', function() {
            //funciones del carrito
        });

        const codCategoria = "<?php echo $codCategoria; ?>";

        if (codCategoria) {
            listarProducto(codCategoria);
        } else {
            console.error("No se recibió un código de categoría válido.");
        }
    });


    function listarProducto(codCategoria) {
        $.ajax({
            type: 'POST',
            url: '/app/controller/controladorProducto.php',
            data: {
                accion: 'listarProducto',
                idCategoria: codCategoria,
                monto: 0
            },
            dataType: 'json',

            success: function(resultados) {
                console.log(resultados);
                let container = $('.container');
                container.empty();

                resultados.productos.forEach(function(productos) {
                        let cardHTML = `
                    <div class="card-horizontal">
                        <img src="${productos.dir_img}" alt="${productos.nombre}">
                        <div class="card-content">
                            <h3>${productos.nombre}</h3>
                            <p>${productos.descrip}</p>
                            <p class="price">${productos.precio}</p>
                        </div>
                        <button class="aña-button" data-title="${productos.nombre}">Añadir</button>
                    </div>`;
                        container.append(cardHTML);
                    });
            },
            complete: function() {}
        });
    }
    </script>



</body>

</html>