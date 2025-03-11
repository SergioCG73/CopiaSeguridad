<?php 

require_once ("Actions.php");
$action = new Actions();
$productos = $action->getProductos();
header('Content-Type: application/json');
echo json_encode($productos);

?>