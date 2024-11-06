<?php 
    require_once("autoload.php");

    class Asalariados extends Conexion{
        private $strDNI;
        private $strID;
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

        public function deleteDate(string $id, string $dni){
            try{
                $this->strID = $id; 
                $consulta = "DELETE FROM dias_no_trabajados WHERE Id_Dia = :id";                
                $delete = $this->conectar->prepare($consulta);                
                $delete->bindParam(':id', $this->strID, PDO::PARAM_INT);                
                $resDelete = $delete->execute();                               

                if ($resDelete) {
                    echo "<script type='text/javascript'>
                        alert('Registro eliminado correctamente');
                        window.location.href='../Vista/form_Editar.php?dni=$dni';
                        </script>";
                } else {
                    echo "<script type='text/javascript'>
                    alert('Error al eliminar el registro');
                    window.location.href='../Vista/form_Editar.php?dni=$dni';
                    </script>";
                }

            } catch(PDOException $e) {
                throw new Exception("Error de consulta: ", $e->getMessage());
            }
            $this->conectar = null;
        }

        public function UpdateDate(int $id, string $Fecha_Inicio, string $Fecha_Fin, string $Notas, int $Tipo, string $DNI){
            try{
                $this->intPuesto = $id; //Se utiliza intPuesto para no crear otra propiedad
                $this->strFechaInicio = $Fecha_Inicio;
                $this->strFechaFin = $Fecha_Fin;
                $this->strNotas = $Notas;
                $this->intTipo = $Tipo;
                $this->strDNI = $DNI;
                $consulta = "UPDATE dias_no_trabajados SET                
                    Fecha_Inicio = :fechainicio,
                    Fecha_Fin = :fechafin,
                    Notas = :notas,
                    Tipo = :tipo
                    WHERE Id_Dia = :id";

                $insert = $this->conectar->prepare($consulta);
                $insert->bindParam(':fechainicio', $this->strFechaInicio);
                $insert->bindParam(':fechafin', $this->strFechaFin);
                $insert->bindParam(':notas', $this->strNotas);
                $insert->bindParam(':tipo', $this->intTipo, PDO::PARAM_INT);
                $insert->bindParam(':id', $this->intPuesto, PDO::PARAM_INT);

                $resInsert= $insert->execute();
                    
                if ($resInsert) {
                    echo "<script type='text/javascript'>
                         alert('Registro actualizado correctamente');
                         //window.location.href='../Vista/form_Editar.php?dni=$DNI';
                         window.location.href='../Vista/Editar_Fechas.php?id=$id&dni=$DNI&notas=$Notas&tipo=$Tipo&fechainicio=$Fecha_Inicio&fechafin=$Fecha_Fin';
                         </script>";
                } else {
                    echo "<script type='text/javascript'>
                    alert('Error al actualizar el registro');
                    window.location.href='..Vista/form_Editar.php?dni=$DNI';
                    </script>";
                }
                
            } catch (PDOException $e) {
                throw new Exception("Error de consulta: ", $e->getMessage());
            }
            $this->conectar = null;
        }

        public function getOneAsalariado(string $dni){
            try{                
                $consulta = "SELECT * FROM personal WHERE DNI = :dni";                
                $insert = $this->conectar->prepare($consulta);
                $insert->bindParam(":dni", $dni);                
                $insert->execute();
                $resultado = $insert->fetch(PDO::FETCH_OBJ);                
                return $resultado;                
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
            $this->conectar = null;
        }

        public function getAllAsalariados(){
            try{                
                $consulta = $this->conectar->query("SELECT * FROM personal WHERE Fecha_Baja IS NULL OR Fecha_Baja ='0000-00-00'");                
                $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);                
                return $resultado;                
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
            $this->conectar = null;
        }

        public function InsertarAsalariado(string $DNI, string $nombre, string $apellidos, int $Id_Puesto, string $Fecha_Alta){
            try{
                $this->strDNI = $DNI;
                $this->strNombre = $nombre;
                $this->strApellidos = $apellidos;
                $this->intPuesto = $Id_Puesto;            
                $this->strFechaAlta = $Fecha_Alta;
                $consulta = "INSERT INTO personal(DNI, Nombre, Apellidos, Id_Puesto, Fecha_Alta) VALUES (?,?,?,?,?)";       
                $insert = $this->conectar->prepare($consulta);            
                $arrData = array($this->strDNI, $this->strNombre, $this->strApellidos, $this->intPuesto, $this->strFechaAlta);
                $resInsert = $insert->execute($arrData);
                
                if ($resInsert) {
                    echo "<script type='text/javascript'>
                            alert('Registro actualizado correctamente');
                            window.location.href='../indexPersonal.php';
                        </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Error al actualizar el registro');
                            window.location.href='../indexPersonal.php';
                        </script>";
                }

            } catch(PDOException $e) {                
                throw new Exception("Error de consulta: " .$e->getMessage());
            }
            $this->conectar = null;
        }

        public function InsertarVacaciones(string $DNI, string $FechaInicio, string $FechaFinal, int $Tipo, string $Notas){
            try{
                $this->strDNI = $DNI;                
                $this->strFechaInicio = $FechaInicio;
                $this->strFechaFin = $FechaFinal;                
                $this->intTipo = $Tipo;
                $this->strNotas = $Notas;                
                $consulta = "INSERT INTO dias_no_trabajados(DNI, Fecha_Inicio, Fecha_Fin, Tipo, Notas) VALUE (?,?,?,?,?)";
                $insert = $this->conectar->prepare($consulta);
                $arrData = array($this->strDNI, $this->strFechaInicio, $this->strFechaFin, $this->intTipo, $this->strNotas);
                $resInsert = $insert->execute($arrData);               
                
                if ($resInsert) {
                    echo "<script type='text/javascript'>
                            alert('Registro actualizado correctamente');
                            window.location.href='../Vista/form_Editar.php?dni=$DNI';
                            </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Error al actualizar el registro');
                            window.location.href='../Vista/form_Editar.php?dni=$DNI';
                            </script>";
                }
                    
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: " .$e->getMessage());
            }     
            $this->conectar = null;       
        }       
        
        public function getVacaciones(string $dni, string $año, string $tipo){            
            try{
                if ($tipo == "100"){                    
                    //$consulta = $this->conectar->query("SELECT * FROM dias_no_trabajados WHERE DNI='$dni' AND YEAR(Fecha_Inicio)=$año AND YEAR(Fecha_Fin)=$año ORDER BY Fecha_Inicio");
                    $consulta = $this->conectar->query("SELECT * FROM dias_no_trabajados WHERE DNI='$dni' AND YEAR(Fecha_Inicio)=$año ORDER BY Fecha_Inicio");
                    $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);                    
                    return $resultado;                                                        
                }
                else{                                        
                    //$consulta = $this->conectar->query("SELECT * FROM dias_no_trabajados WHERE DNI='$dni' AND Tipo='$tipo' AND YEAR(Fecha_Inicio)=$año AND YEAR(Fecha_Fin)=$año ORDER BY Fecha_Inicio");
                    $consulta = $this->conectar->query("SELECT * FROM dias_no_trabajados WHERE DNI='$dni' AND Tipo='$tipo' AND YEAR(Fecha_Inicio)=$año ORDER BY Fecha_Inicio");                    
                    $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);                    
                    return $resultado;
                }
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
            $this->conectar = null;
        }

        public function deleteWorker(string $dni){
            try{
                $this->strDNI = $dni;
                $consulta = "DELETE FROM personal WHERE DNI = :dni";
                $insert = $this->conectar->prepare($consulta);
                $insert->bindParam(':dni', $this->strDNI);
                $resInsert = $insert->execute();                

                /*echo "<script type='text/javascript'>
                        alert('Registro BORRADO correctamente');
                        window.location.href='../indexPersonal.php';
                    </script>";*/
                
                if ($resInsert) {
                    echo "<script type='text/javascript'>
                            alert('Registro actualizado correctamente');
                            window.location.href='../indexPersonal.php';
                           </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Error al actualizar el registro');
                            window.location.href='../indexPersonal.php';
                            </script>";
                }

            } catch(PDOException $e) {
                throw new Exception("Error de consulta: " -$e->getMessage());
            }
            $this->conectar = null;          
        }

        public function UpdateWorker(string $nombre, string $dni, string $apellidos, int $puesto, string $fechaalta, string $fechabaja){
            try{
                $this->strNombre = $nombre;
                $this->strDNI = $dni;
                $this->strApellidos = $apellidos;
                $this->intPuesto = $puesto;
                $this->strFechaAlta = $fechaalta;
                $this->strFechaBaja = $fechabaja;

                $consulta = "UPDATE personal SET 
                Nombre = :nombre,
                Apellidos = :apellidos,
                Id_Puesto = :puesto,
                Fecha_Alta = :fechaalta" .                
                ($fechabaja != "" ? ", Fecha_Baja = :fechabaja" : "") . //Operador ternario. 
                " WHERE DNI = :dni";

                $insert = $this->conectar->prepare($consulta);
                $insert->bindParam(':dni', $this->strDNI);
                $insert->bindParam(':nombre', $this->strNombre);
                $insert->bindParam(':apellidos', $this->strApellidos);
                $insert->bindParam(':puesto', $this->intPuesto, PDO::PARAM_INT);
                $insert->bindParam(':fechaalta', $this->strFechaAlta);

                if ($fechabaja != "") {
                    $insert->bindParam(':fechabaja', $this->strFechaBaja);
                }

                $resUpdate = $insert->execute();

                if ($resUpdate) {
                    echo "<script type='text/javascript'>
                            alert('Registro actualizado correctamente');
                            window.location.href='../Vista/form_Editar.php?dni=$dni';
                        </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Error al actualizar el registro');
                            window.location.href='../Vista/form_Editar.php?dni=$dni';
                        </script>";
                }               
                
            } catch (PDOException $e){                
            throw new Exception("ERROR DE CONSULTA: " .$e->getMessage());
            }
            $this->conectar = null;
        }
    }
?>
