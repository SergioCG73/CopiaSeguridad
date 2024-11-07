<!---
    Este archivo da formato a los datos extraidos de la bd antes de mostrarlos 
                                                                            -->
<?php    

if (($producto == "p18") or ($producto == "sulfato")){   

    if(!empty($NumeroFabricacion)) {
        $NumeroFabricacion = number_format($NumeroFabricacion,0,",",".");                
    }
   
    if (!empty($Peso_Inicial)){
        $Peso_Inicial = number_format($Peso_Inicial,0,",",".") ." Kg";
    } 
    else{
        $Peso_Inicial = "-----";
    }
    
    if (!empty($Peso_Final)){
        $Peso_Final = number_format($Peso_Final,0,",",".") ." Kg";        
    } 
    else{        
        $Peso_Final = "-----";
    }

    if (!empty($Notas)) {
        $Notas = "abc";  
    }
    else
    {
        $Notas=NULL;
    }         
    
    if(!empty($Hora_Inicio)){
        $Hora_Inicio = date("d-m-Y H:i", strtotime($Hora_Inicio));        
    }
    else{
        $Hora_Inicio = "-----";
    }

    if(!empty($Hora_Finalizacion)){
        $Hora_Finalizacion = date("d-m-Y H:i", strtotime($Hora_Finalizacion));
    }
    else{
        $Hora_Finalizacion = "-----";
    }   

    if (empty($Densidad)){
        $Densidad = "-------";
    }

    if (empty($Riqueza)){
        $Riqueza = "-------";
    }

    if (!empty($Tiempo_Parado)){
        $Tiempo_Parado_Segundos = $Tiempo_Parado;
        
        $horas = floor($Tiempo_Parado/3600);        
        $minutos = floor(($Tiempo_Parado - ($horas*3600))/60);       
        $Tiempo_Parado = "$horas h y $minutos'";

        if ($horas == 0){
            $Tiempo_Parado = "$minutos'";            
        }

        if (($minutos == 0) and ($horas>1)){
            $Tiempo_Parado = "$horas horas";  
        }

        if ($Tiempo_Parado < 0){
            $Tiempo_Parado = "ERROR";
        }        

        if ($horas==1){
            $Tiempo_Parado = "$horas hora";  
        }

        if (($horas==1) and ($minutos>0)){
            $Tiempo_Parado = "$horas hora y $minutos'";
        }
    }

switch($Duracion){      
    //case ($Duracion >= 186400):
    case ($Duracion >= 400000):
        $Tiempo = "-----";        
        break;
    case ($Duracion<=3600):
        $resto = $Duracion/60;
        $div=explode('.',$resto);
        $minutos=$div[0];//Obtenemos los minutos
        $Tiempo = $minutos;    
        $segundos = $Duracion-($minutos*60);
        if ($segundos>30){
            $Tiempo = $Tiempo +1;
            $Tiempo = "$Tiempo'";
        }
        else
        {
            $Tiempo = "$Tiempo'";
        }
        break;
    //case (($Duracion>3600) and ($Duracion<186400)):
        case (($Duracion>3600) and ($Duracion<400000)):    
        $resto=$Duracion/3600;
        $div=explode('.',$resto);
        $horas=$div[0];//obtienes las horas                                 
        $minutos= ($Duracion - ($horas*3600))/60;//obtienes los minutos
        $div=explode('.',$minutos);
        $minutos=$div[0];
        $Tiempo = "$horas h y $minutos'";   
        break;                                     
   } 
}

