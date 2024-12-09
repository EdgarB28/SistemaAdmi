<!doctype html>
<html lang="en">

<head>
    <title>Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styles.css"> <!-- Asegúrate de incluir tu CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <img src="/app/img/logo.png" alt="Logo del Negocio" class="logo">
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        <form id="loginForm">
                            <div class="form-group">
                                <label id="usuario-label" >Usuario: </label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresar Usuario">
                            </div>
                            <div class="form-group">
                                <label>Contraseña: </label>
                                <input id="passw" type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                            </div>
                            <button id="enviarBtn" type="submit" class="btn btn-primary">INGRESAR</button>
                        </form>

                        <!-- Enlaces uno al lado del otro -->
                        <div class="mt-3 text-center">
                            <a href="#" id="recuperar-link" class="mr-3">Recuperar Contraseña</a>
                            <a href="#" id="admin-link">¿Eres administrador?</a>
                            <a href="#" id="volver-link" class="hide" >Volver al menu anterior</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(async function () {
            $('#admin-link').click(function (event) {
                $('#usuario-label').text('Correo corporativo:'); 

                $('#recuperar-link').addClass('hide');
                $('#admin-link').addClass('hide');
                $('#volver-link').removeClass('hide');
             });

             $('#volver-link').click(function (event) {
                $('#usuario-label').text('usuario:'); 
                
                $('#recuperar-link').removeClass('hide');
                $('#admin-link').removeClass('hide');
                $('#volver-link').addClass('hide');

             });
         });


    </script>


</body>

</html>
