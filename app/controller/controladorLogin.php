<?php
// Incluir la configuración de la base de datos
require_once '../../config/database.php';

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['usuario'];
    $contraseñaIngresada = $_POST['contraseña'];
    

    $stmt = $mysqli->prepare("SELECT COUNT(0) AS CONTADOR, COL_PASS FROM COLABORADORES WHERE COL_CORREO = ? AND ESTADO = 1");
    $stmt->bind_param("s", $correo); // Usa "s" para string, "i" para int, etc.
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $conteo = $row['CONTADOR'];
        $contraseñaAlmacenada = $row['COL_PASS'];


        if ($conteo > 0) {
            if ($contraseñaAlmacenada === $contraseñaIngresada) {
                echo "success";
            } else {
                echo "Contraseña incorrecta."; 
            }
        } else {
            echo "No se encontró el usuario.";
        }
    } else {
        echo "Error al ejecutar la consulta.";
    }

    $stmt->close(); // Cerrar la consulta
}
$mysqli->close(); // Cerrar la conexión a la base de datos

