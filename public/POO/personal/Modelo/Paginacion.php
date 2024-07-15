<?php
    require_once("autoload.php");

    class Paginacion extends Conexion{
        private strFechaInicial;
        private strFechaFinal;
        private strProducto;
        private intregistrosPorPagina;
        private intPaginaActual;
        private conectar;

        public function __construct(){
            $this->conectar = new Conexion();
            $this->conectar = $this->conectar->connect();
        }

        public function obtenerRegistros($PaginaActual, $producto){
            $offset = ($PaginaActual - 1) * $this->intregistrosPorPagina;
            $consulta = "SELECT * FROM $producto LIMIT $offset, $this->intregistrosPorPagina";
            $resultado = $this->conectar->query($consulta);
            return $resultado;
    }
?>