<?php 
    require("../Includes/miconexion.php");
    $id = $_GET['id'];         
    $id=Str_replace(".","",$id);    

    $consulta ="SELECT * FROM p18 WHERE NumeroFabricacion = $id";        
    $resultado = mysqli_query($miconexion, $consulta) 
            or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    extract($fila);    

    $fabricacionumero = $fila['NumeroFabricacion'];
    $Hora_Inicio = $fila['Hora_Inicio'];
    $Peso_Inicial = $fila['Peso_Inicial'];
    $Hora_Finalizacion = $fila['Hora_Finalizacion'];
    $Peso_Final = $fila['Peso_Final'];
    $Duracion = $fila['Duracion'];
    $Parado = $fila['Tiempo_Parado'];
    $Reactor = $fila['Reactor'];
    $Notas = $fila['Notas'];    
    $producto = "p18";

    /*/--------------INICIO COMPROBADOR DATOS QUE LLEGAN DESDE FORMULARIO 
    echo "Fabricacion Número: $fabricacionumero <br>";
    echo "Reactor $Reactor <br>";
    echo "Fecha/Hora Inicio: $Hora_Inicio <br>";
    echo "Peso Incial: $Peso_Inicial <br>";
    echo "Fecha/Hora Final: $Hora_Finalizacion <br>";
    echo "Peso Final: $Peso_Final <br>";
    echo "Duración: $Duracion <br>";
    echo "Parado: $Parado <br>";
    echo "Notas: $Notas <br>";
    exit;
//---------------fIN COMPROBADOR DATOS QUE LLEGAN DESDE FORMULARIO */


?>