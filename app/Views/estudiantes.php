<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Estudiante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>

<div class="container mt-5">
    
    <h2 class="mb-4">
        <i class="bi bi-person-plus-fill"></i> Agregar Nuevo Estudiante
    </h2>

    <form action="<?= base_url('agregar_estudiante'); ?>" method="post">
        
        <div class="mb-3">
            <label for="txt_carne_alumno" class="form-label">
                <i class="bi bi-person-badge-fill"></i> Carné del alumno
            </label>
            <input type="number" name="txt_carne_alumno" id="txt_carne_alumno" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="txt_nombre" class="form-label">
                <i class="bi bi-person-vcard"></i> Nombre
            </label>
            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="txt_apellido" class="form-label">
                <i class="bi bi-person-vcard"></i> Apellido
            </label>
            <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="txt_direccion" class="form-label">
                <i class="bi bi-house-door"></i> Dirección
            </label>
            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control">
        </div>

        <div class="mb-3">
            <label for="txt_telefono" class="form-label">
                <i class="bi bi-phone"></i> Teléfono
            </label>
            <input type="number" name="txt_telefono" id="txt_telefono" class="form-control">
        </div>

        <div class="mb-3">
            <label for="txt_email" class="form-label">
                <i class="bi bi-envelope"></i> Email
            </label>
            <input type="email" name="txt_email" id="txt_email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="txt_fechanacimiento" class="form-label">
                <i class="bi bi-calendar-date"></i> Fecha de nacimiento
            </label>
            <input type="date" name="txt_fechanacimiento" id="txt_fechanacimiento" class="form-control">
        </div>

        <div class="mb-3">
            <label for="txt_codigo_grado" class="form-label">
                <i class="bi bi-book"></i> Código del grado
            </label>
            <input type="number" name="txt_codigo_grado" id="txt_codigo_grado" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3 me-2">
            <i class="bi bi-floppy"></i> Guardar Registro
        </button>
        
        <button type="reset" class="btn btn-secondary mt-3">
            <i class="bi bi-x-circle"></i> Limpiar Campos
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>