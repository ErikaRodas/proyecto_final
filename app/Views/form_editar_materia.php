<?php 
if (!isset($materia)) {
    header("Location: " . base_url('materias'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .header-bar { background-color: #ffc107; color: #343a40; padding: 20px 0; margin-bottom: 30px; }
        .header-bar h1 { margin: 0; font-weight: bold; }
        .card { box-shadow: 0 6px 20px rgba(0,0,0,0.1); border-radius: 15px; }
    </style>
</head>
<body>

    <div class="header-bar text-center">
        <h1 class="display-5"><i class="fas fa-edit"></i> Editando: <?= $materia['nombre_materia'] ?></h1>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card p-4">
                <h5 class="card-title mb-4 text-center">Formulario de Modificación de Materia</h5>

                <form action="<?= base_url('modificar_materia') ?>" method="post">
                    
                    <input type="hidden" name="txt_codigo_materia" value="<?= $materia['id'] ?>">
                    
                    <div class="mb-3">
                        <label for="txt_nombre_materia" class="form-label">Nombre de la Materia</label>
                        <input type="text" name="txt_nombre_materia" id="txt_nombre_materia" class="form-control" 
                               value="<?= $materia['nombre_materia'] ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="ddl_codigo_maestro" class="form-label">Maestro Asignado</label>
                        <select name="ddl_codigo_maestro" id="ddl_codigo_maestro" class="form-select">
                            <option value="">-- Sin Maestro Asignado (Opcional) --</option>
                            <?php foreach ($maestros as $maestro): ?>
                                <option value="<?= $maestro['codigo_maestro'] ?>" 
                                    <?= ($maestro['codigo_maestro'] == $materia['maestro_id']) ? 'selected' : '' ?>>
                                    <?= $maestro['nombre'] . ' ' . $maestro['apellido'] ?> (Cód: <?= $maestro['codigo_maestro'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-warning fw-bold"><i class="fas fa-save"></i> Guardar Cambios</button>
                        <a href="<?= base_url('materias') ?>" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Volver a la Lista</a>
                    </div>
                </form>

            </div>
        </div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>