<?php
require_once 'modelo/bd/mysql.php';
class schedlController{
    /*
        Función que actualiza los datos de un usuario
    */
    public function updateClient($id, $nombre, $edad, $correo, $passw){
        $consulta = "UPDATE `usuarios` SET `nombre` = ?, `edad` = ?, `correo` = ?, `passw` = ? WHERE `id` = ?";
        $update = schedlBD::consultInsert($consulta, $nombre, $edad, $correo, $passw, $id);
        return $update;
    }
}
?>