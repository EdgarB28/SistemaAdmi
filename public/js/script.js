document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM completamente cargado");
    var enviarBtn = document.getElementById("enviarBtn");

    if (enviarBtn) {
        enviarBtn.addEventListener("click", function(event) {
            event.preventDefault(); // Evita el envío estándar del formulario

            var usuario = document.getElementById("usuario").value;
            var contrasena = document.getElementById("passw").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../app/controller/controladorLogin.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Manejar la respuesta del servidor
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    console.log("Estado de la solicitud:", xhr.status); // Verifica el estado
                    if (xhr.status == 200) {
                        var response = xhr.responseText.trim();
                        console.log("Respuesta del servidor:", response); // Muestra la respuesta exacta

                        if (response === "success") {
                            console.log("Redirigiendo a vista principal...");
                            window.location.href = "../app/views/vistaPrincipal.php"; 
                        } else {
                            alert(response); // Muestra el mensaje en caso de error
                        }
                    } else {
                        alert("Error en la solicitud: " + xhr.status);
                    }
                }
            };

            xhr.send("usuario=" + encodeURIComponent(usuario) + "&contraseña=" + encodeURIComponent(contrasena)); // Envía los datos
        });
    } else {
        console.error("El botón de envío no se encontró en el DOM.");
    }

    /// otro formulario 
    const buttons = document.querySelectorAll(".showFormButton");
    const forms = document.querySelectorAll(".form-container");

    // Ocultar todos los formularios inicialmente
    forms.forEach(form => {
        form.style.display = "none";
    });

    // Manejar el clic en cada botón
    buttons.forEach(button => {
        button.onclick = function() {
            // Ocultar todos los formularios
            forms.forEach(form => {
                form.style.display = "none";
            });

            // Mostrar el formulario correspondiente
            const formToShow = document.getElementById(button.dataset.form);
            formToShow.style.display = "block";
        }
    });
});
