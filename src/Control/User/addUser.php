<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';
    include '../../Model/userCRUD.php';

    // Clear the variable and add request new variable
    $name=consultasSQL::clean_string($_POST['name-signin']);
    $email=consultasSQL::clean_string($_POST['email-signin']);
    $pass=consultasSQL::clean_string($_POST['pass-signin']);
    $passConfirm=consultasSQL::clean_string($_POST['passConfirm-signin']);
    // validate that the request insert data.
    if($email!="" && $pass!="" && $passConfirm!="" && $name!=""){
        $verPerson=UserCRUD::readPersonEmail($email);
        $PersonC=mysqli_num_rows($verPerson);
        if ($PersonC>0) {
            echo 'Error datos ya ingresados';
        }else {
            if (consultasSQL::InsertSQL("`person`","`name`, `password`, `email`, `rol`, `status`","'$name','$pass','$email','2','1'")) {
                echo '<script> location.href="/index.php"; </script>';
            }
        }
    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
