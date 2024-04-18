<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Comprar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './../References/link.php'; ?>
</head>

<body>
    <!-- Opcion of the navigation -->
    <?php include '../References/navigation.php'; ?>

    <div class="col-md-4 container">
        <form action="/Control/User/addMoney.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Ingresar Dinero</legend>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">No. Card</label>
                    <input type="text" class="form-control" placeholder="Ingresar titulo" name="noCard-Money">
                </div>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Codigo</label>
                    <input type="text" class="form-control" placeholder="Ingresar titulo" name="cod-Money">
                </div>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Fecha</label>
                    <input type="text" class="form-control" placeholder="Ingresar titulo" name="date-Money">
                </div>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingresar titulo" name="name-Money">
                </div>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Cantidad</label>
                    <input type="number" class="form-control" placeholder="Ingresar precio" name="price-Money">
                </div>
            
                <p></p>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>