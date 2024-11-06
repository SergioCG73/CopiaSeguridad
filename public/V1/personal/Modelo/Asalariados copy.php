<?php 
    require_once("autoload.php");

    class Asalariados extends Conexion{
        private $strDNI;
        private $strNombre;
        private $strApellidos;
        private $intPuesto;
        private $strFechaAlta;
        private $strFechaInicio;        
        private $strFechaFin;
        private $intTipo;  //añadiendo tipo de absentismo
        private $strNotas;
        private $strFechaInicioContrato;
        private $strFechaFinContrato;
        private $strEmpresa;
        private $conectar;

        public function __construct(){
            $this->conectar = new Conexion();
            $this->conectar = $this->conectar->connect();
        }

        public function getAllAsalariados(){
            try{   
                //$consulta = $this->conectar->query("SELECT * FROM asalariados");
                $consulta = $this->conectar->query("SELECT * FROM asalariados WHERE Fecha_Baja IS NULL");
                $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
                /*echo "<pre>";
                print_r($resultado);
                echo "</pre>";
                exit;*/
                // Dibujamos la tabla con el resultado de la consulta
                
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
                                echo "<a href='form_Editar.php?id=$valor->DNI'>Editar</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='borrar.php?id=<?php echo $valor->DNI;?>'>Eliminar</a>";                                
                            echo "</td>";
                            echo "<td>";
                                echo "<a href='agregarVacaciones2.php?id=$valor->DNI'>Agregar</a>";                            
                            echo "</td>";                            
                        echo "</tr>";
                    }
                    echo"<tbody>";
                    echo "</tbody>";
                echo"</table>";
                
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
        }

        public function InsertarAsalariado(string $DNI, string $nombre, string $apellidos, int $Id_Puesto, string $Fecha_Alta){
            try{
                $this->strDNI = $DNI;
                $this->strNombre = $nombre;
                $this->strApellidos = $apellidos;
                $this->intPuesto = $Id_Puesto;            
                $this->strFechaAlta = $Fecha_Alta;
                $consulta = "INSERT INTO asalariados(DNI, Nombre, Apellidos, Id_Puesto, Fecha_Alta) VALUES (?,?,?,?,?)";                
                $insert = $this->conectar->prepare($consulta);            
                $arrData = array($this->strDNI, $this->strNombre, $this->strApellidos, $this->intPuesto, $this->strFechaAlta);
                $resInsert = $insert->execute($arrData);

                echo "<script type='text/javascript'>
                        alert('Registro guardado correctamente');
                        window.location.href='../Vista/indexPersonal.php';
                    </script>";
                
                //header('Refresh: 5; URL=index.php');
                
            } catch(PDOException $e) {                
                throw new Exception("Error de consulta: " .$e->getMessage());
            }
        }

        public function InsertarVacaciones(string $DNI, string $FechaInicio, string $FechaFinal, int $Tipo, string $Notas){
            try{
                $this->strDNI = $DNI;                
                $this->strFechaInicio = $FechaInicio;
                $this->strFechaFin = $FechaFinal;                
                $this->intTipo = $Tipo;
                $this->strNotas = $Notas;
                //$consulta = "INSERT INTO vacaciones(DNI, Fecha_Inicio, Fecha_Fin, Tipo, Notas) VALUE (?,?,?,?,?)";
                $consulta = "INSERT INTO vacaciones2(DNI, Fecha_Inicio, Fecha_Fin, Tipo, Notas) VALUE (?,?,?,?,?)";
                $insert = $this->conectar->prepare($consulta);
                $arrData = array($this->strDNI, $this->strFechaInicio, $this->strFechaFin, $this->intTipo, $this->strNotas);
                $resInsert = $insert->execute($arrData);

                echo "<script type='text/javascript'>
                        alert('Registro guardado correctamente');
                        window.location.href='../Vista/indexPersonal.php';
                    </script>";
                    
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: " .$e->getMessage());
            }            
        }

       /* public function InsertarContrato(string $Empresa, string $DNI, string $Fecha_Inicio_Contrato, string $Fecha_Fin_Contrato, string $Notas){
            try{
                $this->strEmpresa = $Empresa;
                $this->strDNI = $DNI;
                $this->strFechaInicioContrato = $Fecha_Inicio_Contrato;
                $this->strFechaFinContrato = $Fecha_Fin_Contrato;
                $this->strNotas = $Notas;
                
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
        }*/

        

        public function getOneAsalariado(string $id){
            try{
                //$consulta = $this->conectar->query("SELECT * FROM asalariados WHERE DNI='$id'");
                $consulta = $this->conectar->query("SELECT * FROM asalariados WHERE DNI='$id'");
                $resultado = $consulta->fetch(PDO::FETCH_OBJ);                
                return $resultado;
                //echo $resultado->DNI;        
                //echo $resultado->Nombre;                     
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
        }
        
        public function getVacaciones(string $id){
            try{
                //Consulta las vacaciones del año en curso
                $año= date("Y"); //Obtenemos el año actual
                //$consulta = $this->conectar->query("SELECT * FROM vacaciones WHERE DNI='$id' AND YEAR(Fecha_Inicio)='$año'");                
                $consulta = $this->conectar->query("SELECT * FROM `vacaciones` WHERE `DNI`='$id' AND YEAR(`Fecha_Inicio`)='$año' AND `Tipo`='1'");                
                $resultado1 = $consulta->fetchAll(PDO::FETCH_OBJ);                     
                //echo "<a target='_blank' href='agregarVacaciones2.php?id=$id'>Agregar</a>";              

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
                    foreach($resultado1 as $valor ){
                        echo "<tr>";                            
                            echo "<td>";
                                echo $valor->Fecha_Inicio;
                            echo "</td>";
                            echo "<td>";
                                echo $valor->Fecha_Fin;
                            echo "</td>";
                            echo "<td>";
                                $dias = (strtotime($valor->Fecha_Fin) - strtotime($valor->Fecha_Inicio));
                                echo $dias = ($dias/86400)+1;                                
                            echo "</td>";
                            echo "<td>";
                                include("../Modelo/tipos.php");                                
                            echo "</td>";
                            echo "<td>";
                                echo "<a target='_blank' href='?????.php'>Modificar</a>";
                            echo "</td>";
                            echo "<td>";
                                //echo "<a target='_blank' href='agregarVacaciones2.php?id=$id'>Agregar</a>";
                            echo "</td>";
                        echo "</tr>";         
                    }                        
                    echo"<tbody>";
                    echo "</tbody>";
                echo"</table>";                
                return $resultado1;
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }

        }
    }
?>
