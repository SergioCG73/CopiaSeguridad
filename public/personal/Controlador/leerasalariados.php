<?php    
    require_once("Modelo/autoload.php");
    $readData = new Asalariados();     
    $resultado = $readData->getAllAsalariados();    
    // Dibujamos la tabla con el resultado de la consulta//
     echo 
     "<table>
         <thead>                        
                 <tr>
                     <th>
                         DNI
                     </th>
                     <th>
                         Nombre
                     </th>
                     <th>
                         Apellidos
                     </th>
                     <th>
                         Puesto
                     </th>
                     <th>
                         Modificar
                     </th>
                     <th>
                         Borrar
                     </th>
                     <th>
                         Absentismo
                     </th>
                 </tr>
             </td>
         </thead>
             ";
         foreach($resultado as $valor ){                        
             echo "<tr>";
                 echo "<td>"; 
                     echo $valor->DNI;
                 echo "</td>"; 
                 echo "<td>";
                     echo $valor->Nombre;
                 echo "</td>";
                 echo "<td>";
                     echo $valor->Apellidos;
                 echo "</td>";
                 echo "<td>";           
                     switch($valor->Id_Puesto){
                         case "1": $valor->Id_Puesto = "Operario de planta";
                         break;
                         case "2": $valor->Id_Puesto = "Administrativa Logística";
                         break;
                         case "3": $valor->Id_Puesto = "Laboratorio";
                         break;
                         case "4": $valor->Id_Puesto = "Responsable Producción";
                         break;
                         case "5": $valor->Id_Puesto = "Responsable de Planta";
                         break;
                         case "6": $valor->Id_Puesto = "Responsable de Calidad";
                         break;
                         case "7": $valor->Id_Puesto = "Envasador";
                         break;
                     }                            
                     echo $valor->Id_Puesto;                                
                 echo "</td>";
                 echo "<td>";                                                                
                     echo "<a href='Vista/form_Editar.php?id=$valor->DNI'>Editar</a>";
                 echo "</td>";
                 echo "<td>";
                 echo "<a href='borrar.php?id=<?php echo $valor->DNI;?>'>Eliminar</a>";                                
                 echo "</td>";
                 echo "<td>";
                     echo "<a href='Vista/addDay.php?id=$valor->DNI'>Agregar</a>";
                 echo "</td>";                            
             echo "</tr>";
         }
         echo"<tbody>";
         echo "</tbody>";
     echo"</table>";


?>
