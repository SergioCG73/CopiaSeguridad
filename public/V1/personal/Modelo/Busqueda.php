<?php
    require_once("autoload.php");

    class Busqueda extends Conexion{
        private $strFechaInicial;
        private $strFechaFinal;
        private $strProducto;
        private $per_page;
        private $current_page;
        private $conectar;

        public function __construct(){
            $this->conectar = new Conexion();
            $this->conectar = $this->conectar->connect();        
        }

        public function getManufacturingData(string $producto, string $fechainicial, string $fechafinal){
            try{
                $this->strFechaInicial = $fechainicial;
                $this->strFechaFinal = $fechafinal;
                $this->strProducto = $producto;                

                if($producto=="p18" or $producto=="sulfato"){
                    $consulta = "SELECT * FROM $producto WHERE Hora_Inicio BETWEEN :fechainicial AND :fechafinal ORDER BY NumeroFabricacion";                    
                }
                else{
                    $consulta = "SELECT * FROM $producto WHERE Fecha BETWEEN :fechainicial AND :fechafinal ORDER BY NumeroFabricacion";
                }
                    $insert = $this->conectar->prepare($consulta);                
                    $insert->bindParam(":fechainicial", $fechainicial);                
                    $insert->bindParam(":fechafinal", $fechafinal);
                    $insert->execute();
                    $resultado = $insert->fetchAll(PDO::FETCH_OBJ);
                    return $resultado;                
                
            } catch (PDOException $e) {
                throw new Exception("Error de consulta" . $e->getMessage());
            }
            $this->conectar = null;
        }

        //Inicio Paginador -------------------------------------------------

        public function getDataPaginator($producto, $fechainicial, $fechafinal, $per_page){
            try{
                $this->strFechaInicial = $fechainicial;
                $this->strFechaFinal = $fechafinal;
                $this->strProducto = $producto;                
                $this->per_page = $per_page; //Valor límite de elementos por página
                $this->current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;                    
                $offset = ($this->current_page - 1) * $this->per_page;                
                
                if($producto == "p18" or $producto == "sulfato"){                                                            
                    //$consulta = "SELECT * FROM $producto WHERE Hora_Inicio BETWEEN :fechainicial AND :fechafinal ORDER BY NumeroFabricacion LIMIT :per_page, :offset";
                    $consulta = "SELECT * FROM $producto
                        WHERE Hora_Inicio BETWEEN :fechainicial AND :fechafinal
                        ORDER BY NumeroFabricacion
                        LIMIT :offset, :per_page";
                }
                else{
                    //$consulta = "SELECT * FROM $producto WHERE Fecha BETWEEN :fechainicial AND :fechafinal ORDER BY NumeroFabricacion";
                    $consulta = "SELECT * FROM $producto 
                        WHERE Fecha BETWEEN :fechainicial AND :fechafinal
                        ORDER BY NumeroFabricacion
                        LIMIT :offset, :per_page";
                }                    
                    $read = $this->conectar->prepare($consulta);                                    
                    $read->bindParam(":fechainicial", $fechainicial);                
                    $read->bindParam(":fechafinal", $fechafinal);
                    $read->bindParam(":per_page", $this->per_page, PDO::PARAM_INT);
                    $read->bindParam(":offset", $offset, PDO::PARAM_INT);
                    $read->execute();
                    $resultado1 = $read->fetchAll(PDO::FETCH_OBJ);                    
                    return $resultado1;
                
            } catch (PDOException $e) {
                throw new Exception("Error de consulta" . $e->getMessage());
            }
            $this->conectar = null;
        }

        public function getTotalPages($producto, $fechainicial, $fechafinal, $per_page){
            try{
                $this->strFechaInicial = $fechainicial;
                $this->strFechaFinal = $fechafinal;
                $this->strProducto = $producto;    
                $this->per_page = $per_page;                            
                
                if ($producto == "p18" or $producto == "sulfato"){
                    $consulta = "SELECT COUNT(*) FROM $producto
                    WHERE Hora_Inicio
                    BETWEEN :fechainicial AND :fechafinal";
                }
                else
                {
                    $consulta = "SELECT COUNT(*) FROM $producto
                    WHERE Fecha
                    BETWEEN :fechainicial AND :fechafinal";
                }
                
                $read = $this->conectar->prepare($consulta);                
                $read->bindParam(":fechainicial", $fechainicial);                
                $read->bindParam(":fechafinal", $fechafinal);
                $read->execute();
                $total_rows = $read->fetchColumn();       
                return ceil($total_rows / $per_page);

            } catch (PDOException $e) {
                throw new Exception("Erro de consulta" . $e->getMessage());
            }
            $this->conectar = null;            
        }

        public function createLinks($links=5){            
            $last = $this->getTotalPages($this->strProducto, $this->strFechaInicial, $this->strFechaFinal, $this->per_page);            
            $start = (($this->current_page - $links) > 0) ? $this->current_page - $links : 1;            
            $end = (($this->current_page + $links) < $last) ? $this->current_page + $links : $last;            

            $html = "<ul class='paginación'>";
            $class = ($this->current_page == 1) ? "disabled" : "";
            
            //$html .= '<li class="' . $class . '"><a href="?page=' . ($this->current_page - 1) . '">&laquo;</a></li>';
            $html .= '<li class="' . $class . '"><a href="../Buscador/Controladores/readDataBase.php?page=' . ($this->current_page - 1) . '">&laquo;</a></li>';

            if ($start > 1) {                
                $html .= '<li><a href="?page=1">1</a></li>';
                $html .= '<li class="disabled"><span>...</span></li>';
            }
    
            for ($i = $start; $i <= $end; $i++) {
                $class = ($this->current_page == $i) ? "active" : "";
                //$html .= '<li class="' . $class . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
                $html .= '<li class="' . $class . 
                '"><a href="../Buscador/Controladores/readDataBase.php?page=' . $i . 
                '&fechainicial=' . $this->strFechaInicial .
                '&fechafinal=' . $this->strFechaFinal .
                '&producto=' . $this->strProducto .
                '&perpage=' . $this->per_page .                
                '">' . $i . '</a></li>';
            }
    
            if ($end < $last) {                
                $html .= '<li class="disabled"><span>...</span></li>';
                //$html .= '<li><a href="?page=' . $last . '">' . $last . '</a></li>';
                $html .= '<li><a href="../Buscador/Controladores/readDataBase.php?page=' . $last . '">' . $last . '</a></li>';
            }
    
            $class = ($this->current_page == $last) ? "disabled" : "";
            //$html .= '<li class="' . $class . '"><a href="?page=' . ($this->current_page + 1) . '">&raquo;</a></li>';
            $html .= '<li class="' . $class . '"><a href="../Buscador/Controladores/readDataBase.php?page=' . ($this->current_page + 1) . '">&raquo;</a></li>';
    
            $html .= '</ul>';
    
            return $html;

        }

        }
        //--------------------------
    
?>

