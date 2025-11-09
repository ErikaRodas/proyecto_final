<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Calificación</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f8f9fa;
    }

    .form-container {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    input[type="number"] {
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        padding: 12px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 8px;
        width: 100%;
        justify-content: center;
    }

    .error-validation {
        color: red;
        border: 1px solid red;
        background-color: #fee;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .error-db {
        color: white;
        background-color: darkred;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }
    </style>
</head>

<body>
    <main class="form-container">
        <h1>📝 Registrar Nueva Calificación</h1>

        <?php 
        if (isset($validation)): ?>
        <div class="error-validation">
            <strong>❌ Error de Validación:</strong> Por favor, verifique los datos ingresados.
            <?= $validation->listErrors() ?>
        </div>
        <?php endif; ?>

        <?php 
        if (isset($error_db)): ?>
        <div class="error-db">
            <strong>⚠️ ¡Error en el Sistema!</strong> <?= $error_db ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('calificaciones/guardar') ?>" method="post">

            <label for="carne_alumno">Carné del Estudiante (7 dígitos):</label>
            <input type="text" name="carne_alumno"
                value="<?= old('carne_alumno', $datos_anteriores['carne_alumno'] ?? '') ?>" placeholder="Ej: 2013001"
                required>

            <label for="codigo_materia">Código de Materia:</label>
            <input type="number" name="codigo_materia"
                value="<?= old('codigo_materia', $datos_anteriores['codigo_materia'] ?? '') ?>" placeholder="Ej: 101"
                required>

            <label for="periodo">Período/Nota (Ej: Nota 1, Final):</label>
            <input type="text" name="periodo" value="<?= old('periodo', $datos_anteriores['periodo'] ?? '') ?>"
                required>

            <label for="puntuacion">Puntuación (0.00 a 100.00):</label>
            <input type="number" name="puntuacion" min="0" max="100" step="0.01"
                value="<?= old('puntuacion', $datos_anteriores['puntuacion'] ?? '') ?>" required>

            <button type="submit">
                💾 Guardar Calificación
            </button>
        </form>
    </main>
</body>

</html>