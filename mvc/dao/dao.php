<?php
    class Conectar{
        public static function conexion(){
            $conexion=new mysqli("localhost", "gpreislp", "", "mvc");
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
        }
    }
?>