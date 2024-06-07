<?php

require ("../Includes/miconexion.php");
$table_name = $_POST['producto'];

//CREAMOS CONSULTA A LA BASE DE DATOS PARA AVERIGUAR CUAL ES LA ÚLTIMA PRODUCCIÓN //
/*
if ($table_name == "filtrado"){
    $parametro = "id";
}
else
{
    $parametro = "NumeroFabricacion";
}*/

switch($table_name){
    case "filtrado":
        $parametro = "id";
        break;
    case "p18":
        $parametro = "NumeroFabricacion";
        break;
    case "sulfato":
        $parametro = "NumeroFabricacion";
        break;
    case "ferrico":
        $parametro = "NumeroFabricacion";
        break;
    case "hb10":
        $parametro = "NumeroFabricacion";
        break;
    case "sulfacid":
        $parametro = "NumeroFabricacion";
        break;
}

if ($table_name == "filtrado"){
    $consulta = "SELECT id FROM filtrado ORDER BY id DESC LIMIT 1 ";

    $resultado = mysqli_query ($miconexion, $consulta) 
                    or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0); 

    $ultimoid = $fila['id'];
    $id = $ultimoid+1;
}
elseif (($table_name =="p18") or ($table_name =="sulfato") or ($table_name =="ferrico") or ($table_name =="hb10") or ($table_name =="sulfacid")) {
    //$query = "SELECT NumeroFabricacion FROM $table_name ORDER BY NumeroFabricacion DESC LIMIT 1";
    $query = "SELECT $parametro FROM $table_name ORDER BY $parametro DESC LIMIT 1";
                      
    $resultado = mysqli_query ($miconexion, $query) or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0); 
    extract($fila);   
    $ultima = intval($NumeroFabricacion);
}
else{
    
}

/*
//$query = "SELECT NumeroFabricacion FROM $table_name ORDER BY NumeroFabricacion DESC LIMIT 1";
$query = "SELECT $parametro FROM $table_name ORDER BY $parametro DESC LIMIT 1";
                      
$resultado = mysqli_query ($miconexion, $query) or die("No se puede realizar la consulta");
$fila = mysqli_fetch_array($resultado);
mysqli_data_seek($resultado, 0); 
extract($fila);   
$ultima = intval($NumeroFabricacion);
//---------------------------------------------------------------------------------//
*/
if (!empty ($_POST['fechainicio'])){
    $fechainicio = $_POST['fechainicio'];	 
}
else{
    $fechainicio = "NULL";
}
/*
if ($table_name == "filtrado"){
    $consulta = "SELECT id FROM filtrado ORDER BY id DESC LIMIT 1 ";

    $resultado = mysqli_query ($miconexion, $consulta) 
                    or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0); 

    $ultimoid = $fila['id'];
    $id = $ultimoid+1;
}
*/

$fabn= $ultima + 1;

/*
if (!empty ($_POST['fabn'])){
    $fabn = $_POST['fabn'];
}*/

if (!empty ($_POST['fechafinal'])){    
    $fechafinal = $_POST['fechafinal'];
}
else{
    $fechafinal = "2023-12-31 23:59";
}

if (!empty ($_POST['pesoinicial'])){    
    $pesoinicial = $_POST['pesoinicial'];
}
else{
    $pesoinicial = 0;
}

if (!empty ($_POST['id'])){  /*SOLO PARA EL FILTRADO FILTRADO*/    
    $id = $_POST['id'];
}

if (!empty ($_POST['pesofinal'])){    
    $pesofinal = $_POST['pesofinal'];
}
else{
    $pesofinal = 0;
}

if (!empty ($_POST['reactor'])){    
    $reactor = $_POST['reactor'];
}

if (!empty ($_POST['volumenfinal'])){    
    $volumenfinal = $_POST['volumenfinal'];
}
else{
    $volumenfinal = 0;
}

if (!empty ($_POST['notas'])){    
    $notas = $_POST['notas'];
}
else{
    $notas = "";
}

if (!empty ($_POST['volumeninicial'])){    
    $volumeninicial = $_POST['volumeninicial'];
}
else{
    $volumeninicial = 0;
}

if (!empty ($_POST['volumenfinal'])){    
    $volumenfinal = $_POST['volumenfinal'];
}
else{
    $volumenfinal = 0;
}

if (!empty ($_POST['densidad'])){
    $densidad = $_POST['densidad'];
}
else{
    $densidad = "NULL";
}

