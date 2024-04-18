<?php
session_start();
error_reporting(E_PARSE);

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" routerLink="/">
        <?php
        // Validate user Rol and Name
        switch ($_SESSION['rolPerson']) {
            case 1:
                echo' Administrador   ',$_SESSION['namePerson'];
                break;
            case 2:
                echo' Usuario   ',$_SESSION['namePerson'];
                break;
            default:
                echo'STORE';
                break;
        }
        ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php  
                if ($_SESSION['rolPerson']>0) {
                    echo'
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"> Money: Q ',$_SESSION['moneyPerson'],' </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"> Cacao: C ',$_SESSION['cacaoPerson'],' </a>
                    </li>
                    ';
                }
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="/"> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/View/User/listPublic.php">Productos</a>
            </li>
            <?php
            if (!$_SESSION['statusPerson'] == true) {
                echo'
                    <li class="nav-item">
                        <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#signinModal">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesion</a>
                    </li>
                ';
            }else {
                if ($_SESSION['rolPerson']==1) {
                    echo'
                    <li class="nav-item">
                        <a class="nav-link" href="/View/Admin/reportPublic.php">Buzon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/View/Admin/activePublic.php">Publicaciones</a>
                    </li>
                    ';
                }else {
                    echo'
                        <li class="nav-item">
                            <a class="nav-link" href="/View/User/listBuyPublic.php">Compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/View/User/addPublic.php">Publicar</a>
                        </li>
                    ';
                }
                echo'
                <li class="nav-item">
                    <a class="nav-link" href="/Control/_Sesion/logoutControl.php">Log out</a>
                </li>
                ';
            }
            ?>
        </ul>
    </div>
</nav>

<!-- Modal sign in -->
<div class="modal fade" id="signinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Registrarse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Form Login INSERT -> email-login and pass-login   -->
                <form action="/Control/User/addUser.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name-signin" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-signin" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass-signin">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">confirmar Password</label>
                        <input type="password" class="form-control" name="passConfirm-signin">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal Login-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Iniciar Sesión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Form Login INSERT -> email-login and pass-login   -->
                <form action="/Control/_Sesion/loginControl.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-login" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass-login">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>