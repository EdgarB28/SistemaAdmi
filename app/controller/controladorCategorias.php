<?php
require_once '../../config/database.php';
require_once '../modelo/categorias.php';

 
function listarCategorias() {
    global $mysqli;
    $categorias = [];

    $stmt = $mysqli->prepare("SELECT ID_CATEGORIA, NOMBRE,
                   IF(FLAG_ESTADO = 1 , 'ACTIVO','INACTIVO') AS ESTADO, DESCRIPCION FROM CATEGORIA;");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $categoria = new Categoria($row['ID_CATEGORIA'], $row['NOMBRE'],$row['DESCRIPCION'] ,$row['ESTADO']);
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

function BajaCategoria($idCategoria){
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE CATEGORIA
                            SET FLAG_ESTADO = 0
                            WHERE
                            ID_CATEGORIA = ?");

    if ($stmt === false) {
        echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
        exit;
    }

    $stmt->bind_param("i", $idCategoria);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Categoría Desactivada correctamente'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al Desactivar la categoría: ' . $stmt->error
        ];
    }

    $stmt->close();

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

function editarDescripcion($idCategoria,$descripcion){
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE CATEGORIA
                            SET DESCRIPCION = ?
                            WHERE
                            ID_CATEGORIA = ?");

    if ($stmt === false) {
        echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
        exit;
    }

    $stmt->bind_param("si", $descripcion, $idCategoria);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Categoría Desactivada correctamente'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al Desactivar la categoría: ' . $stmt->error
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
    if($accion==='BajaCategoria'){
        $idCategoria = $_POST['idCategoria'] ?? '';

        BajaCategoria($idCategoria);
    }

    if($accion === 'editarDescripcion'){
        $idCategoria = $_POST['idCategoria'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        editarDescripcion($idCategoria,$descripcion);
    }
    else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida."]);
        exit;
    }
}
