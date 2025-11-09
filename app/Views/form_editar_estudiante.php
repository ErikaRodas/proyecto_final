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
                    <label for="txt_carne_alumno" class="mt-3">Carné del alumno</label>
                    <input type="number" name="txt_carne_alumno" id="txt_carne_alumno" class="form-control"
                        value="<?= $datos['carne_alumno'];?>" readonly>
                    <label for="txt_nombre" class="mt-3">Nombre</label>
                    <input type="text" name="txt_nombre" id="txt_nombre" class="form-control"
                        value="<?= $datos['nombre'];?>">
                    <label for="txt_apellido" class="mt-3">Apellido</label>
                    <input type="text" name="txt_apellido" id="txt_apellido" class="form-control"
                        value="<?= $datos['apellido'];?>">
                    <label for="txt_direccion" class="mt-3">Dirección</label>
                    <input type="text" name="txt_direccion" id="txt_direccion" class="form-control"
                        value="<?= $datos['direccion'];?>">
                    <label for="txt_telefono" class="mt-3">Teléfono</label>
                    <input type="number" name="txt_telefono" id="txt_telefono" class="form-control"
                        value="<?= $datos['telefono'];?>">
                    <label for="txt_email" class="mt-3">Email</label>
                    <input type="email" name="txt_email" id="txt_email" class="form-control"
                        value="<?= $datos['email'];?>">
                    <label for="txt_fechanacimiento" class="mt-3">Fecha de nacimiento</label>
                    <input type="date" name="txt_fechanacimiento" id="txt_fechanacimiento" class="form-control"
                        value="<?= $datos['fechanacimiento'];?>">
                    <label for="txt_codigo_grado" class="mt-3">Código del grado</label>
                    <input type="number" name="txt_codigo_grado" id="txt_codigo_grado" class="form-control"
                        value="<?= $datos['codigo_grado'];?>">

                    <button type="submit" class="form-control btn btn-primary mt-3">Guardar cambios</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
        </script>
</body>
</html>
