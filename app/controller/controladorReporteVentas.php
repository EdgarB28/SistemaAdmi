<?php
require_once '../../config/database.php';
require_once '../modelo/ventas.php';

 
function listarVentas() {
    global $mysqli;
    $ventas = [];

    $stmt = $mysqli->prepare("SELECT DISTINCT
    C.FEC_CREACION AS FECHA,
    COL.COL_APELLIDO AS COLABORADOR,
    (SELECT COUNT(*) FROM PEDIDO_DETALLE WHERE ID_CABECERA = CAB.ID_CABECERA) AS CANTIDAD,
    CAB.TOTAL AS TOTAL,
    COM.DESCRIPCION,
    LOCALES.DESCRIPCION AS LOCAL,
    IF( C.ESTADO = 1, 'ACTIVO', 'ANULADO') AS ESTADO
    
FROM
    COMPROBANTE C
INNER JOIN PEDIDO_CABECERA CAB ON C.ID_CABECERA = CAB.ID_CABECERA
INNER JOIN PEDIDO_DETALLE DET ON CAB.ID_CABECERA = DET.ID_CABECERA
INNER JOIN COLABORADORES COL ON DET.ID_COLABORADOR = COL.ID_COLABORADOR
INNER JOIN TIP_COMPROBANTE COM ON COM.ID_TIPCOMPROBANTE = C.ID_TIPCOMPROBANTE
INNER JOIN LOCALES  ON LOCALES.ID_LOCAL = C.ID_LOCAL;
");

    $stmt->execute();
    $result = $stmt->get_result();

    // Recorre los resultados
    while ($row = $result->fetch_assoc()) {
        $venta = new ventas($row['FECHA'], $row['COLABORADOR'], $row['CANTIDAD'], $row['TOTAL'],$row['DESCRIPCION'],$row['LOCAL'],$row['ESTADO']);
        $ventas[] = $venta;
    }

    $stmt->close();


    $ventasArray = array_map(function($venta) {
        return $venta->toArray();
    }, $ventas);

    header('Content-Type: application/json');
    echo json_encode($ventasArray);
    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'listarVentas') {
       // $idCategoria = $_POST['idCategoria'] ?? '';
        
       listarVentas();
    } 
    else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida."]);
        exit;
    }
}
