<?php
require_once '../../config/database.php';
require_once '../modelo/pedidos.php';

function listarPedidos($estado) {
    global $mysqli;
    $pedidos = [];

    $stmt = $mysqli->prepare("CALL USP_LISTAR_PEDIDOS(?, @P_COD_MENSAJE, @P_DES_MENSAJE)");

    $stmt->bind_param("i", $estado );

    $stmt->execute();
    $result = $stmt->get_result();

    // Recorre los resultados
    while ($row = $result->fetch_assoc()) {
        $pedido = new pedidos($row['ID_CABECERA'], null, $row['CANTIDAD'], $row['TIP_ENTREGA'] , $row['ESTADO'], $row['FEC_CREACION'],$row['MINUTOS_TRANSCURRIDOS']);
        $pedidos[] = $pedido;
    }

    $stmt->close();

    $output = $mysqli->query("SELECT @P_COD_MENSAJE AS codigo, @P_DES_MENSAJE AS mensaje");
    $mensaje = $output->fetch_assoc();

    $pedidosArray = array_map(function($pedidos) {
        return $pedidos->toArray();
    }, $pedidos);

    $response = [
        'pedidos' => $pedidosArray,
        'codigo' => $mensaje['codigo'],
        'mensaje' => $mensaje['mensaje']
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
function actualizarPedido($estado,$idcabecera){
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE PEDIDO_CABECERA
                                SET ESTADO = ?
                                WHERE
                                ID_CABECERA = ?");

    if ($stmt === false) {
        echo json_encode(['error' => 'Error al preparar la consulta: ' . $mysqli->error]);
        exit;
    }

    $stmt->bind_param("ii", $estado , $idcabecera );

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

    if($accion === 'listarPedidos'){
        $estado = $_POST['estado'] ?? '';

        listarPedidos($estado);
    }
    if($accion === 'actualizarPedido'){
        $estado = $_POST['estado'] ?? '';
        $idcabecera = $_POST['idcabecera'] ?? '';

        actualizarPedido($estado,$idcabecera);
    }
    else{
        header('Content-Type: application/json');
        echo json_encode(["error" => "Acción no válida."]);
        exit;
    }

}