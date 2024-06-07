<script language="JavaScript" src="../js/funciones.js"></script>

<?php

require ("../Includes/miconexion.php");

if ($producto == "filtrado"){
    $parametro = "id";
}
elseif ($producto == "camiones"){
    $parametro = "Fecha";
}
else {
    $parametro = "NumeroFabricacion";
}

// ---- PARTE NUEVA. Recogemos todas las fechas de la consulta y creamos un array de fechas---- //

if(empty($_POST) and ($producto == "camiones")){

    //Condición 1 -- AL ENTRAR en el índex de CAMIONES

    $consulta="SELECT * FROM $producto ORDER BY $parametro DESC LIMIT 7";

    $resultado = mysqli_query ($miconexion, $consulta) 
                            or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0);       
    
    $Fechas = array();    
    $Cargasp18 = array();
    $Descargasp18 = array();
    $Cargassulfato = array();
    $Descargassulfato = array();
    $Cargashcl = array();
    $Descargashcl = array();
    $Cargashb10 = array();
    $Descargashb10 = array();
    $Cargass3 = array();
    $Descargass3 = array();
    $Cargasferrico = array();
    $Descargasferrico = array();
    $Cargassosa = array();
    $Descargassosa = array();
    $Descargassulfurico = array();
    $Descargashipo = array();
    
        for ($i=0; $i<5; $i++){            
            while ($fila = mysqli_fetch_array($resultado)){        
                extract($fila);                    
                //$dato = $fila[0];   //Fecha                
                $dato = $fila['Fecha'];
                //$dato2 = $fila[2]; 
                $dato2 = $fila['CargasP18'];                
                //$dato3 = $fila[3];  //Descargas de P18
                $dato3 = $fila['DescargasP18'];
                //$dato4 = $fila[4];
                $dato4 = $fila['CargasSulfato'];
                //$dato5 = $fila[5];
                $dato5 = $fila['DescargasSulfato'];                
                //$dato6 = $fila[6];
                $dato6 = $fila['CargasHCL'];                
                //$dato7 = $fila[7];
                $dato7 = $fila['DescargasHCL'];
                //$dato8 = $fila[8];
                $dato8 = $fila['CargasHB10'];
                //$dato9 = $fila[9];
                $dato9 = $fila['DescargasHB10'];                
                //$dato10 = $fila[10];
                $dato10 = $fila['CargasS3'];
                //$dato11 = $fila[11];
                $dato11 = $fila['DescargasS3'];                
                //$dato12 = $fila[12];
                $dato12 = $fila['CargasFerrico'];
                //$dato13 = $fila[13];
                $dato13 = $fila['DescargasFerrico'];                
                //$dato14 = $fila[14];
                $dato14 = $fila['CargasSosa'];
                //$dato15 = $fila[15];
                $dato15 = $fila['DescargasSosa'];                
                //$dato16 = $fila[16];
                $dato16 = $fila['CargasSulfurico'];
                //$dato17 = $fila[17];
                $dato17 = $fila['DescargasSulfurico'];
                //$dato18 = $fila[18];
                $dato18 = $fila['DescargaHipo'];
                
                $Fechas[]= $dato;
                $Cargasp18[] = $dato2; 
                $Descargasp18[] = $dato3;
                $Cargassulfato[] = $dato4;
                $Descargassulfato[] = $dato5;
                $Cargashcl[] = $dato6;
                $Descargashcl[] = $dato7;
                $Cargashb10[] = $dato8;
                $Descargashb10[] = $dato9;
                $Cargass3[] = $dato10;
                $Descargass3[] = $dato11;
                $Cargasferrico[] = $dato12;
                $Descargasferrico[] = $dato13; 
                $Cargassosa[] = $dato14;
                $Descargassosa[] = $dato15;
                $Descargassulfurico[] = $dato17;
                $Descargashipo[] = $dato18;                
                //require("../Includes/formatodatos.php");
            }                 
        }             
        for ($i=0; $i<7; $i++){
            $FechasCEE[$i] = date("d/m/Y", strtotime($Fechas[$i]));
        }

        require("../Includes/formatodatos.php");
        require("../Includes/tablas.php"); 
        
//-------------------------- FIN PARTE NUEVA
}    
if(empty($_POST) and ($producto <> "camiones")){
    //CONDICÍÓN 2 - Se produce al entrar en el índice de cualquier producto menos CAMIONES
    
    $consulta="SELECT * FROM $producto ORDER BY $parametro DESC LIMIT 10";   

    $resultado = mysqli_query ($miconexion, $consulta) 
                            or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0);    

    while ($fila = mysqli_fetch_array($resultado)){        
        extract($fila);   
        require("../Includes/formatodatos.php");
        require("../Includes/tablas.php"); 
    }
}
elseif (!empty($_POST) and ($producto <> "camiones")){    
//CONDICIÓN 3 - Se produce en todos los casos menos en los camiones, al pulsar sobre el botón BUSCAR y hay un valor a buscar
    
/*----------------------------------- INICIO OPCION 2 ---------------------------------------------------
                    Esta opcíón se produce al rellenar el campo y pulsar BUSCAR                              */
/*----------------------------------------------------------------------------------------------------- */    

    require("../funciones/consulta_maximo.php");
    require("../funciones/consulta_minimo.php");    
        
    $valor = $_POST['campo'];     
        
    if (!empty($valor)){
        if (($valor<$minimo)){                                         
            echo "<script language='javascript'>
                    alert('El valor de fabricacíon más pqueño es ".$minimo." ')
                  </script>";  
        }                                 

        if (($valor>$maximo)){
            echo "<script language='javascript'>
                    alert('El valor de fabricación más grande es ".$maximo."')
                  </script>";                   
        }               

        $consulta="SELECT * FROM $producto WHERE $parametro = '$valor'";        
        
        $resultado = mysqli_query ($miconexion, $consulta) 
                    or die("No se puede realizar la consulta:");

        $fila = mysqli_fetch_array($resultado);
        mysqli_data_seek($resultado, 0);
                
        if (empty($fila)){                        
            $consulta="SELECT * FROM $producto ORDER BY $parametro DESC LIMIT 10";
            $resultado = mysqli_query ($miconexion, $consulta) 
                                    or die("No se puede realizar la consulta");
            $fila = mysqli_fetch_array($resultado);
            mysqli_data_seek($resultado, 0); 
            while ($fila = mysqli_fetch_array($resultado)){
                extract($fila);                                  
                require("../Includes/formatodatos.php");
                require("../Includes/tablas.php"); 
            }            
        }    
        else{
            extract($fila);   
            require("../Includes/formatodatos.php");
            require("../Includes/tablas.php"); 
        }    
    }
}

