<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';

    $email=consultasSQL::clean_string($_POST['email-login']);
    $pass=consultasSQL::clean_string($_POST['pass-login']);
    if($email!="" && $pass!=""){
        $verPerson=ejecutarSQL::consultar("SELECT * FROM person WHERE email='$email' AND password='$pass' ");
        $PersonC=mysqli_num_rows($verPerson);

        if ($PersonC > 0) {
            $filaU=mysqli_fetch_array($verPerson, MYSQLI_ASSOC);
            // validate access of the user
            if ($filaU['status'] != 1) {
                echo '<script> location.href="/index.php"; </script>';
                return;
            }
            $_SESSION['emailPerson']=$email;
            //$_SESSION['passPerson']=$pass;
            $_SESSION['rolPerson']=$filaU['rol'];
            $_SESSION['idPerson']=$filaU['id'];
            $_SESSION['statusPerson']=$filaU['status'];

            echo '<script> location.href="/index.php"; </script>';
        }else {
            echo 'Error nombre o contraseña invalido';
        }

    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
