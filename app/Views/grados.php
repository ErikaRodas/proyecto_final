<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="container">
    <h1 class="text-center">Grados</h1>
    
    <a href="<?= base_url('/'); ?>" class="btn btn-info">
        <i class="bi bi-house-heart"></i> Inicio</a>

    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-cloud-arrow-up-fill"> Agregar grado</i>
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Grado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('agregar_grado'); ?>" method="post">
                        <label for="txt_codigo_grado">Código del grado</label>
                        <input type="number" name="txt_codigo_grado" id="txt_codigo_grado" class="form-control"
                            placeholder="Código del grado">
                        <label for="txt_nombre">Nombre</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" placeholder="Nombre">
                        <button type="submit" class="form-control btn btn-primary mt-3">Agregar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="class container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $grado): ?>
                        <tr>
                            <th><?= $grado['codigo_grado'];?></th>
                            <td><?= $grado['nombre']; ?></td>
                            <td>
                                <a href="<?=base_url('eliminar_grado/').$grado['codigo_grado'];?>"
                                class="btn btn-primary"><i class="bi bi-trash3"> Eliminar</i></a>

                                
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
