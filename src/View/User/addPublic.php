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

    <div class="col-md-4 container">
        <form action="/Control/User/addPublicControl.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Registrar Publicidad</legend>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Titulo</label>
                    <input type="text" class="form-control" placeholder="Ingresar titulo" name="title-addPublic">
                </div>
                <div>
                    <label for="exampleTextarea" class="form-label mt-4">Descripción</label>
                    <textarea class="form-control" rows="3" name="description-addPublic"></textarea>
                </div>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Precio</label>
                    <input type="number" class="form-control" placeholder="Ingresar precio" name="price-addPublic">
                </div>
                <div>
                    <label for="formFile" class="form-label mt-4">Ingresar Imagen/Foto</label>
                    <input class="form-control" type="file" name="img-addPublic" >
                </div>
                <fieldset>
                    <label class="col-form-label mt-4" for="inputDefault">Tipo de Publicidad</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type-addPublic" value="1">
                        <label class="form-check-label" for="optionsRadios1">
                            Producto
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type-addPublic" value="2">
                        <label class="form-check-label" for="optionsRadios2">
                            Voluntariado
                        </label>
                    </div>
                </fieldset>
                <p></p>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>