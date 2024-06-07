<?php

require("../Includes/miconexion.php");

$producto = $_GET['producto'];

if ($producto == "camiones"){
$Fecha = $_POST['Fecha'];
$Semana = $_POST['Semana'];
$CargaP18 = $_POST['CargaP18'];
$DescargaP18 = $_POST['DescargaP18'];
$CargaSulfato = $_POST['CargaSulfato'];
$DescargasSulfato = $_POST['DescargasSulfato'];
$CargaHCL = $_POST['CargaHCL'];
$DescargasHCL = $_POST['DescargasHCL'];
$CargaHB10 = $_POST['CargaHB10'];
$DescargasHB10 = $_POST['DescargasHB10'];
$CargaS3 = $_POST['CargaS3'];
$DescargaS3 = $_POST['DescargaS3'];
$CargaFerrico = $_POST['CargaFerrico'];
$DescargaFerrico = $_POST['DescargaFerrico'];
$CargaSosa = $_POST['CargaSosa'];
$DescargaSosa = $_POST['DescargaSosa'];
$CargaSulfurico = "NULL";
$DescargaSulfurico = $_POST['DescargaSulfurico'];
$DescargaHipo = $_POST['DescargaHipo'];

$consulta = "UPDATE camiones SET 
            Fecha = '$Fecha',
            CargasP18 = $CargaP18,
            DescargasP18 = $DescargaP18,
            CargasSulfato = $CargaSulfato,
            DescargasSulfato = $DescargasSulfato,
            CargasHCL = $CargaHCL,
            DescargasHCL = $DescargasHCL,
            CargasHB10 = $CargaHB10,
            DescargasHB10 = $DescargasHB10,
            CargasS3 = $CargaS3,
            DescargasS3 = $DescargaS3,
            CargasFerrico = $CargaFerrico,
            DescargasFerrico = $DescargaFerrico,
            CargasSosa = $CargaSosa,
            DescargasSosa = $DescargaSosa,
            CargasSulfurico = $CargaSulfurico,
            DescargasSulfurico = $DescargaSulfurico,
            DescargaHipo = $DescargaHipo
            WHERE Fecha = '$Fecha'";

if(mysqli_query($miconexion, $consulta)) {
   
    echo "<script>
                alert('Registro ACTUALIZADO correctamente');
                location.href='../muelles/indexmuelles.php?producto=camiones';
          </script>";	    
 }
 else
 {
    echo "Registro NO actualizado: " .mysqli_error($miconexion);				
    echo "<script>
                alert('Revisa los campos. Los datos son incorrectos.');
                location.href='../muelles/indexmuelles.php?producto=camiones';
          </script>";              
 }
}

if ($producto == "sulfato"){
      $fabricacion_numero = $_POST['txtFabricacionNumero'];
      //$reactor_numero = $_POST['txtReactor'];
      $reactor_numero = $_POST['Reactor'];      
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
         $horafinal = "2023-12-31 23:59";
      }      
      
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
                     location.href='../sulfato/indexsulfato.php?producto=sulfato';
               </script>";		
      }
      else
      {
         echo "<script>         
                    alert('Revisa los campos. Los datos son incorrectos.');
                    location.href='../sulfato/indexsulfato.php?producto=sulfato';
               </script>";         
      }
}

if ($producto == "sulfacid"){

$fabricacionumero = $_POST['txtFabricacionNumero'];
$fecha = $_POST['txtFecha'];	
$volumen = $_POST['txtVolumen'];
$densidad = $_POST['txtDensidad'];	
$riqueza = $_POST['txtRiqueza'];	
$ph = $_POST['txtPh'];
$observaciones = $_POST['txtNotas'];

if(empty($volumen))
{
   $volumen="NULL";
}

if (empty($densidad)){
   $densidad= "NULL";
}

if (empty($riqueza)){
   $riqueza= "NULL";
}

if (empty($ph)){
   $ph= "NULL";
}

$consulta = "UPDATE sulfacid SET        
            Fecha = '$fecha',                 
            Densidad = $densidad,
            Riqueza = $riqueza,
            ph = $ph,
            Volumen = $volumen,              
            Notas = '$observaciones'            
            WHERE NumeroFabricacion= $fabricacionumero";       

if(mysqli_query($miconexion, $consulta)) {
   echo "<script>
               alert('Registro ACTUALIZADO correctamente');               
               location.href='../sulfacid/indexsulfacid.php?producto=sulfacid';
         </script>";		
}
else
{   
   echo "<script>
               alert('Revisa los campos. Los datos son incorrectos.');
               location.href='../sulfacid/indexsulfacid.php?producto=sulfacid';
         </script>";
}
}

if ($producto == "p18"){

      $fabricacion_numero = $_POST['txtFabricacionNumero'];
      //$reactor_numero = $_POST['txtReactor'];
      $reactor_numero = $_POST['Reactor'];            
      $horainicio = $_POST['txtFechaInicio'];	
      $horafinal = $_POST['txtFechaFinal'];	
      $peso_inicial = $_POST['txtPesoInicial'];
      $peso_final = $_POST['txtPesoFinal'];	
      $observaciones = $_POST['txtNotasP18'];
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
      $horafinal = "2023-12-31 23:59";
      }

$consulta = "UPDATE p18 SET        
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
   
   echo "<script>
               alert('Registro ACTUALIZADO correctamente');
               location.href='../p18/indexp18.php?producto=p18';
         </script>";	   
}
else
{
   echo "Registro NO actualizado: " .mysqli_error($miconexion);				
   echo "<script>
               alert('Revisa los campos. Los datos son incorrectos.');
               location.href='../p18/indexp18.php?producto=p18';
         </script>";
}
}

