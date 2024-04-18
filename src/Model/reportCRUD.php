<?php
include './../Config/configDB.php';
include './consultDB.php';
class ReportCRUD {
    public static function insertReport($id_person,$id_public,$coment)
    {
        return consultasSQL::InsertSQL("`report`", "`id_person`, `id_public`, `coment`", "'$id_person','$id_public','$coment'");
    }
}