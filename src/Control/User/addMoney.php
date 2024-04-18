<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';
    include '../../Model/bankCRUD.php';

    // Clear the variable and add request new variable
    $name=consultasSQL::clean_string($_POST['name-Money']);
    $cod=consultasSQL::clean_string($_POST['cod-Money']);
    $noCard=consultasSQL::clean_string($_POST['noCard-Money']);
    $date=consultasSQL::clean_string($_POST['date-Money']);
    $money=consultasSQL::clean_string($_POST['price-Money']);
    // validate that the request insert data.
    if($name!="" && $cod!="" && $noCard!="" && $date!=""){

            if (BankCRUD::updateBankID($_SESSION['idPerson'],$_SESSION['moneyPerson']+$money)) {
                $_SESSION['moneyPerson'] = $_SESSION['moneyPerson']+$money; 
                echo '<script> location.href="/index.php"; </script>';
            }

    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
