<?php
// Configurar encabezados para generar el archivo Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ReporteProductos.xls");

// Llamar al controlador para obtener los datos
//$data = json_decode(file_get_contents('../controller/controladorProducto.php?accion=ReporteProductos'), true);
$data = json_decode(file_get_contents('http://localhost/app/controller/controladorProducto.php?accion=ReporteProductos'), true);





// Generar la tabla HTML que será convertida en Excel
echo "<table border='1'>"; // El atributo 'border' asegura que los bordes sean visibles en Excel
echo "<tr>
        <th>N°</th>
        <th>NOM. PRODUCTO</th>
        <th>PRECIO</th>
        <th>CAN. VENTAS</th>
      </tr>";

$row = 1;
foreach ($data as $producto) {
    echo "<tr>
            <td>{$row}</td>
            <td>{$producto['nombre']}</td>
            <td>{$producto['precio']}</td>
            <td>{$producto['cantidad']}</td>
          </tr>";
    $row++;
}
echo "</table>";
?>
