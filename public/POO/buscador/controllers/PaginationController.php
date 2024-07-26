<?php        
    require_once 'models/PaginationModel.php';

class PaginationController {
    public function handleRequest() {
        $model = new PaginationModel();        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $table = $_POST['table'];            
            $limit = $_POST['limit'];            
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

            if ($limit == "all"){                 
                $offset = "";
                $total_paginas = 1; //nuevo
            }
            else{
                $offset = ($page - 1) * $limit;
                $total_paginas = ceil($total_registros / $limit); //nuevo
            }
            
            $data = $model->getData($table, $startDate, $endDate, $limit, $page, $offset);
            $total_registros = $model->countRegistros($table, $startDate, $endDate);

            /*if ($limit == "all"){                
                $total_paginas = 1;
            }
            else{
                $total_paginas = ceil($total_registros / $limit);
            }*/
//PARTE NUEVA PARR EVITAR EL ERROR AL CAMBIAR LA BÚSQUEDA
            
            if ($page > $total_paginas){                
                $page = 1;
                $offset = ($page - 1) * $limit;                
                $data = $model->getData($table, $startDate, $endDate, $limit, $page, $offset);
            }
//FIN PARTE NUEVA PARA EVITAR EL ERROR AL CAMBIAR LA BÚSQUEDA

            } else {                 
                $data = [];            
            }
        
        include 'views/paginationView.php';
        $model->closeConecction();
        
    }
}
?>
