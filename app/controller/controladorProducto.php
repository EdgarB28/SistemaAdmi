<?php
require_once '../../config/database.php';
require_once '../modelo/productos.php';

 
function listarProducto($idCategoria, $monto) {
    global $mysqli;
    $productos = [];

    $stmt = $mysqli->prepare("CALL USP_LISTAR_PRODUCTO(?, ?,@P_COD_MENSAJE, @P_DES_MENSAJE)");

    $stmt->bind_param("id", $idCategoria , $monto);

    $stmt->execute();
    $result = $stmt->get_result();

    // Recorre los resultados
    while ($row = $result->fetch_assoc()) {
        $producto = new productos($row['ID'], $row['NOMBRE'], $row['PRECIO'], $row['CATEGORIA'] , null , $row['ID_CAT'],$row['DIR_IMG'],$row['DESCRIPCION']);
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

function ReporteProductos() {
    global $mysqli;
    $productos = [];

    $stmt = $mysqli->prepare("SELECT 
    P.ID_PRODUCTO AS ID,
    P.PRO_DECRIPCION AS NOMBRE,
    P.PRECIO,
    IFNULL(TAB_DETALLE.CANTIDAD, 0) AS CANTIDAD
    FROM
    PRODUCTO P
    LEFT JOIN (
    SELECT 
        ID_PRODUCTO, 
        SUM(CANTIDAD_PRODUCTO) AS CANTIDAD
    FROM 
        pedido_detalle
    GROUP BY 
        ID_PRODUCTO
    ) TAB_DETALLE ON TAB_DETALLE.ID_PRODUCTO = P.ID_PRODUCTO
    WHERE 
    IFNULL(TAB_DETALLE.CANTIDAD, 0) > 0;");


    $stmt->execute();
    $result = $stmt->get_result();

  
    while ($row = $result->fetch_assoc()) {
        $producto = new productos($row['ID'], $row['NOMBRE'], $row['PRECIO'], null, $row['CANTIDAD']);
        $productos[] = $producto;
    }

    $stmt->close();

   
    $productosArray = array_map(function($producto) {
        return $producto->toArray();
    }, $productos);

    header('Content-Type: application/json');
    echo json_encode($productosArray);
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

function bajaProducto($idProducto){
    global $mysqli;
    $productos = [];

    $stmt = $mysqli->prepare("UPDATE PRODUCTO
                                SET ESTADO = 0
                                WHERE
                                ID_PRODUCTO = ?");

    if ($stmt === false) {
    echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
    exit;
    }

    $stmt->bind_param("i",  $idProducto);

    if ($stmt->execute()) {
    $response = [
        'success' => true,
        'message' => 'ejecutada correctamente'
    ];
    } else {
    $response = [
        'success' => false,
        'message' => 'Error' . $stmt->error
    ];
    }

    $stmt->close();

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

function editarProducto($idCategoria, $precio, $idProducto){
    
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE PRODUCTO
                                SET ID_CATEGORIA = ?, PRECIO = ?
                                WHERE ID_PRODUCTO = ?");
    
        if ($stmt === false) {
            echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
            exit;
        }
    
        $stmt->bind_param("idi", $idCategoria, $precio,$idProducto);
    
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

    if ($accion === 'listarProducto') {
        $idCategoria = $_POST['idCategoria'] ?? '';
        $monto = $_POST['monto']?? '';

        listarProducto($idCategoria,$monto);
    } 
    if ($accion === 'GuardarProducto') {
        $idcategoria= $_POST['idcategoria']?? '';
        $precio = $_POST['precio'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        GuardarProducto($descripcion, $precio,$idcategoria);
    }
    if($accion==='ReporteProductos'){
        ReporteProductos();
    }
    if($accion==='bajaProducto'){
        $idProducto= $_POST['idProducto']?? '';

        bajaProducto($idProducto);
    }
    if($accion==='editarProducto'){
        $idCategoria = $_POST['idCategoria']?? '';
        $precio = $_POST['precio']?? '';
        $idProducto = $_POST['idProducto']?? '';

        editarProducto($idCategoria, $precio, $idProducto);
    }
    else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida."]);
        exit;
    }
}
