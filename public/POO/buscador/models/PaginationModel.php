<?php
    require_once 'config/database.php';        

class PaginationModel {
    private $db;    
    private $page;

    public function __construct() {
        $this->db = new PDO(DB_DSN, DB_USER, DB_PASS);
    }

// Método para sacar el nombre de las tablas de la base de datos
    /*public function getTables() {
        $stmt = $this->db->query("SHOW TABLES");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }*/    

    public function getData($table, $startDate, $endDate, $limit, $page, $offset) {
        // Listado de nombre de tablas permitidas
        $allowedTables = ['p18', 'sulfato', 'hb10', 'sulfacid', 's3', 'ferrico'];
    
        // Comprueb a si la el nombre de la tabla está permitido
        if (!in_array($table, $allowedTables)) {
        throw new InvalidArgumentException("Invalid table name provided.");
    }
        
        if ($limit == 'all' and ($table == "p18" or $table == "sulfato")) {                        
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE Hora_Inicio BETWEEN :start_datee AND :end_date");
        } elseif ($limit == 'all' and ($table == "hb10" or $table == "sulfacid" or $table == "ferrico")) {            
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE Fecha BETWEEN :start_datee AND :end_date");            
        } elseif ($limit != 'all' and ($table == "p18" or $table == "sulfato")) {            
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE Hora_Inicio BETWEEN :start_datee AND :end_date LIMIT :offset, :limite");
        } elseif ($limit != 'all' and ($table == "hb10" or $table == "sulfacid" or $table == "ferrico")) {
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE Fecha BETWEEN :start_datee AND :end_date LIMIT :offset, :limite");            
        }

        if ($limit != "all"){            
            $stmt->bindParam(':start_datee', $startDate);
            $stmt->bindParam(':end_date', $endDate);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limite', $limit, PDO::PARAM_INT);
        }
        
        else{
            $stmt->bindParam(':start_datee', $startDate);
            $stmt->bindParam(':end_date', $endDate);
        }
   
        $stmt->execute();                    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }        

    public function countRegistros($table, $startDate, $endDate) {
        // Determina la columna apropiada basa en el nombre de la tabla
        if ($table == "p18" || $table == "sulfato") {
            $dateColumn = "Hora_Inicio";
        } elseif ($table == "hb10" || $table == "sulfacid" || $table == "ferrico") {
            $dateColumn = "Fecha";
        } else {
            throw new InvalidArgumentException("Invalid table name");
        }
    
        // Prepara la consulta
        $query = "SELECT COUNT(*) as total FROM $table WHERE $dateColumn BETWEEN :start_date AND :end_date";
        $stmt = $this->db->prepare($query);
    
        // Parametros Bind
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
    
        // Ejecuta la consulta
        $stmt->execute();
    
        // Trae el resultado
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        // Retorna el total de registros
        return $row->total;
    }    
    
    public function createLinks($links, $list_class, $limit, $total_registros, $startDate, 
                                $endDate, $page, $offset, $table, $data) {                                    
        
        if ($limit == 'all') {
            return '';
        }
        
        $last = ceil($total_registros / $limit);  //Último enlace de paginación a mostrar
        $start = (($page - $links) > 0) ? $page - $links : 1; //Primera enlace de paginación a mostrar
        $end = (($page + $links) < $last) ? $page + $links : $last; //Enlace final de paginación a mostrar

        $html = '<ul class="' . $list_class . '">';

        if ($page == 1){
            $class = "disabled";
            $html .= '<li class="' . $class .
                 '"><a href="?limit=' . $limit .
                 '&page=' . ($page) .
                 '&table=' . $table . 
                 '&startDate=' . $startDate .
                 '&endDate=' . $endDate .
                 '&offset=' . $offset .
                 '">&laquo;</a></li>';
        }
        else{
            $class ="enabled";
            $html .= '<li class="' . $class .
                 '"><a href="?limit=' . $limit .
                 '&page=' . ($page - 1) .
                 '&table=' . $table .
                 '&startDate=' . $startDate .
                 '&endDate=' . $endDate .
                 '&offset=' . $offset .
                 '">&laquo;</a></li>';
        }
                 
        if ($start > 1) {
            $html .= '<li class="' . $class .
            '"><a href="?limit=' . $limit .
            '&page=' . "1" .
            '&table=' . $table .
            '&startDate=' . $startDate .
            '&endDate=' . $endDate .
            '&offset=' . $offset .
            '">' . "1" .
            '</a></li>';

            $html .= '<li class="disabled"><span>...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {            
            $class = ($page == $i) ? "active" : "";            
            
            $html .= '<li class="' . $class .
                     '"><a href="?limit=' . $limit .
                     '&page=' . $i .
                     '&table=' . $table .
                     '&startDate=' . $startDate .
                     '&endDate=' . $endDate .
                     '&offset=' . $offset .
                     '">' . $i .
                     '</a></li>';
        }
        
        if ($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';            
            $html .= '<li><a href="?limit=' . $limit .
                     '&page=' . $last .
                     '&table=' . $table . 
                     '&startDate=' . $startDate .
                     '&endDate=' . $endDate .
                     '&offset=' . $offset .
                     '">' . $last .
                      '</a></li>';
        }

        if ($page == $last){
            $class = "disabled";
            $html .= '<li class="' . $class .
                 '"><a href="?limit=' . $limit .
                 '&page=' . ($page) .
                 '&table=' . $table . 
                 '&startDate=' . $startDate .
                 '&endDate=' . $endDate .
                 '&offset=' . $offset .                 
                 '">&raquo;</a></li>';
        }
        else{
            $class = "";
            $html .= '<li class="' . $class .
                 '"><a href="?limit=' . $limit .
                 '&page=' . ($page + 1) .
                 '&table=' . $table . 
                 '&startDate=' . $startDate .
                 '&endDate=' . $endDate .
                 '&offset=' . $offset .                 
                 '">&raquo;</a></li>';
        }

        $html .= '</ul>';

        return $html;
    }

    public function closeConecction(){        
        $this->db = null;
    }
    
}
    
?>

