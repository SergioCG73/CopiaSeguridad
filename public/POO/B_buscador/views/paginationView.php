<?php require_once('functions/PHP_Functions.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet" text="text/css">
    <link href="../lib/images/favicon.png" rel="icon" type="image/png">
    <title>Paginador</title>
</head>
<body>    
    <!--<header>BUSCADOR</header>-->
    <!--<div name="formulario" id="formulario">-->
    <div name="container" id="container">
        <fieldset><legend>CAMPOS DE BÚSQUEDA</legend>
        <form id="formulario" method="post" action="">
            <label for="start_date">Fecha de inicio:</label>
            <input type="date" id="start_date" name="start_date" required>
            
            <label for="end_date">Fecha de fin:</label>
            <input type="date" id="end_date" name="end_date" required>
            
            <label for="table">Producto:</label>
            <select name="table" id="table" required>                
                    <option value="p18">P18</option>
                    <option value="sulfato">Sulfato</option>
                    <option value="ferrico">Férrico</option>
                    <option value="hb10">HB-10</option>
                    <option value="sulfacid">SulfaCID</option>
            </select>
            <label>Items por tabla</label>
            <select name="limit" id="limit">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="all">Todos</option>
            </select>
            </form>
            <div class="botonera">
                <!--<button type="submit">Buscar</button>-->
                <input type="submit" form="formulario" value="Buscar">
                <!--<a href="../../portada.html"><button>Portada</button></a>-->
                <a class="button" href="../../portada.html">Portada</a>
            </div>
        </fieldset>
    </div>
    
    <?php    
//P18     
        if (!empty($data) and ($table == "p18" /*or $table == "sulfato"*/)){        
            //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
            echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
            echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
            echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
            echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
            echo "<script src='js/script.js'> </script>";
            //-----------FIN MANTENER FIJOS-----------------------------------------------------            
            tablaP18($table, $data);            
            echo "</tbody> </table> </div>";                                       
        }

//SULFATO
        if (!empty($data) and ($table == "sulfato")){        
            //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
            echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
            echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
            echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
            echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
            echo "<script src='js/script.js'> </script>";
            //-----------FIN MANTENER FIJOS-----------------------------------------------------    
            tablaSulfato($table, $data);
            echo "</tbody> </table> </div>";    
        }

//HB10
        if (!empty($data) and ($table == "hb10")){ 
            //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
            echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
            echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
            echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
            echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
            echo "<script src='js/script.js'> </script>";
            //-----------FIN MANTENER FIJOS--------------------------------------
            tablaHB10($table, $data);
            echo "</tbody> </table> </div>";                                       
        };

//SULFACID
        if (!empty($data) and ($table == "s3" or $table == "sulfacid")){ 
            //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
            echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
            echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
            echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
            echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
            echo "<script src='js/script.js'> </script>";
            //-----------FIN MANTENER FIJOS-----------------------------------------------
            tablaSulfacid($table, $data);     
            echo "</tbody> </table> </div>";                                       
        };

//FÉRRICO
        if (!empty($data) and ($table == "ferrico")){            
                //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
                echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
                echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
                echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
                echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
                echo "<script src='js/script.js'> </script>";
                //-----------FIN MANTENER FIJOS---------------------------------------------
            tablaFerrico($table, $data);       
            echo "</tbody> </table> </div>";
        }

//SULFACID
            /*if (!empty($data) and ($table == "sulfacid" or $table == "s3")){ 
                echo "aquí"; exit;
                //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
                echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
                echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
                echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
                echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
                echo "<script src='js/script.js'> </script>";
                //-----------FIN MANTENER FIJOS---------------------------------------------
                tablaSulfacid($table, $data);       
                echo "</tbody> </table> </div>";
            }*/
    ?>  
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){                    
                $FechaHoraInicio = $_POST['start_date'];
                $FechaHoraFinal = $_POST['end_date'];
                
                if ($FechaHoraInicio > $FechaHoraFinal){                    
                    echo ("Hora menor a inicial");                 
                }
                
                echo "<div class='paginacion'>";
                echo $model->createLinks(5, 'pagination', $limit, $total_registros, $startDate, 
                                        $endDate, $page, $offset, $table, $data); 
                echo "</div>";
            }                
            elseif (isset($_GET['page'])){                
                $page = $_GET['page'];
                $table = $_GET['table'];
                $startDate = $_GET['startDate'];
                $endDate = $_GET['endDate'];
                $limit = $_GET['limit'];
                $offset = ($page - 1) * $limit;
                $total_registros = $model->countRegistros($table, $startDate, $endDate);
                $data = $model->getData($table, $startDate, $endDate, $limit, $page, $offset);

            //-----------DATOS PARA MANTENER LOS DATOS DE BÚSQUEDA FIJADOS ---------------------
            echo '<input type="hidden" name="star_date" id="dato1" value= "' . $startDate .'">';   
            echo '<input type="hidden" name="end_date" id="dato2" value= "' . $endDate .'">';   
            echo '<input type="hidden" name="valor" id="dato3" value= "' . $table .'">';   
            echo '<input type="hidden" name="valor" id="dato4" value= "' . $limit .'">';
            echo "<script src='js/script.js'> </script>";
            //-----------FIN MANTENER FIJOS ----------------------------------------------
                                    
            if ($table == "ferrico"){                                  
                tablaFerrico($table, $data);                
                echo "<div class='paginacion'>"; 
                echo $model->createLinks(5, 'pagination', $limit, $total_registros, $startDate, $endDate, 
                                            $page, $offset, $table, $data);
                echo "</div>";        
            }

            if ($table == "hb10"){                           
                tablaHB10($table, $data);                
                echo "<div class='paginacion'>"; 
                echo $model->createLinks(5, 'pagination', $limit, $total_registros, $startDate, $endDate, 
                                            $page, $offset, $table, $data);
                echo "</div>";                
            }

            if ($table == "s3" or $table == "sulfacid"){                                    
                tablaSulfacid($table, $data);                
                echo "<div class='paginacion'>"; 
                echo $model->createLinks(5, 'pagination', $limit, $total_registros, $startDate, $endDate, 
                                            $page, $offset, $table, $data);
                echo "</div>";                
            }

            if ($table == "sulfato"){                                    
                tablaSulfato($table, $data);
                echo "<div class='paginacion'>"; 
                echo $model->createLinks(5, 'pagination', $limit, $total_registros, $startDate, $endDate, 
                                            $page, $offset, $table, $data);
                echo "</div>";                
            }

            if ($table == "p18"){
                tablaP18($table, $data);
                echo "<div class='paginacion'>"; 
                echo $model->createLinks(5, 'pagination', $limit, $total_registros, $startDate, $endDate, $page, $offset, 
                                        $table, $data);
                echo "</div>";
                return $data;
            }
                else{                                                     
               }                    
            }
        ?>        
    </div>    
</body>
</html>