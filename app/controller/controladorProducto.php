<?php
require_once '../../config/database.php';
require_once '../modelo/productos.php';

 
function listarProducto($idCategoria) {
    global $mysqli;
    $productos = [];

    $stmt = $mysqli->prepare("CALL USP_LISTAR_PRODUCTO(?, @P_COD_MENSAJE, @P_DES_MENSAJE)");

    $stmt->bind_param("i", $idCategoria);

    $stmt->execute();
    $result = $stmt->get_result();

    // Recorre los resultados
    while ($row = $result->fetch_assoc()) {
        $producto = new productos($row['ID'], $row['NOMBRE'], $row['PRECIO'], $row['CATEGORIA']);
        $productos[] = $producto;
    }

    $stmt->close();

    $output = $mysqli->query("SELECT @P_COD_MENSAJE AS codigo, @P_DES_MENSAJE AS mensaje");
    $mensaje = $output->fetch_assoc();

    $productosArray = array_map(function($productos) {
        return $productos->toArray();
    }, $productos);

    $response = [
        'productos' => $productosArray,
        'codigo' => $mensaje['codigo'],
        'mensaje' => $mensaje['mensaje']
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}


function GuardarProducto($descripcion, $precio, $idcategoria) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO PRODUCTO(PRO_DECRIPCION, PRECIO,ID_CATEGORIA)
    VALUES (?,?,?);");

    if ($stmt === false) {
        echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
        exit;
    }

    $stmt->bind_param("sdi", $descripcion, $precio, $idcategoria);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Producto guardado correctamente'
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

    if ($accion === 'listarProducto') {
        $idCategoria = $_POST['idCategoria'] ?? '';
        
        listarProducto($idCategoria);
    } 
    if ($accion === 'GuardarProducto') {
        $idcategoria= $_POST['idcategoria']?? '';
        $precio = $_POST['precio'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        GuardarProducto($descripcion, $precio,$idcategoria);
    }
    else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida."]);
        exit;
    }
}
