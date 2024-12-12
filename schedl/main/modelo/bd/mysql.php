<?php
class schedlBD{
    private static $conexion = null;

    /*
        Función que establece la conexión con la base de datos
    */
    private static function conexionBD(){
        $config = parse_ini_file(__DIR__ . "/../../config.ini");
        if(self::$conexion === null){
            self::$conexion = new mysqli($config['server'], $config['user'], $config['pasw'], $config['bd']);
            if(self::$conexion->connect_error){
                die("Error en la conexión: " . self::$conexion->connect_error);
            }
            self::$conexion->set_charset('utf8');
        }

        return self::$conexion;
    }

    /*
        Función que establece ayuda a establecer los tipos de parámetros
        y a poder colocar los que sean necesarios
    */
    private static function prep($conexion, $consulta, ...$params){
        $preparacion = $conexion->prepare($consulta);

        if($params){
            $tipos = '';

            foreach($params as $param){
                $tipos .=is_int($param) ? 'i':'s';
            }

            $preparacion->bind_param($tipos, ...$params);
        }
        
        return $preparacion;
    }

    /*
        Función que realiza una consulta sobre la inserción
        de un usuario
    */
    public static function consultInsert($consulta, ...$params){
        $conexion = self::conexionBD();
        $preparacion = self::prep($conexion, $consulta, ...$params);

        if($preparacion->execute()){
            return true;
        } else {
            return false;
        }
    }

    /*
        Función que realiza una consulta de lectura de un usuario
    */
    public static function consultSelect($consulta, ...$params){
        $conexion = self::conexionBD();
        $preparacion = self::prep($conexion, $consulta, ...$params);
        $preparacion->execute(); 
        $resultado = $preparacion->get_result();

        if($resultado->num_rows > 0){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return null; 
        }
    }

    /*
        Función que cierra la conexión con la base de datos
    */
    public static function cerrarConexion(){
        if(self::$conexion !== null){
            self::$conexion->close();
            self::$conexion =  null;

        }
    }
}
?>