if (!empty ($_POST['riqueza'])){    
    $riqueza = $_POST['riqueza'];
}
else{
    $riqueza = "NULL";
}

if (!empty ($_POST['acidolibre'])){    
    $acidolibre = $_POST['acidolibre'];
}
else{
    $acidolibre = "NULL";
}

if (!empty ($_POST['basicidad'])){       
    $basicidad  = $_POST['basicidad'];
}
else{
    $basicidad = "NULL";
}

if (!empty ($_POST['producciones'])){    
    $producciones = $_POST['producciones'];
}
else{
    $producciones = NULL;
}

if (!empty ($_POST['agua'])){    
    $agua = $_POST['agua'];
}
else{
    $agua = 0;
}

if (!empty ($_POST['ph'])){    
    $ph = $_POST['ph'];
}
else{
    $ph = "NULL";
}
//--------------------------------------------------------
if (!empty ($_POST['cargaHCL'])){        
    $cargaHCL = $_POST['cargaHCL'];
}
else{
    $cargaHCL = 0;
}

if (!empty ($_POST['descargaHCL'])){        
    $descargaHCL = $_POST['descargaHCL'];
}
else{
    $descargaHCL = 0;
}

if (!empty ($_POST['cargaP18'])){        
    $cargaP18 = $_POST['cargaP18'];
}
else{
    $cargaP18 = 0;
}

if (!empty ($_POST['descargaP18'])){        
    $descargaP18 = $_POST['descargaP18'];
}
else{
    $descargaP18 = 0;
}

if (!empty ($_POST['cargaSulfato'])){        
    $cargaSulfato = $_POST['cargaSulfato'];
}
else{
    $cargaSulfato = 0;
}

if (!empty ($_POST['descargaSulfato'])){        
    $descargaSulfato = $_POST['descargaSulfato'];
}
else{
    $descargaSulfato = 0;
}

if (!empty ($_POST['cargaS3'])){        
    $cargaS3 = $_POST['cargaS3'];
}
else{
    $cargaS3 = 0;
}

if (!empty ($_POST['descargaS3'])){        
    $descargaS3 = $_POST['descargaS3'];
}
else{
    $descargaS3 = 0;
}

if (!empty ($_POST['cargaFerrico'])){        
    $cargaFerrico = $_POST['cargaFerrico'];
}
else{
    $cargaFerrico = 0;
}

if (!empty ($_POST['descargaFerrico'])){        
    $descargaFerrico = $_POST['descargaFerrico'];
}
else{
    $descargaFerrico = 0;
}

if (!empty ($_POST['cargaHB10'])){        
    $cargaHB10 = $_POST['cargaHB10'];
}
else{
    $cargaHB10 = 0;
}

if (!empty ($_POST['descargaHB10'])){        
    $descargaHB10 = $_POST['descargaHB10'];
}
else{
    $descargaHB10 = 0;
}

if (!empty ($_POST['cargaHipo'])){        
    $cargaHipo = $_POST['cargaHipo'];
}
else{
    $cargaHipo = 0;
}

if (!empty ($_POST['descargaHipo'])){        
    $descargaHipo = $_POST['descargaHipo'];
}
else{
    $descargaHipo = 0;
}

if (!empty ($_POST['cargaSosa'])){        
    $cargaSosa = $_POST['cargaSosa'];
}
else{
    $cargaSosa = 0;
}

if (!empty ($_POST['descargaSosa'])){        
    $descargaSosa = $_POST['descargaSosa'];
}
else{
    $descargaSosa = 0;
}

if (!empty ($_POST['cargaSulfurico'])){        
    $cargaSulfurico = $_POST['cargaSulfurico'];
}
else{
    $cargaSulfurico = 0;
}

if (!empty ($_POST['descargaSulfurico'])){        
    $descargaSulfurico = $_POST['descargaSulfurico'];
}
else{
    $descargaSulfurico = 0;
}

if($table_name=="p18" or $table_name=="sulfato"){
    require ("../Includes/calculosemana.php");

    if (($fechafinal)==""){
        $fechafinal = "2023-12-31T23:59";				
    }
    else{
        $fechafinal = $fechafinal;
    }    
    $duracion = strtotime($fechafinal) - strtotime($fechainicio);		
    require ("../Includes/tiempoparado.php");
}
else{
    $duracion = "NULL";
    $tiempoparado = "NULL";
    $consultadaP18 = "NULL";
}

