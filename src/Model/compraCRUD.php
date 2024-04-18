<?php
include './../Config/configDB.php';
include './consultDB.php';
class CompraCRUD
{
    public static function insertCompra($id,$idPublic)
    {
        return consultasSQL::InsertSQL("`compra`","`id_person`, `id_public`","'$id','$idPublic'");
    }

}