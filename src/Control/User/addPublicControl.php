<?php
//
session_start();
error_reporting(E_PARSE);

include '../../Config/configDB.php';
include '../../Model/consultDB.php';
include '../../Model/publicCRUD.php';

$title = consultasSQL::clean_string($_POST['title-addPublic']);
$description = consultasSQL::clean_string($_POST['description-addPublic']);
$price = consultasSQL::clean_string($_POST['price-addPublic']);
$type = consultasSQL::clean_string($_POST['type-addPublic']);
$img = $_FILES['img-addPublic'];


if ( !($title != "" && $description != "" && $price!="" && $type!="") ) {
    echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
}
// validate data img
if (isset ($img)) {
    $imgName = $img['name'];
    $imgType = $img['type'];
    $imgSize = $img['size'];
    $imgMaxSize = 5120;

    //validando error de data
    if ($img["error"] != UPLOAD_ERR_OK) {
        echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
    }

    //validate format of the image
    if ($imgType == 'image/jpeg' || $imgType == 'image/png') {
        chmod('../../assets/img/', 0777);
        switch ($imgType) {
            case 'image/jpeg':
                $imgEx = ".jpg";
                break;
            case 'image/png':
                $imgEx = ".png";
                break;
        }
        $imgFinalName = $title.$_SESSION["idPerson"].$imgEx;
        if (move_uploaded_file($img["tmp_name"], "../../assets/img/" . $imgFinalName)) {
            $id_person = $_SESSION['idPerson'];
            if(PublicCRUD::insertPublic($title,$description,$imgFinalName,$id_person,$type,$price)){
                echo '<script> location.href="/View/User/addPublic.php"; </script>';
            }
        } else {
            echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
        }
    }
}else {
    echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
}