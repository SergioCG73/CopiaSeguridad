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
                        Fecha de Inicios
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
            echo "<tr>";                            
                echo "<td>";
                    echo $valor->Fecha_Inicio;
                echo "</td>";
                echo "<td>";
                    if ($valor->Fecha_Fin == "0000-00-00"){
                        $valor->Fecha_Fin = date("Y-m-d");                                                                        
                    }
                    echo $valor->Fecha_Fin;
                echo "</td>";
                echo "<td>";                                
                    $dias = (strtotime($valor->Fecha_Fin) - strtotime($valor->Fecha_Inicio));
                    echo number_format(($dias = ($dias/86400)+1),0);                                
                echo "</td>";
                echo "<td>";
                    include("../Modelo/tipos.php");                                
                echo "</td>";
                echo "<td>";
                    echo "<a target='_blank' href='?????.php'>Modificar</a>";
                echo "</td>";
                echo "<td>";                    
                echo "</td>";
            echo "</tr>";         
        }                        
        echo"<tbody>";
        echo "</tbody>";
    echo"</table>";
?>