if ($producto == "hb10"){
      $fabricacionumero = $_POST['txtFabricacionNumero'];
      $fecha = $_POST['txtFecha'];
      $densidad = $_POST['txtDensidad'];	
      $riqueza = $_POST['txtRiqueza'];	
      $basicidad = $_POST['txtBasicidad'];
      $volumen = $_POST['txtVolumen'];
      $observaciones = $_POST['txtNotas'];
      
      if (empty($densidad)){
         $densidad= "NULL";
      }
      
      if (empty($riqueza)){
         $riqueza= "NULL";
      }
      
      if (empty($basicidad)){
         $basicidad= "NULL";
      }
      
      if(empty($volumen))
      {
         $volumen="NULL";
      }
            
      $consulta = "UPDATE hb10 SET        
                  Fecha = '$fecha',     
                  Volumen = $volumen,              
                  Densidad = $densidad,
                  Riqueza = $riqueza,
                  Basicidad = $basicidad,
                  Notas = '$observaciones'            
                  WHERE NumeroFabricacion= $fabricacionumero";       
      
      if(mysqli_query($miconexion, $consulta)) {
         echo "<script>
                     alert('Registro ACTUALIZADO correctamente');
                     location.href='../hb10/indexhb10.php?producto=hb10';
               </script>";		
      }
      else
      {         
         echo "<script>
                     alert('Revisa los campos. Los datos son incorrectos.');
                     location.href='../hb10/indexhb10.php?producto=hb10';
                     </script>";
      }
}

if ($producto == "filtrado"){
      $id = $_POST['id'];    
$Fecha = $_POST['fechainicio'];        
$Semana = $_POST['semana'];
$Producciones = $_POST['producciones'];
$Volumen_M216 = $_POST['volumeninicial'];        
$Volumen_Agua = $_POST['agua'];
$Densidad = $_POST['densidad'];    
$Riqueza = $_POST['riqueza'];
$Basicidad = $_POST['basicidad'];
$Volumen_Filtrado = $_POST['volumenfinal'];    
$Notas = $_POST['notas'];

if(empty($Volumen_M216))
{
    $Volumen_M216 = "NULL";
}

if(empty($Volumen_Agua))
{
    $Volumen_Agua = "NULL";
}

if (empty($Densidad)){
    $Densidad = "NULL";
}

if (empty($Riqueza)){
    $Riqueza =  "NULL";
}

if (empty($Basicidad)){
    $Basicidad = "NULL";
}

if (empty($Volumen_Filtrado)){
    $Volumen_Filtrado = "NULL";
}

$consulta = "UPDATE filtrado SET        
        Fecha = '$Fecha',        
        Semana = '$Semana', 
        Producciones = '$Producciones',
        Volumen_M216 = $Volumen_M216,     
        Volumen_Agua = $Volumen_Agua,
        Densidad = $Densidad,
        Riqueza = $Riqueza,
        Basicidad = $Basicidad,
        Volumen_Filtrado = $Volumen_Filtrado,
        Notas = '$Notas'            
        WHERE id = $id";       

if(mysqli_query($miconexion, $consulta)) {
   echo  "<script>
                  alert('Registro ACTUALIZADO correctamente');
                  location.href='../filtrado/indexfiltrado.php?producto=filtrado';
         </script>";		
}
else
{   
   echo 
         "<script>
                  alert('Revisa los campos. Los datos son incorrectos.');
                  location.href='../filtrado/indexfiltrado.php?producto=filtrado';
         </script>";
}
}

if ($producto == "ferrico"){

      $fabricacionumero = $_POST['txtFabricacionNumero'];
      $fecha = $_POST['txtFecha'];	
      $volumen_inicial = $_POST['txtVolumenInicial'];
      $volumen_final = $_POST['txtVolumenFinal'];      
      $densidad = $_POST['txtDensidad'];	
      $riqueza = $_POST['txtRiqueza'];	
      $acido_libre = $_POST['txtAcidoLibre'];
      $observaciones = $_POST['txtNotas'];
      
      if(empty($volumen_inicial))
      {
         $volumen_inicial="NULL";
      }
      
      if(empty($volumen_final))
      {
         $volumen_final="NULL";
      }
      
      if (empty($densidad)){
         $densidad= "NULL";
      }
      
      if (empty($riqueza)){
         $riqueza= "NULL";
      }
      
      if (empty($acido_libre)){
         $acido_libre= "NULL";
      }      
      
      $consulta = "UPDATE ferrico SET        
                  Fecha = '$fecha',     
                  Volumen_Inicial = $volumen_inicial,  
                  Volumen_Final = $volumen_final,
                  Densidad = $densidad,
                  Riqueza = $riqueza,
                  Acido = $acido_libre,
                  Notas = '$observaciones'            
                  WHERE NumeroFabricacion= $fabricacionumero";       
      
      if(mysqli_query($miconexion, $consulta)) {
         echo  "<script>
                        alert('Registro ACTUALIZADO correctamente');
                        location.href='../ferrico/indexferrico.php?producto=ferrico';
               </script>";		
      }
      else
      {  
         echo 
               "<script>
                        alert('Revisa los campos. Los datos son incorrectos.');
                        location.href='../ferrico/indexferrico.php?producto=ferrico';
               </script>";
      }
}

mysqli_close($miconexion);
?>
