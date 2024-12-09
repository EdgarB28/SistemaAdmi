<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css">

   
    
  </head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button id="botonBarra" class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">PANEL</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li id="bntPerfil" class="sidebar-link">
                    <a href="vistasAdministrador/vistaPerfil.html" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>PERFIL</span>
                    </a>
                </li>
                <li id="bntCategoria" class="sidebar-item">
                    <a href="vistasAdministrador/vistaCategorias.html" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>CATEGORIAS</span>
                    </a>
                </li>
                <li id="bntProductos" class="sidebar-item">
                    <a href="vistasAdministrador/vistaProductos.html" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>PRODUCTOS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                 <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                        <i class="lni lni-layout"></i>
                    <span>REPORTES</span>
                 </a>
                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                        <li id="reporteVentas" class="sidebar-item">
                        <a href="vistasAdministrador/vistaReporteVentas.html" class="sidebar-link">VENTAS</a>
                        </li>
                         <li id="reporteProductos" class="sidebar-item">
                        <a href="vistasAdministrador/vistaReporteProducto.html" class="sidebar-link">PRODUCTOS</a>
                        </li>
                     </ul>
                </li>
                <li id="bntPedidos" class="sidebar-item">
                    <a href="vistasAdministrador/vistaPedidos.html" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>PEDIDOS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div id="capaPrincipal" class="main p-3">
            <div class="text-center">
                <h1>
                    BIENVENIDO NUEVAMENTE
                </h1>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="/public/js/script.js"></script>
</body>

</html>