if (!empty($_POST) and ($producto == "camiones")){
    //CONDICIÓN 4 - S produce cuando se pulsa buscar en CAMIONES y hay un valor a buscar       
    $parametro = $_POST['campo'];    

    /*if ($parametro == ""){
        //Volver a cargar la tabla tal como estaba
    }*/

    $consulta = "SELECT * FROM camiones WHERE Fecha = '$parametro'";    

    $resultado = mysqli_query ($miconexion, $consulta) 
                            or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);    
    mysqli_data_seek($resultado, 0);
    while ($fila = mysqli_fetch_array($resultado)){
        extract($fila);
        
        require("../Includes/formatodatos.php");
        require("../Includes/tablamuelles.php");            
    }    
}
  
if(!empty($_POST['submit']) and empty($valor) and $producto <> "camiones") {
    //CONDICIÓN 5 - Se produce al pulsar BUSCAR sin dato a buscar y estamos en cualquier sitio menos en CAMIONES

    /* print_r($_POST);
    echo "<br>";
    echo $valor;
    echo "<br>";
    echo $producto;
    exit;*/
    
    $consulta="SELECT * FROM $producto ORDER BY $parametro DESC LIMIT 10";   
    
    $resultado = mysqli_query ($miconexion, $consulta) 
                                or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);        
    mysqli_data_seek($resultado, 0);    
    
    while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);            

    require("../Includes/formatodatos.php");    
    require("../Includes/tablas.php");            
    }    
}

if(!empty($_POST['submit']) and $producto == "camiones") {    
    //CONDICIÓN 6 - SE PRODUCE AL PULSAR EN BUSCAR sin dato en el inputtext y estamos en CAMIONES
    //echo "6"; exit;

    $consulta="SELECT * FROM $producto ORDER BY Fecha DESC LIMIT 7";   
    
    $resultado = mysqli_query ($miconexion, $consulta) 
    or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);
    mysqli_data_seek($resultado, 0);    

    $Fechas = array();    
    $Cargasp18 = array();
    $Descargasp18 = array();
    $Cargassulfato = array();
    $Descargassulfato = array();
    $Cargashcl = array();
    $Descargashcl = array();
    $Cargashb10 = array();
    $Descargashb10 = array();
    $Cargass3 = array();
    $Descargass3 = array();
    $Cargasferrico = array();
    $Descargasferrico = array();
    $Cargassosa = array();
    $Descargassosa = array();
    $Descargassulfurico = array();
    $Descargashipo = array();

    for ($i=0; $i<5; $i++){            
    while ($fila = mysqli_fetch_array($resultado)){        
    extract($fila);                    
    $dato = $fila[0];        //Fecha                
    $dato2 = $fila[2];      //Cargas de P18
    $dato3 = $fila[3];      //Descargas de P18
    $dato4 = $fila[4];
    $dato5 = $fila[5];
    $dato6 = $fila[6];
    $dato7 = $fila[7];
    $dato8 = $fila[8];
    $dato9 = $fila[9];
    $dato10 = $fila[10];
    $dato11 = $fila[11];
    $dato12 = $fila[12];
    $dato13 = $fila[13];
    $dato14 = $fila[14];
    $dato15 = $fila[15];
    $dato16 = $fila[16];
    $dato17 = $fila[17];    

    $Fechas[]= $dato;
    $Cargasp18[] = $dato2; 
    $Descargasp18[] = $dato3;
    $Cargassulfato[] = $dato4;
    $Descargassulfato[] = $dato5;
    $Cargashcl[] = $dato6;
    $Descargashcl[] = $dato7;
    $Cargashb10[] = $dato8;
    $Descargashb10[] = $dato9;
    $Cargass3[] = $dato10;
    $Descargass3[] = $dato11;
    $Cargasferrico[] = $dato12;
    $Descargasferrico[] = $dato13; 
    $Cargassosa[] = $dato14;
    $Descargassosa[] = $dato15;
    $Descargassulfurico[] = $dato16;
    $Descargashipo[] = $dato17;       

    }                 
    }   
    
    for ($i=0; $i<7; $i++){
        $FechasCEE[$i] = date("d/m/Y", strtotime($Fechas[$i]));
    }

    //echo "6";
    //print_r($Fechas); exit;

    require("../Includes/formatodatos.php");
    //require("../Includes/tablamuelles.php"); 
    require("../Includes/tablas.php"); 

}
mysqli_close($miconexion);
?>
