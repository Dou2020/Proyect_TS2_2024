<?php
include './../Config/configDB.php';
include './consultDB.php';
class BankCRUD
{
    public static function readBankID($id)
    {
        return ejecutarSQL::consultar("SELECT * FROM bank WHERE id_person= '$id' ");
    }
    public static function insertBankID($id)
    {
        return consultasSQL::InsertSQL("`bank`","`id_person`, `money`, `cacao`","'$id','0','0'");
    }
    public static function updateBankID($id,$money)
    {
        return consultasSQL::UpdateSQL("`bank`","`money` = $money","`id_person`=$id");
    }

}