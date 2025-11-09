
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Materias</title>
    <!-- Usando un CDN de Bootstrap 5.3.3 y Font Awesome para iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .header-bar { background-color: #3f90ff; color: white; padding: 20px 0; margin-bottom: 30px; }
        .header-bar h1 { margin: 0; }
        .card { box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 10px; }
    </style>
</head>
<body>

    <div class="header-bar text-center">
        <h1 class="display-4"><i class="fas fa-book-open"></i> Gestión de Materias</h1>
    </div>

    <div class="container">
       
        <?php if (session()->getFlashdata('msg_exito')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('msg_exito') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

     
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMateriaModal">
                <i class="fas fa-plus-circle"></i> Agregar Materia
            </button>
        </div>

        <!-- TABLA DE MATERIAS -->
        <div class="card p-4">
            <h5 class="card-title mb-4">Listado de Materias</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Código Mat.</th>
                            <th>Materia</th>
                            <th>Maestro Asignado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materias as $materia): ?>
                            <tr>
                                <td><?= $materia['codigo_materia'] ?></td>
                                <td><?= $materia['nombre_materia'] ?></td>
                                <td>
                                    <?php 
                                        if ($materia['nombre_maestro']) {
                                           
                                            echo $materia['nombre_maestro'] . ' ' . $materia['apellido_maestro'];
                                        } else {
                                          
                                            echo '<span class="text-danger">Sin asignar</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                 
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Modificar</a> 
                                    <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar esta materia?');"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="agregarMateriaModal" tabindex="-1" aria-labelledby="agregarMateriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="agregarMateriaModalLabel">Agregar Nueva Materia</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               
                <form action="<?= base_url('agregar_materia') ?>" method="post">
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="txt_nombre_materia" class="form-label">Nombre de la Materia</label>
                            <input type="text" name="txt_nombre_materia" id="txt_nombre_materia" class="form-control" required>
                        </div>
                        
               
                        <div class="mb-3">
                            <label for="ddl_codigo_maestro" class="form-label">Maestro Asignado</label>
                            <select name="ddl_codigo_maestro" id="ddl_codigo_maestro" class="form-select">
                                <option value="" selected>-- Seleccione un Maestro (Opcional) --</option>
                                <?php foreach ($maestros as $maestro): ?>
                                    <option value="<?= $maestro['codigo_maestro'] ?>">
                                        <?= $maestro['nombre'] . ' ' . $maestro['apellido'] ?> (Cód: <?= $maestro['codigo_maestro'] ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Materia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>