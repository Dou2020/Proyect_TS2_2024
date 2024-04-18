<?php
include './../Config/configDB.php';
include './consultDB.php';
class UserCRUD
{
    public static function readPersonID($id)
    {
        return ejecutarSQL::consultar("SELECT * FROM person WHERE id='$id'");
    }
    public static function readPersonEmail($email)
    {
        return ejecutarSQL::consultar("SELECT * FROM person WHERE email='$email'");
    }
    public static function readPersonSign($email,$pass)
    {
        return ejecutarSQL::consultar("SELECT * FROM person WHERE email='$email' AND password='$pass' ");
    }

}