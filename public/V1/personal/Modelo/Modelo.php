<?php
    require_once("autoload.php");

    class Modelo extends Conexion {        
        private $strDNI;
        private $strNombre;
        private $strApellidos;
        private $intPuesto;
        private $conectar;
        
        public function __construct(){
            $this->conectar = new Conexion(); 
            $this->conectar = $this->conectar->connect();
        }

        public function RellenarSelect($consulta) {                 
            try {                                                
                $stmt = $this->conectar->prepare($consulta);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception('Error de consulta: ' . $e->getMessage());
            }
        }

        public function RellenarSelectAsalariados($consulta) {                 
            try {                                
                $stmt = $this->conectar->prepare($consulta);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception('Error de consulta: ' . $e->getMessage());
            }
        }
    }
?>