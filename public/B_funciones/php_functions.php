<?php 
    function ComprobarFechas($desde, $hasta){
        if ($desde > $hasta){
            echo "<script>
                        alert('Fecha INICIAL menor a la FINAL. Introduzca nuevas fechas');
                        window.location.href='indexBuscador.php';
                 </script>"; 
        };        
    }

    function MaximoEs($producto, $miconexion){        
        $consultaMaximo="SELECT * FROM $producto ORDER BY NumeroFabricacion DESC LIMIT 1";
        $resultadoMaximo = mysqli_query ($miconexion, $consultaMaximo) 
            or die("No se puede realizar la consulta");
        $filaMaximo = mysqli_fetch_array($resultadoMaximo);
        mysqli_data_seek($resultadoMaximo, 0);            
        extract($filaMaximo);
        $maximo = $filaMaximo['NumeroFabricacion'];     
        return($maximo);
    }
?>