if ($table_name == "ferrico" or $table_name == "hb10" or $table_name == "sulfacid" or $table_name=="camiones"){
    require ("../Includes/calculosemana.php");
}

if ($table_name == "filtrado"){
    require ("../Includes/calculosemana.php");
    $consulta = "SELECT id FROM filtrado ORDER BY id DESC LIMIT 1 ";
    $resultado = mysqli_query ($miconexion, $consulta) 
                            or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0); 

    $ultimoid = $fila['id'];
    $id = $ultimoid+1;
}
else{
    $id = "NULL";
}

if ($table_name == "p18" or $table_name == "sulfato"){
    $query = "INSERT INTO $table_name(Hora_Inicio, Hora_Finalizacion, Semana, NumeroFabricacion, Peso_Inicial, 
        Peso_Final, Duracion, Reactor, Tiempo_Parado, Notas) VALUES ('$fechainicio','$fechafinal', '$semana', 
        '$fabn', $pesoinicial, $pesofinal, $duracion, '$reactor', $tiempoparado, '$notas')";
        
    if ($table_name == "p18"){
        $string = "../p18/indexp18.php?producto=p18";    
    }

    if ($table_name == "sulfato"){
        $string = "../sulfato/indexsulfato.php?producto=sulfato";    
    }
}

if ($table_name == "ferrico"){    
    $query = "INSERT INTO $table_name(NumeroFabricacion, Fecha, Semana, Volumen_Inicial, Volumen_Final, Densidad, Riqueza,
    Acido, Notas) VALUES ('$fabn', '$fechainicio', '$semana', $volumeninicial, $volumenfinal, $densidad, $riqueza, $acidolibre,
    '$notas')";    

    $string = "../ferrico/indexferrico.php?producto=ferrico";    
}

if ($table_name == "hb10"){    
    $query = "INSERT INTO $table_name(NumeroFabricacion, Fecha, Semana, Densidad, Riqueza, Basicidad, Volumen, Notas)
    VALUES ('$fabn', '$fechainicio', '$semana', $densidad, $riqueza, $basicidad, $volumenfinal, '$notas')";       

    $string = "../hb10/indexhb10.php?producto=hb10";    
}

if ($table_name == "sulfacid"){        
    $query = "INSERT INTO $table_name(NumeroFabricacion, Fecha, Semana, Densidad, Riqueza, ph, Volumen, Notas)
    VALUES ('$fabn', '$fechainicio', '$semana', $densidad, $riqueza, $ph, $volumenfinal, '$notas')";       

    $string = "../sulfacid/indexsulfacid.php?producto=sulfacid";    
}

if ($table_name == "filtrado"){
    $query = "INSERT INTO $table_name(id, Fecha, Semana, Producciones, Volumen_M216, Volumen_Agua, Densidad, Riqueza, Basicidad, Volumen_Filtrado, Notas) 
    VALUES ($id, '$fechainicio', '$semana', '$producciones', $volumeninicial, $agua, $densidad, $riqueza, $basicidad, $volumenfinal, '$notas')";
    
    $string = "../filtrado/indexfiltrado.php?producto=filtrado";        
}

if ($table_name == "camiones"){
    $query = "INSERT INTO camiones(Fecha, Semana, CargasP18, DescargasP18, CargasSulfato, DescargasSulfato,
    CargasHCL, DescargasHCL, CargasHB10, DescargasHB10, CargasS3, DescargasS3, CargasFerrico, 
    DescargasFerrico, CargasSosa, DescargasSosa, CargasSulfurico, DescargasSulfurico, DescargaHipo) 
    VALUES ('$fechainicio','$semana',$cargaP18, $descargaP18, $cargaSulfato, $descargaSulfato, $cargaHCL, $descargaHCL,
    $cargaHB10, $descargaHB10, $cargaS3, $descargaS3, $cargaFerrico, $descargaFerrico, $cargaSosa, $descargaSosa,
    $cargaSulfurico, $descargaSulfurico, $descargaHipo)";

    $string = "../muelles/indexmuelles.php?producto=camiones";
}

if(mysqli_query($miconexion, $query)) {
    echo "<script>
            alert('Registro AÑADIDO correctamente');
            location.href='$string';					
         </script>";		         
}
else{
    echo "<script>
            alert('Revisa los campos. Los datos son incorrectos.');
            window.location.href='../indexp18.php?producto=p18';
        </script>";
}

mysqli_close($miconexion);
?>
