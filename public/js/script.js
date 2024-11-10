$(document).ready(function () {

    $("#botonBarra").on("click", function () {
        $("#sidebar").toggleClass("expand");
    });

    $("#bntPerfil a").on("click", function (e) {
        e.preventDefault(); 
        const targetPage = $(this).attr("href"); 
    
        $("#capaPrincipal").load(targetPage);
    });

    /********************************** */
    $("#bntCategoria a").on("click", function (e) {
        e.preventDefault(); 
        const targetPage = $(this).attr("href"); 
    
        $("#capaPrincipal").load(targetPage);
    });

    $("#bntProductos a").on("click", function (e) {
        e.preventDefault(); 
        const targetPage = $(this).attr("href"); 
    
        $("#capaPrincipal").load(targetPage);
    });


    /********************************** */
    $('#enviarBtn').on('click', function (event) {
        event.preventDefault();
        enviarLogin();
    });

    $('.showFormButton').on('click', function () {
        mostrarFormulario($(this).data('form'));
    });






    //Funciones
    function enviarLogin() {
        var usuario = $('#usuario').val();
        var contrasena = $('#passw').val();

        $.ajax({
            type: 'POST',
            url: '../../app/controller/controladorLogin.php',
            data: { usuario: usuario, contraseña: contrasena },
            success: function (response) {
                response = $.trim(response);
                console.log("Respuesta del servidor:", response);

                if (response === "success") {
                    console.log("Redirigiendo a vista principal...");
                    window.location.href = "../app/views/vistaPrincipal.php";
                } else {
                    alert(response);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud:", status, error);
                alert("Error en la solicitud: " + xhr.status);
            }
        });
    }


    function mostrarFormulario(formId) {
        $('.form-container').hide();
        $('#' + formId).show();
    }



    $('.form-container').hide();
});
