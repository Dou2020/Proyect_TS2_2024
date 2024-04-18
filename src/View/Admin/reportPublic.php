<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>list Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './../References/link.php'; ?>
</head>

<body>
    <!-- Opcion of the navigation -->
    <?php include '../References/navigation.php'; ?>

    <section id="new-prod-index">
        <div class="container">
            <div class="page-header">
                <h1>Últimas<small> Publicaciones agregados</small></h1>
            </div>
            <div class="row">
                <?php
                //Ejecuta la consulta de los ultimos productos para mostrar
                // No conecta a la base de datos
                include '../../Config/configDB.php'; //<!--Referencia por cambiar -->
                include '../../Model/consultDB.php'; //<!--Referencia por cambiar -->
                include '../../Model/publicCRUD.php'; //<!--Referencia por cambiar -->
                            
                $consulta = PublicCRUD::readPublicReport();
                $totalPublic = mysqli_num_rows($consulta);
                if ($totalPublic > 0) {
                    while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="thumbnail" style="height: 500px;">
                                <img class="img-fluid" style="height: 250px;" src="/assets/img/<?php if ($fila['image'] != "" && is_file("../../assets/img/" . $fila['image'])) {
                                    echo $fila['image'];
                                } else {
                                    echo "default.png";
                                } ?>">
                                <div class="caption" style="height: 300px;">
                                    <h3>
                                        <?php echo $fila['title']; ?>
                                    </h3>
                                    <p>
                                        <?php echo $fila['description']; ?>
                                    </p>
                                    <?php if ($fila['Descuento'] > 0): ?>
                                        <p>
                                            <?php
                                            $pref = number_format($fila['price'], 2, '.', '');
                                            echo "Precio Q" . $pref;
                                            ?>
                                        </p>
                                    <?php else: ?>
                                        <p>Q
                                            <?php echo $fila['price']; ?>
                                        </p>
                                    <?php endif; ?>
                                    <p class="text-center">
                                        <a href="/View/User/infoPublic.php?id-public=<?php echo $fila['id']; ?>"
                                            class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp;
                                            Detalles</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<h2>No hay productos registrados en la tienda</h2>';
                }
                ?>
            </div>
        </div>
    </section>


</body>

</html>