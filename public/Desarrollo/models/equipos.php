<?php

require_once ("Actions.php");

$Producto_id = $_GET['Producto_id'];
$action = new Actions();

$producto_id = $_GET['producto_id'] ?? null;

$action = new Actions();
if ($producto_id) {
    $equipos = $action->getEquipos($producto_id);    
} else {
    echo "No se ha enviado el id del producto";
    exit;
}

header('Content-Type: application/json');
echo json_encode($equipos);
?>


?>

