<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';

    $title=consultasSQL::clean_string($_POST['title-addPublic']);
    $description=consultasSQL::clean_string($_POST['description-addPublic']);
    $imgName=$_FILES['img_addPublic']['name'];
    $imgType=$_FILES['img_addPublic']['type'];
    $imgSize=$_FILES['img_addPublic']['size'];
    $imgMaxSize=5120;

    if ($imgType=='image/jpg' || $imgType=='image/png') {
        # code...
    }
    if ($title!="" && $description!="" ) {
        
    }