<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';
    include '../../Model/reportCRUD.php';

    // Clear the variable and add request new variable
    $id=consultasSQL::clean_string($_POST['id-reportPublic']);
    $coment=consultasSQL::clean_string($_POST['coment-reportPublic']);
    // validate that the request insert data.
    if($id!="" && $coment!=""){
        if (ReportCRUD::insertReport($_SESSION['idPerson'],$id,$coment)) {
            echo '<script> location.href="/index.php"; </script>';
        }else {
            echo'error de insert';
        }
    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
