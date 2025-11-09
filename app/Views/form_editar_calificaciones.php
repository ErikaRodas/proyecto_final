<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Calificación</title>
    </head>
<body>
    <main class="form-container">
        <h1>🖊️ Modificar Calificación ID: <?= $calificacion['id_calificacion'] ?></h1>

        <form action="<?= base_url('calificaciones/actualizar') ?>" method="post">
            
            <input type="hidden" name="id_calificacion" value="<?= $calificacion['id_calificacion'] ?>">
            
            <label for="carne_alumno">Carné del Estudiante (7 dígitos):</label>
            <input 
                type="text" 
                name="carne_alumno" 
                value="<?= old('carne_alumno', $calificacion['carne_alumno'] ?? '') ?>" 
                required
            >
            
            <button type="submit">
                🔄 Guardar Cambios
            </button>
            <a href="<?= base_url('calificaciones/mostrar') ?>">Cancelar y Volver</a>
        </form>
    </main>
</body>
</html>