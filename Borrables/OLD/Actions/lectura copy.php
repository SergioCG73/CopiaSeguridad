<script language="JavaScript" src="../js/funciones.js"></script>

<?php

require ("../Includes/miconexion.php");

if ($producto == "filtrado"){
    $parametro = "id";    
}
else{
    $parametro ="NumeroFabricacion";
}

if(empty($_POST)){                
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
  
if(!empty($_POST['submit']) and empty($valor)) {   
    
    $consulta="SELECT * FROM $producto ORDER BY $parametro DESC LIMIT 10";
    $resultado = mysqli_query ($miconexion, $consulta) or die("No se puede realizar la consulta");
    $fila = mysqli_fetch_array($resultado);        
    mysqli_data_seek($resultado, 0);
    
    while ($fila = mysqli_fetch_array($resultado)){
            extract($fila);

    require("../Includes/formatodatos.php");    
    require("../Includes/tablas.php");            
    }    
}
mysqli_close($miconexion);
?>
