<?php
    //
    session_start();
    include '../../Config/configDB.php';
    include '../../Model/consultDB.php';
    include '../../Model/publicCRUD.php';
    include '../../Model/bankCRUD.php';
    include '../../Model/userCRUD.php';
    
    $email=consultasSQL::clean_string($_POST['email-login']);
    $pass=consultasSQL::clean_string($_POST['pass-login']);
    if($email!="" && $pass!=""){
        $verPerson=UserCRUD::readPersonSign($email,$pass);
        $PersonC=mysqli_num_rows($verPerson);

        if ($PersonC > 0) {
            $filaU=mysqli_fetch_array($verPerson, MYSQLI_ASSOC);
            // validate access of the user
            if ($filaU['status'] != 1) {
                echo '<script> location.href="/index.php"; </script>';
                return;
            }
            // validate if table of bank is init in the user
            $id=$filaU['id'];
            $verBank=BankCRUD::readBankID($id);
            $BankC=mysqli_num_rows($verBank);

            if ($BankC == 0) {
                if (!BankCRUD::insertBankID($id)) {
                    echo 'Error de insert new';
                }
                $_SESSION['moneyPerson']=0;
                $_SESSION['cacaoPerson']=0;
            }else {
                $filaB=mysqli_fetch_array($verBank, MYSQLI_ASSOC);
                $_SESSION['moneyPerson']=$filaB['money'];
                $_SESSION['cacaoPerson']=$filaB['cacao'];
            }

            $_SESSION['emailPerson']=$email;
            //$_SESSION['passPerson']=$pass;
            $_SESSION['rolPerson']=$filaU['rol'];
            $_SESSION['idPerson']=$id;
            $_SESSION['statusPerson']=$filaU['status'];
            $_SESSION['namePerson']=$filaU['name'];

            echo '<script> location.href="/index.php"; </script>';
        }else {
            echo 'Error nombre o contraseña invalido';
        }

    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
