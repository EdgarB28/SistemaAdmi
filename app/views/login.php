<!doctype html>
<html lang="en">

<head>
    <title>Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../app/css/styles.css"> <!-- Asegúrate de incluir tu CSS -->
</head>

<body>
    <header>
        <img src="../app/img/logo.png" alt="Logo del Negocio" class="logo">
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br><br><br>
                <div class="card">
                    <div class="card-header">
                        <form id="loginForm" method="POST" action="../controller/controladorLogin.php">
                            <div class="form-group">
                                <label>Usuario: </label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresar Usuario">
                            </div>
                            <div class="form-group">
                                <label>Contraseña: </label>
                                <input id="passw" type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                            </div>
                            <button id="enviarBtn" type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../public/js/script.js"></script>
</body>

</html>
