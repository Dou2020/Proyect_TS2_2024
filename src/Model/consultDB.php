<?php

class ejecutarSQL
{
    public static function conectar()
    {
        // Crea una conexión
        if(!$con=  mysqli_connect(SERVER,USER,PASS,BD)){
            echo "Error en el servidor, verifique sus datos";
            echo '<script>alert("Algo ocurrió mal");</script>';
        }
        /* Codificar la información de la base de datos a UTF8*/
        mysqli_set_charset($con, "utf8");       
        return $con;  

    }
    public static function consultar($query)
    {
        if (!$consul = mysqli_query(ejecutarSQL::conectar(), $query)) {
            echo '<script>alert("Algo ocurrió mal");</script>';
        }
        //echo '<script>console.log("',$consul,'");</script>';
        return $consul;
    }

}

/* Clase para hacer las consultas Insertar, Eliminar y Actualizar */
class consultasSQL
{
    public static function InsertSQL($tabla, $campos, $valores)
    {
        if (!$consul = ejecutarSQL::consultar("INSERT INTO $tabla ($campos) VALUES($valores)")) {
            die ("Ha ocurrido un error al insertar los datos en la tabla");
        }
        return $consul;
    }
    public static function DeleteSQL($tabla, $condicion)
    {
        if (!$consul = ejecutarSQL::consultar("DELETE FROM $tabla WHERE $condicion")) {
            die ("Ha ocurrido un error al eliminar los registros en la tabla");
        }
        return $consul;
    }
    public static function UpdateSQL($tabla, $campos, $condicion)
    {
        if (!$consul = ejecutarSQL::consultar("UPDATE $tabla SET $campos WHERE $condicion")) {
            die ("Ha ocurrido un error al actualizar los datos en la tabla");
        }
        return $consul;
    }
    public static function clean_string($val)
    {
        $val = trim($val);
        $val = stripslashes($val);
        $val = str_ireplace("<script>", "", $val);
        $val = str_ireplace("</script>", "", $val);
        $val = str_ireplace("<script src", "", $val);
        $val = str_ireplace("<script type=", "", $val);
        $val = str_ireplace("SELECT * FROM", "", $val);
        $val = str_ireplace("DELETE FROM", "", $val);
        $val = str_ireplace("INSERT INTO", "", $val);
        $val = str_ireplace("--", "", $val);
        $val = str_ireplace("^", "", $val);
        $val = str_ireplace("[", "", $val);
        $val = str_ireplace("]", "", $val);
        $val = str_ireplace("==", "", $val);
        $val = str_ireplace(";", "", $val);
        return $val;
    }
}
