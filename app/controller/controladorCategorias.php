<?php
require_once '../../config/database.php';
require_once '../modelo/categorias.php';

 
function listarCategorias() {
    global $mysqli;
    $categorias = [];

    $stmt = $mysqli->prepare("SELECT ID_CATEGORIA, NOMBRE, DESCRIPCION FROM CATEGORIA");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $categoria = new Categoria($row['ID_CATEGORIA'], $row['NOMBRE'], $row['DESCRIPCION']);
        $categorias[] = $categoria;
    }

    $stmt->close();

    // Convierte los objetos a arrays antes de enviarlos como JSON
    $categoriasArray = array_map(function($categoria) {
        return $categoria->toArray();
    }, $categorias);

    header('Content-Type: application/json');
    echo json_encode($categoriasArray);
    exit;
}


function GuardarCategoria($nombre, $descripcion) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO CATEGORIA (NOMBRE, DESCRIPCION) VALUES (?, ?)");

    if ($stmt === false) {
        echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
        exit;
    }

    $stmt->bind_param("ss", $nombre, $descripcion);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Categoría guardada correctamente',
            'id_categoria' => $mysqli->insert_id
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al guardar la categoría: ' . $stmt->error
        ];
    }

    $stmt->close();

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'listarCategorias') {
        listarCategorias();
    } 
    if ($accion === 'GuardarCategoria') {
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        GuardarCategoria($nombre, $descripcion);
    }
    else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida."]);
        exit;
    }
}
