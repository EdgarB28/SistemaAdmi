<?php
// Configuración de la base de datos
$host = '127.0.0.1';  
$user = 'root'; 
$password = ''; 
$dbname = 'proyectoWeb'; 

$mysqli = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Establecer el conjunto de caracteres
$mysqli->set_charset("utf8");

