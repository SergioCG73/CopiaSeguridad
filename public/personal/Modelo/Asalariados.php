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

        public function getOneAsalariado(string $id){
            try{
                $consulta = $this->conectar->query("SELECT * FROM personal WHERE DNI='$id'");                
                $resultado = $consulta->fetch(PDO::FETCH_OBJ);                                 
                return $resultado;                
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
        }

        public function getAllAsalariados(){
            try{                
                $consulta = $this->conectar->query("SELECT * FROM personal WHERE Fecha_Baja IS NULL");                
                $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);                
                return $resultado;                
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
                $consulta = "INSERT INTO personal(DNI, Nombre, Apellidos, Id_Puesto, Fecha_Alta) VALUES (?,?,?,?,?)";                
                $insert = $this->conectar->prepare($consulta);            
                $arrData = array($this->strDNI, $this->strNombre, $this->strApellidos, $this->intPuesto, $this->strFechaAlta);
                $resInsert = $insert->execute($arrData);

                echo "<script type='text/javascript'>
                        alert('Registro guardado correctamente');
                        window.location.href='../Vista/indexPersonal.php';
                    </script>";                
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
                $consulta = "INSERT INTO dias_no_trabajados(DNI, Fecha_Inicio, Fecha_Fin, Tipo, Notas) VALUE (?,?,?,?,?)";
                $insert = $this->conectar->prepare($consulta);
                $arrData = array($this->strDNI, $this->strFechaInicio, $this->strFechaFin, $this->intTipo, $this->strNotas);
                $resInsert = $insert->execute($arrData);

                echo "<script type='text/javascript'>
                        alert('Registro guardado correctamente');
                        window.location.href='../indexPersonal.php';
                    </script>";
                    
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: " .$e->getMessage());
            }            
        }       
        
        public function getVacaciones(string $id, string $año, string $tipo){
            try{         
                $consulta = $this->conectar->query("SELECT * FROM dias_no_trabajados WHERE DNI='$id' AND Tipo='$tipo' AND YEAR(Fecha_Inicio)=$año");                
                $resultado1 = $consulta->fetchAll(PDO::FETCH_OBJ);                    
                                return $resultado1;
            } catch(PDOException $e) {
                throw new Exception("Error de consulta: "- $e->getMessage());
            }
        }
    }
?>
