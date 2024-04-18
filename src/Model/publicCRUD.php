<?php
include './../Config/configDB.php';
include './consultDB.php';
class PublicCRUD {
    public static function insertPublic($title,$description,$imgFinalName,$id_person,$type,$price)
    {
        return consultasSQL::InsertSQL("`publicacion`", "`title`, `description`, `image`, `id_person`, `status`, `type`, `price`", "'$title','$description','$imgFinalName','$id_person', '0', '$type', '$price'");
    }
    
    //Peticiones de Actualizacion
    public static function updatePublicType($id,$type)
    {
        return consultasSQL::UpdateSQL("`publicacion`", "type=$type", "`id`='$id'");
    }
    public static function updatePublicActive($id)
    {
        return consultasSQL::UpdateSQL("`publicacion`", "status=1", "`id`='$id'");
    }
    public static function updatePublicFalse($id)
    {
        return consultasSQL::UpdateSQL("`publicacion`", "status=0", "`id`='$id'");
    }

    // Peticiones de lectura
    public static function readPublicTrue()
    {
        return ejecutarSQL::consultar("SELECT * FROM publicacion WHERE status > 0 AND type < 4");
    }
    public static function readPublicBuy($id)
    {
        return ejecutarSQL::consultar("SELECT * FROM publicacion INNER JOIN compra ON publicacion.id = compra.id_public WHERE compra.id_person = $id");
    }
    public static function readPublicReport()
    {
        return ejecutarSQL::consultar("SELECT DISTINCT publicacion.id, publicacion.title, publicacion.description,publicacion.image  FROM publicacion INNER JOIN report ON publicacion.id = report.id_public WHERE publicacion.status=1;");
    }
    public static function readPublicFalse()
    {
        return ejecutarSQL::consultar("SELECT * FROM publicacion WHERE status = 0 AND type < 4");
    }
    public static function readPublicID($idPublic)
    {
        return ejecutarSQL::consultar("SELECT `id`, `title`, `description`, `image`, `id_person`, `status`, `type`, `price` FROM `publicacion` WHERE id=$idPublic");
    }
    public static function readPublicUser($id_person)
    {
        return ejecutarSQL::consultar("SELECT `id`, `title`, `description`, `image`, `id_person`, `status`, `type`, `price` FROM `publicacion` WHERE id_person=$id_person");
    }
}