if ($producto == "filtrado"){
    
    if(!empty($id)) {
        $id = number_format($id,0,",",".");               
    }

    
    if(!empty($Fecha)){
        $Fecha = date("d-m-Y", strtotime($Fecha));
    }
    else{
        $Fecha = "Sin dato";
    }
    
    if (!empty($Volumen_M216)){
        $Volumen_M216 = number_format($Volumen_M216,0,",",".") ." lts.";        
    } 
    else{        
        $Volumen_M216 = "Sin dato";
    }

    if (!empty($Volumen_Agua)){
        $Volumen_Agua = number_format($Volumen_Agua,0,",",".") ." lts.";
    }
    else{
        $Volumen_Agua = "0 lts.";
    }

  /*
    if (!empty($Densidad)){
        $DensidadBD = $Densidad;
        $Densidad = number_format($Densidad,3,",",".")." g/ml";           
    } 
    else{
        $DensidadBD = $Densidad;
        $Densidad = "Sin dato";
    }
*/

    if ($Densidad == "0.000"){
        $DensidadBD = $Densidad;
        $Densidad = "Sin dato";        
    }
    else{
        $DensidadBD = $Densidad;
        $Densidad = number_format($Densidad,3,",",".")." g/ml";
    }

/* 
    if (!empty($Riqueza)){
        $Riqueza = number_format($Riqueza,2,",",".")."%";
    } 
    else{
        $Riqueza = "Sin dato";
    }
*/

    if ($Riqueza == "0.00"){
        $Riqueza = "Sin dato";        
    }
    else{
        $Riqueza = number_format($Riqueza,2,",",".")."%";
    }

/*    if (!empty($Basicidad)){
        $Basicidad = number_format($Basicidad,2,",",".");
    }        
    else{
        $Basicidad = "Sin dato";        
    }*/

    if ($Basicidad == "0.00"){
        $Basicidad = "Sin dato";
    }
    else{
        $Basicidad = number_format($Basicidad,2,",",".");
    }
 
    if (!empty($Volumen_Filtrado)){
        $Volumen_Filtrado = number_format($Volumen_Filtrado,0,",",".") ." lts.";
    }
    else{        
        $Volumen_Filtrado = "Sin dato";
    }   

    if (!empty($Notas)){        
        $Notas = "abc";
    }
}

if (($producto == "ferrico")){        

    if (!empty($Volumen_Inicial)){
        $Volumen_Inicial = number_format($Volumen_Inicial,0,",",".")." lts";
    } 
    else{
        $Volumen_Inicial = "Sin dato";
    }

    if (!empty($Volumen_Final)){
        $Volumen_Final = number_format($Volumen_Final,0,",",".")." lts";
    } 
    else{
        $Volumen_Final = "Sin dato";
    }

    if(!empty($Fecha)){
        $Fecha = date("d-m-Y", strtotime($Fecha));
    }
    else{
        $Fecha = "Sin dato";
    }

    if (!empty($Densidad)){
        $DensidadBD = $Densidad;
        $Densidad = number_format($Densidad,2,",",".")." g/ml";           
    } 
    else{
        $DensidadBD = $Densidad;
        $Densidad = "Sin dato";
    }

    if (!empty($Riqueza)){
        $Riqueza = number_format($Riqueza,2,",",".")."%";
    } 
    else{
        $Riqueza = "Sin dato";
    }

    if (!empty($Acido)){
        $Acido = number_format($Acido,2,",",".")."%";
    } 
    else{
        $Acido = "Sin dato";
    }
    
    if (!empty($Notas)) {
        $Notas = "abc";  
    }
    else
    {
        $Notas="";
    }    
}

if ($producto=="hb10"){

    if (!empty($Volumen)){
        $Volumen = number_format($Volumen,0,",",".")." lts";
    } 
    else{
        $Volumen = "Sin dato";
    }

    if(!empty($Fecha)){
        $Fecha = date("d-m-Y", strtotime($Fecha));
    }
    else{
        $Fecha = "Sin dato";
    }

    if (!empty($Densidad)){
        $DensidadBD = $Densidad;
        $Densidad = number_format($Densidad,3,",",".")." g/ml";        
    } 
    else{
        $DensidadBD = $Densidad;
        $Densidad = "Sin dato";
    }

    if (!empty($Riqueza)){
        $RiquezaBD = $Riqueza;
        $Riqueza = number_format($Riqueza,2,",",".")."%";
    } 
    else{
        $RiquezaBD = $Riqueza;
        $Riqueza = "Sin dato";
    }

    if (!empty($Basicidad)){
        $BasicidadBD = $Basicidad;
        $Basicidad = number_format($Basicidad,0,",",".");
    } 
    else{
        $BasicidadBD = $Basicidad;
        $Basicidad = "Sin dato";
    }
    
    if (!empty($Notas)) {
        $Notas = "abc";  
    }
    else
    {
        $Notas="";
    }
}

