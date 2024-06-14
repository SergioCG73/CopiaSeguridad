<script language="JavaScript" src="Controlador/js/functions.js"></script>  <!--Se añade el script para el aviso al borrar registro -->
<?php    
    if (isset($_GET['dni'])){        
        require_once("../Modelo/autoload.php"); //Hacen falta los ../ porque lo estoy leyendo desde Vista/form_Editar.php        
        $dni = $_GET['dni'];
        $readData = new Asalariados();        
        $resultado = $readData->getOneAsalariado($dni);
        $DNI = $resultado->DNI;          
        $Nombre = $resultado->Nombre;        
        $Apellidos = $resultado->Apellidos;        
        $Id_Puesto = $resultado->Id_Puesto;        
        $FechadeAlta = $resultado->Fecha_Alta;           
        $FechadeBaja = $resultado->Fecha_Baja;        
    }
    else {                    
        require_once("Modelo/autoload.php"); // No hacen falta los ../ porque lo estoy leyendo desde readWorker.php
        $readData = new Asalariados();
        $resultado = $readData->getAllAsalariados();    
        echo 
            "<table>
                <thead>                        
                    <tr>
                        <th>
                            DNI
                        </th>
                        <th>
                            NOMBRE
                        </th>
                        <th>
                            APELLIDOS
                        </th>
                        <th>
                            PUESTO
                        </th>
                        <th>
                            MODIFICAR
                        </th>
                        <th>
                            BORRAR
                        </th>
                        <th>
                            ABSENTISMO
                        </th>
                    </tr>
                </thead>
            ";
        foreach($resultado as $valor ){            
            echo "<tr class='coral'>";
                echo "<td>";
                     echo $valor->DNI;
                echo "</td>";
                echo "<td>";
                    echo $valor->Nombre;
                echo "</td>";
                echo "<td>";
                    echo $valor->Apellidos;
                echo "</td>";                                     
                    switch($valor->Id_Puesto){                         
                        case "1":                     
                            $valor->Id_Puesto = "Operario planta";
                            $linea = "<td class='red'>$valor->Id_Puesto</td>";
                        break;
                        case "2": 
                            $valor->Id_Puesto = "Administrativa Logística";
                            $linea = "<td class='yellow'>$valor->Id_Puesto</td>";
                        break;
                        case "3": 
                            $valor->Id_Puesto = "Laboratorio";
                            $linea = "<td class='grey'>$valor->Id_Puesto</td>";
                        break;
                        case "4": 
                            $valor->Id_Puesto = "Responsable Producción";
                            $linea = "<td class='orange'>$valor->Id_Puesto</br></td>";
                        break;
                        case "5": 
                            $valor->Id_Puesto = "Responsable de Planta";
                            $linea = "<td class='green'>$valor->Id_Puesto</br></td>";
                        break;
                        case "6": 
                            $valor->Id_Puesto = "Responsable de Calidad";
                            $linea = "<td class='blue'>$valor->Id_Puesto</br></td>";
                        break;
                        case "7": 
                            $valor->Id_Puesto = "Envasador";
                            $linea = "<td class='pink'>$valor->Id_Puesto</br></td>";
                        break;
                        case "8": 
                            $valor->Id_Puesto = "Sin asignar puesto";
                            $linea = "<td class=''>$valor->Id_Puesto</br></td>";
                        break;
                     }                                             
                echo $linea;
                echo "</td>";
                echo "<td>";                                                                          
                    echo "<a href='Vista/form_Editar.php?dni=$valor->DNI'>
                                <img src='Vista/images/lapiz_icon.png'/>
                           </a>";
                echo "</td>";
                echo "<td>";
                    echo "<a onclick='return alertaBorrar();' href='Controlador/deleteWorker.php?dni=$valor->DNI'>
                                <img src='Vista/images/basura_icon.png'/>
                          </a>";
                echo "</td>";
                echo "<td>";
                    echo "<a href='Vista/agregarVacaciones.php?dni=$valor->DNI'>
                        <img src='Vista/images/plus_icon.png'/>
                     </a>";
                echo "</td>";                            
            echo "</tr>";
        }
         echo"<tbody>";
         echo "</tbody>";
     echo"</table>";
    }
?>