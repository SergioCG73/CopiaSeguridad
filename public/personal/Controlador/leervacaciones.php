<?php     
    if (empty($_POST)){        
        $año = date("Y");        
        $tipo = "1"; //El tipo "1" corresponde a "Vacaciones"
    }
    else{
        $tipo = $_POST['tipo'] ;
        $año = $_POST['año'];        
    }  

    require_once("../Modelo/autoload.php");        
    $readData = new Asalariados();        
    $resultado = $readData->getVacaciones($dni, $año, $tipo);
    echo 
    "<table>
        <thead>                        
                <tr>
                    <th>
                        Fecha de Inicio
                    </th>
                    <th>
                        Fecha Finalización 
                    </th>
                    <th>
                        Días
                    </th>
                    <th>
                        Tipo
                    </th>
                    <th>

                    </th>
                </tr>
            </td>
        </thead>
            ";
        foreach($resultado as $valor ){
            echo "<td>";                         
                    echo $Fecha_Inicio_Cambiada = date("d-m-Y", strtotime($valor->Fecha_Inicio));
                echo "</td>";
                echo "<td>";
                    if ($valor->Fecha_Fin == "0000-00-00"){
                        $valor->Fecha_Fin = date("d-m-Y");                                                                        
                    }                    
                    echo $valor->Fecha_Fin_Cambiada = DATE("d-m-Y", strtotime($valor->Fecha_Fin));                    
                echo "</td>";
                echo "<td>";                                
                    $dias = (strtotime($valor->Fecha_Fin) - strtotime($valor->Fecha_Inicio));
                    echo number_format(($dias = ($dias/86400)+1),0);                                
                echo "</td>";
                echo "<td>";
                    include("../Modelo/tipos.php");                                
                echo "</td>";
                echo "<td>";                    
                    echo "<a href='../Vista/Editar_Fechas.php?fechainicio=$valor->Fecha_Inicio&fechafin=$valor->Fecha_Fin&id=$valor->Id_Dia&notas=$valor->Notas&tipo=$valor->Tipo&dni=$valor->DNI'>Editar - Borrar</a>";
                echo "</td>";                
                echo "<td>";                    
                echo "</td>";
            echo "</tr>";            
        }                        
        echo"<tbody>";
        echo "</tbody>";
    echo"</table>";
?>