if (($producto=="s3") or ($producto=="sulfacid")){

    if(!empty($Fecha)){
        $Fecha = date("d-m-Y", strtotime($Fecha));
    }
    else{
        $Fecha = "Sin dato";
    }    
    
    if (!empty($Volumen)){
        $Volumen = number_format($Volumen,0,",",".")." lts";
    } 
    else{
        $Volumen = "Sin dato";
    }    

    if (!empty($Densidad)){
        $DensidadBD = $Densidad;
        $Densidad = number_format($Densidad,3,",",".")." g/ml";        
    } 
    else{
        $DensidadBD = $Densidad;
        $Densidad = "Sin dato";
    }

    if (!empty($Riqueza)){
        $RiquezaBD = $Riqueza;
        $Riqueza = number_format($Riqueza,2,",",".")."%";
    } 
    else{
        $RiquezaBD = $Riqueza;
        $Riqueza = "Sin dato";
    }   

    if (!empty($ph)){
        $phBD = $ph;
        $ph = number_format($ph,2,",",".");        
    }
    else{
        $phBD = $ph;
        $ph = "Sin dato";
    }
    
    if (!empty($Notas)) {
        $Notas = "abc";  
    }
    else
    {
        $Notas="";
    }
}

/*if ($producto == "camiones" and empty($_POST['submit'])){    
    for ($i=0; $i<7; $i++){
        $FechasCEE[$i] = date("d-m-Y", strtotime($Fechas[$i]));
    }
}*/

if ($producto == "camiones" and !empty($_POST['submit'])){    

    $Fecha = date("d-M-Y", strtotime($Fecha));         

    $CargaP18 = $CargasP18;

    if ($CargaP18 == ""){
        $CargaP18 = "0.0";
    }     
    
    $DescargaP18 = $DescargasP18;
    
    if ($DescargaP18 == ""){
        $DescargaP18 = "0.0";
    }

    $CargaSulfato = $CargasSulfato;

    if ($CargaSulfato == ""){
        $CargaSulfato = "0.0";
    }    

    $DescargaSulfato = $DescargasSulfato;

    if ($DescargaSulfato == ""){
        $DescargaSulfato = "0.0";
    }    

    $CargaHCL = $CargasHCL;

    if ($CargaHCL == ""){
        $CargaHCL = "0.0";
    }    

    $DescargaHCL = $DescargasHCL;

    if ($DescargaHCL == ""){
        $DescargaHCL = "0.0";
    }       

    $CargaHB10 = $CargasHB10;

    if ($CargaHB10 == ""){
        $CargaHB10 = "0.0";
    }   

    $DescargaHB10 = $DescargasHB10;

    if ($DescargaHB10 == ""){
        $DescargaHB10 = "0.0";
    }    

    $CargaS3 = $CargasS3;

    if ($CargaS3 == ""){
        $CargaS3 = "0.0";
    }    

    $DescargaS3 = $DescargasS3;

    if ($DescargaS3 == ""){
        $DescargaS3 = "0.0";
    }    

    $CargaFerrico = $CargasFerrico;

    if ($CargaFerrico == ""){
        $CargaFerrico = "0.0";
    }    

    $DescargaFerrico  = $DescargasFerrico;

    if ($DescargasFerrico == ""){
        $DescargasFerrico = "0.0";
    }   

    $CargaSosa = $CargasSosa;

    if ($CargaSosa == ""){
        $CargaSosa = "0.0";
    }   

    $DescargaSosa = $DescargasSosa;
    
    if ($DescargaSosa == ""){
        $DescargaSosa = "0.0";
    }

    $CargaSulfurico = $CargasSulfurico;   

    if ($CargaSulfurico == ""){
        $CargaSulfurico = "-----";
    }        
    
    $DescargaSulfurico = $DescargasSulfurico;

    if ($DescargaSulfurico == ""){
        $DescargaSulfurico = "0.0";
    }

    $CargaHipo = "-----";

    if ($DescargaHipo == ""){
        $DescargaHipo = "0.0";
    }
}

?>
