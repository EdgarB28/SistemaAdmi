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


<section id="seccion2">


    <h1>NUESTRAS MEJORES CATEGORÍAS</h1>
    <div class="container">
    </div>

</section>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    listarCategorias();
});


function listarCategorias() {
    $.ajax({
        type: 'POST',
        url: '/app/controller/controladorCategorias.php',
        data: {
            accion: 'listarCategorias'
        },
        dataType: 'json',

        success: function(categorias) {

            
            let container = $('.container');
            container.empty();

            categorias.forEach(function(categoria) {
                const img = categoria.dir_img;
                const estado = categoria.estado;

                if (img != null) {
                    if (estado == 'ACTIVO') {
                        let cardHTML = `
                    <div class="card">
                        <img src="${categoria.dir_img}" alt="${categoria.nombre}">
                        <h3>${categoria.nombre}</h3>
                        <div class="stars">
                            ${'★'.repeat(5)}
                        </div>
                        <button onclick="actualizarVistaProductos(${categoria.idCategoria});" class="ver-button">Ver más</button>
                    </div>`;
                        container.append(cardHTML);
                    }
                }

            });
        },
        complete: function() {}
    });
}

function actualizarVistaProductos(codCategoria) {
    window.location.href = `/app/views/vistasUsuario/vistaProductos.php?codCategoria=${codCategoria}`;
}
</script>

</body>