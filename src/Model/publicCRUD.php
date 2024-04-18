<?php
include './../Config/configDB.php';
include './consultDB.php';
class PublicCRUD {
    public static function readPublicID($idPublic)
    {
        return ejecutarSQL::consultar("SELECT `id`, `title`, `description`, `image`, `id_person`, `status`, `type`, `price` FROM `publicacion` WHERE id=$idPublic");
    }
    public static function insertPublic($title,$description,$imgFinalName,$id_person,$type,$price)
    {
        return consultasSQL::InsertSQL("`publicacion`", "`title`, `description`, `image`, `id_person`, `status`, `type`, `price`", "'$title','$description','$imgFinalName','$id_person', '0', '$type', '$price'");
    }
    public static function updatePublicType($id,$type)
    {
        return consultasSQL::UpdateSQL("`publicacion`", "`type`=',$type,'", "`id`='$id'");
    }
    public static function readPublicTrue()
    {
        return ejecutarSQL::consultar("SELECT * FROM publicacion WHERE status > 0 AND type < 4");
    }
    public static function readPublicFalse()
    {
        return ejecutarSQL::consultar("SELECT * FROM publicacion WHERE status = 0 AND type < 4");
    }
}