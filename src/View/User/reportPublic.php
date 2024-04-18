<?php
include '../../Config/configDB.php';
include '../../Model/consultDB.php';
include '../../Model/publicCRUD.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Publicar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './../References/link.php'; ?>
</head>

<body>
    <!-- Opcion of the navigation -->
    <?php include '../References/navigation.php'; ?>

    <section id="infoproduct">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1>Reportar Publicación </h1>
                </div>
                <?php
                $idPublic = consultasSQL::clean_string($_GET['id-public']);
                $publicInfo = PublicCRUD::readPublicID($idPublic);
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
                                <form action="/Control/User/reportPublic.php" method="post">
                                <fieldset>
                                <legend>Comentar</legend>
                                <div>
                                    <label class="col-form-label mt-4" for="inputDefault">ID: </label>
                                    <input type="text" class="form-control" value="',$fila['id'],'"placeholder="Ingresar titulo"  name="id-reportPublic" readonly>
                                </div>
                                <div>
                                    <label for="exampleTextarea" class="form-label mt-4">Descripción</label>
                                    <textarea class="form-control" rows="3" name="coment-reportPublic"></textarea>
                                </div>
                                <p></p>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                </div>
                                </fieldset>
                                </form>
                                <br><br>
                                <a href="/View/User/infoPublic.php?id-public=',$fila['id'],'" class="btn btn-lg btn-secondary btn-raised btn-block"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a Publicaciones</a>
                        ';
                    echo '</div>
                            <div class="col-xs-12 col-sm-6">
                                <br><br><br>
                                <img class="img-fluid" src="' . $imagenFile . '">
                            </div>';
                }
                ?>

            </div>
        </div>
    </section>
</body>

</html>