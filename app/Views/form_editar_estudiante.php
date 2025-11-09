<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <div class="class container">
        <div class="row">
            <div class="col-4 col-offset-4">
                <h1 class="text-center">Editar Estudiante</h1>
                <form action="<?= base_url('modificar_estudiante'); ?>" method="post">
    <input type="number" name="txt_carne_alumno" value="<?= $datos['carne_alumno'];?>" readonly>
    <input type="text" name="txt_nombre" value="<?= $datos['nombre'];?>">
    <input type="text" name="txt_apellido" value="<?= $datos['apellido'];?>">
    <input type="text" name="txt_direccion" value="<?= $datos['direccion'];?>">
    <input type="number" name="txt_telefono" value="<?= $datos['telefono'];?>">
    <input type="email" name="txt_email" value="<?= $datos['email'];?>">
    <input type="date" name="txt_fechanacimiento" value="<?= $datos['fechanacimiento'];?>">
    <input type="number" name="txt_codigo_grado" value="<?= $datos['codigo_grado'];?>">
    <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
</form>

                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        </script>
</body>
</html>
