<?php

session_start();
include '../../Config/configDB.php';
include '../../Model/consultDB.php';
include '../../Model/publicCRUD.php';
include '../../Model/userCRUD.php';
include '../../Model/bankCRUD.php';
include '../../Model/compraCRUD.php';

$idPublic = consultasSQL::clean_string($_GET['id-public']);

if ($idPublic != "" && $_SESSION['idPerson'] != "") {
    $publicInfo = PublicCRUD::readPublicID($idPublic);

    if (mysqli_num_rows($publicInfo) == 0) {
        echo 'error inf de publicacion';
    }
    $filaU=mysqli_fetch_array($publicInfo, MYSQLI_ASSOC);

    if ($filaU['price'] <= $_SESSION['moneyPerson']) {

        if (PublicCRUD::updatePublicType($idPublic, $filaU['type'] + 3) && 
            BankCRUD::updateBankID($_SESSION['idPerson'], $_SESSION['moneyPerson'] - $filaU['price']) &&
            CompraCRUD::insertCompra($_SESSION['idPerson'], $idPublic)) {

                $_SESSION['moneyPerson'] = $_SESSION['moneyPerson'] - $filaU['price'];
                echo '<script> location.href="/index.php"; </script>';
        }else {
            echo'Error insert in the DB';
        }

    } else {
        echo 'error dinero insuficiente';
    }
} else {
    echo 'error de incio';
}
