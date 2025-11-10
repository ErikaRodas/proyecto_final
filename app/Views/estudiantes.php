<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">

        <h1 class="text-center">Estudiantes</h1>
         <a href="<?= base_url('/'); ?>" class="btn btn-info">
            <i class="bi bi-house-heart"></i> Inicio</a>

    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-cloud-arrow-up-fill"> Agregar estudiante</i>
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Estudiante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('agregar_estudiante'); ?>" method="post">
                        <label for="txt_carne_alumno">Carné del alumno</label>
                        <input type="number" name="txt_carne_alumno" id="txt_carne_alumno" class="form-control"
                            placeholder="Carné del alumno">
                        <label for="txt_nombre">Nombre</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" placeholder="Nombre">
                        <label for="txt_apellido">Apellido</label>
                        <input type="text" name="txt_apellido" id="txt_apellido" class="form-control"
                            placeholder="Apellido">
                        <label for="txt_direccion">Dirección</label>
                        <input type="text" name="txt_direccion" id="txt_direccion" class="form-control"
                            placeholder="Dirección">
                        <label for="txt_telefono">Teléfono</label>
                        <input type="number" name="txt_telefono" id="txt_telefono" class="form-control"
                            placeholder="Teléfono">
                        <label for="txt_email">Email</label>
                        <input type="email" name="txt_email" id="txt_email" class="form-control" placeholder="Email">
                        <label for="txt_fechanacimiento">Fecha de nacimiento</label>
                        <input type="date" name="txt_fechanacimiento" id="txt_fechanacimiento" class="form-control">
                        <label for="txt_codigo_grado">Código del grado</label>
                        <input type="number" name="txt_codigo_grado" id="txt_codigo_grado" class="form-control"
                            placeholder="Código del grado">
                        <button type="submit" class="form-control btn btn-primary mt-3">Agregar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Carné</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Código del Grado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $estudiante): ?>
                        <tr>
                            <th><?= $estudiante['carne_alumno'];?></th>
                            <td><?= $estudiante['nombre']; ?></td>
                            <td><?= $estudiante['apellido']; ?></td>
                            <td><?= $estudiante['direccion']; ?></td>
                            <td><?= $estudiante['telefono']; ?></td>
                            <td><?= $estudiante['email']; ?></td>
                            <td><?= $estudiante['fechanacimiento']; ?></td>
                            <td><?= $estudiante['codigo_grado']; ?></td>
                            <td>
                                href="<?=base_url('eliminar_alumno/').$alumno['carne_alumno'];?>"
                                class="btn btn-primary"><i class="bi bi-trash3"> Eliminar</i></a>
                                <a href="<?=base_url('buscar_alumno/').$alumno['carne_alumno'];?>" 
                                class="btn btn-info"><i class="bi bi-pencil-square"> Modificar</i> </a>
  
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>