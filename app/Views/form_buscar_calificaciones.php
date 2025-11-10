<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Búsqueda de Calificaciones</title>
    </head>
<body>
    <main class="form-container">
        <h1>🔍 Búsqueda de Calificaciones</h1>
        <p>Ingrese el Carné del Alumno, el Código de Materia o el Período a buscar.</p>

        <form action="<?= base_url('calificaciones/resultado') ?>" method="post">
            <label for="termino_busqueda">Término de Búsqueda:</label>
            <input 
                type="text" 
                name="termino_busqueda" 
                placeholder="Ej: 2013001 o Nota 1"
                required
            >

            <button type="submit">
                Buscar Calificaciones
            </button>
            <a href="<?= base_url('calificaciones/mostrar') ?>">Volver al Listado Completo</a>
        </form>
    </main>
</body>
</html>