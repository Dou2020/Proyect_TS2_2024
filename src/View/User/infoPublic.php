<?php
include '../../Config/configDB.php';
include '../../Model/consultDB.php';
include '../../Model/publicCRUD.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Public</title>
    <?php include './../References/link.php'; ?>
</head>

<body id="container-page-product">

    <!-- Opcion of the navigation -->
    <?php include '../References/navigation.php'; ?>

    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>DETALLE DE LA PUBLICIDAD </h1>
                </div>
                <?php
                $idPublic = consultasSQL::clean_string($_GET['id-public']);
                $publicInfo = PublicCRUD::readPublicID($idPublic) ;
                while ($fila = mysqli_fetch_array($publicInfo, MYSQLI_ASSOC)) {
                    echo '
                            <div class="col-xs-12 col-sm-6">
                                <h3 class="text-center">Información de Publicacion</h3>
                                <br><br>
                                <h4><strong>Nombre: </strong>' . $fila['title'] . '</h4><br>
                                <h4><strong>Precio: </strong>Q ' . number_format(($fila['price']), 2, '.', '') . '</h4><br>
                                <h4><strong>Descripcion: </strong>' . $fila['description'] . '</h4>';

                    if ($fila['image'] != "" && is_file("../../assets/img/" . $fila['image'])) {
                        $imagenFile = "/assets/img/" . $fila['image'];
                    } else {
                        $imagenFile = "/assets/img/default.png";
                    }
                    echo '<br>  
                                <a href="/View/User/listPublic.php" class="btn btn-lg btn-secondary btn-raised btn-block"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a Publicaciones</a>
                        ';
                    if ($_SESSION['rolPerson']==2) {
                        echo '<a href="/Control/User/buyPublic.php?public=',$fila['id'],'" class="btn btn-lg btn-primary btn-raised btn-block"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Comprar</a>';
                    }    
                echo'</div>
                            <div class="col-xs-12 col-sm-6">
                                <br><br><br>
                                <img class="img-fluid" src="' . $imagenFile . '">
                            </div>';
                }
                ?>

            </div>
        </div>
    </section>

    <?php include './../references/footer.php'; ?>

</body>

</html>