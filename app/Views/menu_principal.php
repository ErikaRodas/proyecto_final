<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal del Colegio</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php 
        $session = session();
        
        // Verifica si la sesión está activa
        if(!$session->get('activa')){
            echo '<div class="container mt-5"><div class="alert alert-danger" role="alert"><h1>Acceso Denegado</h1>No tienes una sesión activa.</div></div>';
        } else {
            $nombre = $session->get('nombre');
            $tipo_usuario = $session->get('tipo'); // Será 1 (Admin) o 2 (Estudiante)
            $rol_texto = ($tipo_usuario == 1) ? 'Administrador(a)' : 'Estudiante';
    ?>
    
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title"> Menú Principal: <?= $rol_texto ?></h1>
            </div>
            <div class="card-body">
                <p class="lead">Bienvenido(a), <?= htmlspecialchars($nombre) ?>**</p>
                <hr>
                
                <?php if ($rol == 1): ?>
                    
                    <h3 class="mt-4 mb-3 text-success"> Gestión Completa (6 Tablas)</h3>
                    
                    <div class="list-group">
                        <a href="<?= base_url('maestros') ?>" class="list-group-item list-group-item-action list-group-item-success"> 1. Gestión de Maestros</a>
                        <a href="<?= base_url('estudiantes') ?>" class="list-group-item list-group-item-action list-group-item-success"> 2. Gestión de Estudiantes</a>
                        <a href="<?= base_url('grados') ?>" class="list-group-item list-group-item-action list-group-item-success"> 3. Gestión de Grados</a>
                        <a href="<?= base_url('materias') ?>" class="list-group-item list-group-item-action list-group-item-success"> 4. Gestión de Materias</a>
                        <a href="<?= base_url('calificaciones') ?>" class="list-group-item list-group-item-action list-group-item-success"> 5. Registro de Calificaciones</a>
                        <a href="<?= base_url('extracurriculares') ?>" class="list-group-item list-group-item-action list-group-item-success"> 6. Actividades Extracurriculares</a>
                    </div>
                
                <?php elseif ($rol == 2):  ?>
                    
                    <h3 class="mt-4 mb-3 text-info">Consulta de Información</h3>
                    
                    <div class="list-group">
                        <a href="<?= base_url('calificaciones') ?>" class="list-group-item list-group-item-action list-group-item-info"> Ver Mis Calificaciones</a>
                    </div>
                    
                <?php endif; ?>
                
            </div>
            <div class="card-footer text-end">
                <a href="<?= base_url('cerrar_sesion') ?>" class="btn btn-danger"> Cerrar Sesión</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <?php
        }
    ?>
</body>
</html>