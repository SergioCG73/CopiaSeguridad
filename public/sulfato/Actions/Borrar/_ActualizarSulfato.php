<?php

/*Fichero que recibe los datos desde el formulario de editarferrico.php
   y los envía a la base de datos a la table ferrico */

require ("../../Includes/miconexion.php");

$fabricacion_numero = $_POST['txtFabricacionNumero'];
$reactor_numero = $_POST['txtReactor'];
$horainicio = $_POST['txtFechaInicio'];	
$horafinal = $_POST['txtFechaFinal'];	
$peso_inicial = $_POST['txtPesoInicial'];
$peso_final = $_POST['txtPesoFinal'];	
$observaciones = $_POST['txtNotasSulfato'];
$Duracion = strtotime($horafinal) - strtotime($horainicio);
$calculosemana = substr($horainicio, 0,10);
$semana = $semana = date('W', strtotime($calculosemana));


if(empty($peso_inicial))
{
   $peso_inicial="NULL";
}

if(empty($peso_final))
{
   $peso_final="NULL";
}

if(!empty($horafinal<$horainicio)){
   $horafinal = $horainicio;
}

/* -------- INICIO COMPROBADOR 
echo "Fabricacion Numero: $fabricacion_numero <br>";
echo "Reactor: $reactor_numero <br>";
echo "Hora/Fecha Inicio: $horainicio <br>";
echo "Hora/Fecha Final: $horafinal <br>";
echo "Calculo Semana: $calculosemana <br>";
echo "Semana: $semana <br>";
echo "Peso Inicial: $peso_inicial <br>";
echo "Peso Final: $peso_final <br>";
echo "Reactor: $reactor_numero <br>";
echo "Notas: $observaciones <br>";
exit; 

//* -------------- FINAL COMPROBADOR ----------------------*/

//SIGO DESDE AQUÍ


$consulta = "UPDATE sulfato SET        
            Hora_Inicio = '$horainicio',     
            Hora_Finalizacion = '$horafinal',    
            Semana = $semana, 
            Peso_Inicial = $peso_inicial,  
            Peso_Final = $peso_final,            
            Reactor = '$reactor_numero',   
            Duracion = $Duracion,         
            Notas = '$observaciones'            
            WHERE NumeroFabricacion= $fabricacion_numero";       

if(mysqli_query($miconexion, $consulta)) {
   echo  "<script>
               alert('Registro ACTUALIZADO correctamente');
               location.href='../indexsulfato.php?producto=sulfato';
         </script>";		
}
else
{
   echo "Registro NO añadido: " .mysqli_error($miconexion);				
   
}
//-------------------FIN ALERT AL GUARDAR REGISTRO------------------------------------------*/
mysqli_close($miconexion);

?>
