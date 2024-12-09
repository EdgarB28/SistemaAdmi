<?php include("template/cabecera.php"); ?>



<section id="seccion1">
    <br>
    <div class="container1">
        <div class="social-list">
            <ul>
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i> </a></li>
                <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

        <div class="carousel">
            <div class="carousel-images">
                <img src="../app/img/p1.jpg" alt="Imagen 1">
                <img src="../app/img/p2.jpg" alt="Imagen 2">

            </div>
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>

        <div class="social-list">
            <ul>
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</section>
<!-- <script src="js/scripts.js"></script> Enlaza tu JavaScript -->


<section id="seccion2">


    <h1>NUESTRAS MEJORES CATEGORÍAS</h1>
    <div class="container">

        <?php
        // Array de datos para las tarjetas
        $cards = [
            ['title' => 'Comida Criolla',  'image' => '../app/img/criolla.png', 'url' => '../app/views/vistasUsuario/criollo.php'],
            ['title' => 'Comida de la Selva', 'image' => '../app/img/selva.png', 'url' => '../app/views/vistasUsuario/selva.php'],
            ['title' => 'Comida Andina',  'image' => '../app/img/andina.png', 'url' => '../app/views/vistasUsuario/andina.php'],
            ['title' => 'Comida Marina', 'image' => '../app/img/marina.png', 'url' => '../app/views/vistasUsuario/criollo.php'],
        ];

        // Generar las tarjetas
        foreach ($cards as $card) {
            echo '<div class="card">';
            echo '<img src="' . $card['image'] . '" alt="' . $card['title'] . '">';
            echo '<h3>' . $card['title'] . '</h3>';

            // Bloque de estrellas
            echo '<div class="stars">';
            for ($i = 0; $i < 5; $i++) {
                echo '<span class="star">★</span>'; // Estrella llena
            }
            echo '</div>';
            echo '<a href="' . $card['url'] . '" class="ver-button"> Ver más</a>'; // Botón "Ver más" como enlace
            echo '</div>';
        }
        ?>
    </div>
</section>


<!-- <script src="js/scripts.js"></script> Incluir el archivo JavaScript -->
