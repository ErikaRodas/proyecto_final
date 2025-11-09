<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Maestros</title>
    <!-- Librerías de Bootstrap y Íconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container py-4">

    <h1 class="p-3 mb-4 rounded text-center text-dark bg-info bg-opacity-75 shadow-sm">
        <i class="bi bi-person-badge-fill me-2"></i> Gestión de Maestros
    </h1>
    
  
    <?php if (session()->getFlashdata('msg_exito')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg_exito') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-info fw-bold text-dark shadow" data-bs-toggle="modal" data-bs-target="#agregarMaestroModal">
            <i class="bi bi-person-fill-add me-2"></i> Agregar Maestro
        </button>
    </div>

    <div class="modal fade" id="agregarMaestroModal" tabindex="-1" aria-labelledby="agregarMaestroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-info text-dark">
                    <h1 class="modal-title fs-5" id="agregarMaestroModalLabel">Nuevo Maestro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario que apunta a la función 'agregarMaestro' del controlador -->
                    <form action="<?=base_url('agregar_maestro');?>" method="post">
                        <!-- Campos del formulario: -->

                        <label for="txt_nombre" class="form-label mt-2">Nombre(s)</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required>

                        <label for="txt_apellido" class="form-label mt-2">Apellido(s)</label>
                        <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" required>
                        
                        <label for="txt_direccion" class="form-label mt-2">Dirección</label>
                        <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" required>
                        
                        <label for="txt_email" class="form-label mt-2">Email</label>
                        <input type="email" name="txt_email" id="txt_email" class="form-control" required>
                        
                        <button type="submit" class="form-control btn btn-success mt-4">
                            <i class="bi bi-box-arrow-in-down me-2"></i> Guardar Maestro
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table table-striped table-hover shadow-sm">
                <thead>
                    <tr class="table-info text-dark">
                        <th>Código</th>
                        <th>Nombre(s)</th>
                        <th>Apellido(s)</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
            <tbody>
                <?php 
            
                foreach ($datos as $maestro) {
                ?>
                <tr>
                    <td> <?=$maestro['codigo_maestro'];?> </td>
                    <td> <?=$maestro['nombre'];?> </td>
                    <td> <?=$maestro['apellido'];?> </td>
                    <td> <?=$maestro['direccion'];?> </td>
                    <td> <?=$maestro['email'];?> </td>
                    <td> 
                        
    <a href="<?= base_url('eliminar_maestro/'.$maestro['codigo_maestro']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro <?= $maestro['codigo_maestro'] ?>? Esta acción no se puede deshacer.');">Eliminar</a>
                    <a href="<?= base_url('buscar_maestro/'.$maestro['codigo_maestro']) ?>" class="btn btn-sm btn-warning">Modificar</a>
</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>
</div> 

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>