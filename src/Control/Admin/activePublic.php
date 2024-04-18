<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';
    include '../../Model/publicCRUD.php';

    // Clear the variable and add request new variable
    $id=consultasSQL::clean_string($_GET['id-public']);
    // validate that the request insert data.
    if($id!=""){
        if (PublicCRUD::updatePublicActive($id)) {
            echo '<script> location.href="/index.php"; </script>';
        }else {
            echo'error de insert';
        }
    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
