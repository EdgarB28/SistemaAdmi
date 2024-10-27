<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin de Negocio</title>
</head>

<body>
    
    <header>
        <img src="../img/logo.png" alt="Logo del Negocio" class="logo">
    </header>

    <div class="container">
        <div class="row">



        <div class="col-left">
                <nav class="nav1">
                    <button class="showFormButton" data-form="form1">CATEGORIAS</button>
                    <button class="showFormButton" data-form="form2">VENTAS</button>
                    <button class="showFormButton" data-form="form3">REPORTES</button>
                    <button class="showFormButton salir" data-form="form4">SALIR</button>
                </nav>
            </div>

            <div class="col-right">
                <div id="form1" class="form-container" >
                <nav class="nav2">
                    
                    <button class=" showFormButton formulario" data-form="form5">CRIOLLA</button>
                    <button class=" showFormButton formulario" data-form="form6">MARINA</button>
                    <button class=" showFormButton formulario" data-form="form7">ANDINA</button>
                    <button class=" showFormButton formulario" data-form="form8">SELVA</button>
                </nav>
                
                <nav class="nav3">
                <button class="showFormButton añadir" data-form="form9">AÑADIR CATEGORÍA</button>
                <button class="showFormButton editar" data-form="form9">EDITAR CATEGORÍA</button>
                <button class="showFormButton borrar" data-form="form9">BORRAR CAEGORÍA</button>
                
                
                </nav>
                </div>

                <div id="form2" class="form-container" style="display: none;">
                    <h1>VENTAS</h1>
                    
                </div>

                <div id="form3" class="form-container" style="display: none;">
                <h1>REPORTE DE VENTAS</h1>
                </div>

                
            </div>

           
        </div>
    </div>

    <script src="../../public/js/script.js"></script>
</body>

</html>