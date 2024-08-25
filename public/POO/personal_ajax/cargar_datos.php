<?php
$servername = "localhost";
$username = "sergiocg";
$password = "1011";
$dbname = "aquaweb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar todos los productos
//$sql = "SELECT DNI, Nombre, Apellidos, Fecha_Alta FROM personal";

$sql = "SELECT personal.DNI, personal.Nombre, personal.Apellidos, personal.Fecha_Alta, puestos.Puesto
        FROM personal JOIN puestos
        ON personal.Id_Puesto = puestos.Id_Puesto";
        
$result = $conn->query($sql);

$empleados = array();

if ($result->num_rows > 0) {
    // Guardar datos en un array
    while($row = $result->fetch_assoc()) {
        $empleados[] = $row;
    }
}

// Devolver datos como JSON
echo json_encode($empleados);

$conn->close();
?>
