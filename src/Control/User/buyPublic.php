<?php
    
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';
    include '../../Model/publicCRUD.php';
    include '../../Model/userCRUD.php';
    include '../../Model/bankCRUD.php';

    $idPublic=consultasSQL::clean_string($_GET['id-public']);

    if ($idPublic != "" && $_SESSION['idPerson']!="") {
        $publicInfo = PublicCRUD::readPublicID($idPublic);

        $publicCount=mysqli_num_rows($publicInfo);
        if ($publicCount==0) {
            echo 'error inf de publicacion';
        }
        if (!$publicCount['price'] <= $_SESSION['moneyPerson']) {
            PublicCRUD::updatePublicType($idPublic,$publicCount['type']+3);
            $_SESSION['moneyPerson'] = $_SESSION['moneyPerson'] - $publicCount['price'];
            BankCRUD::updateBankID($_SESSION['idPerson'],$_SESSION['moneyPerson']);
        }else {
            echo 'error dinero insuficiente';
        }



    }
