<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CRUD Extracurriculares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestión Escolar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- if role is admin show all menu items else show limited items -->

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/menu_principal">Menú Principal</a>
                    </li>
                 <?php 
                    $session = session();
                    if($session->get('role') == 'admin'){
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/estudiantes">Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/maestros">Maestros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/materias">Materias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/grados">Grados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/extracurriculares">Extracurriculares</a>
                    </li>
                
                <?php
                    } 
                ?>
                </ul>

                <!-- if logged in show logout button -->
                <?php 
                    $session = session();
                    if($session->get('activa')){
                ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/cerrar_sesion">Cerrar Sesión</a>
                        </li>
                    </ul>
                <?php
                    }
                ?>

            </div>
        </div>
    </nav>  


    <div class="container py-4">
        <h1 class="mb-4">Extracurriculares</h1>

        <!-- Formulario de creación -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="/extracurriculares/store" method="post" class="row g-3">
                    <div class="col-md-4">
                        <label for="estudiante_id" class="form-label">Estudiante ID</label>
                        <input type="number" class="form-control" id="estudiante_id" name="estudiante_id" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre_actividad" class="form-label">Nombre de la actividad</label>
                        <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Crear</button>
                        <!-- add search button for modal -->
                        <button type="button" class="btn btn-secondary w-100 ms-2" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal for search -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/extracurriculares/search" method="get" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Buscar actividades</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="search_query" class="form-label">Término de búsqueda</label>
                            <input type="text" class="form-control" id="search_query" name="query" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla con registros -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Listado</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Estudiante ID</th>
                                <th>Nombre actividad</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($extracurriculares) && is_array($extracurriculares)): ?>
                                <?php foreach ($extracurriculares as $row): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($row['estudiante_id'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($row['nombre_actividad'] ?? '') ?></td>
                                        <td class="text-end">
                                            <button
                                                class="btn btn-sm btn-outline-secondary me-2"
                                                onclick="openEditModal(<?= htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') ?>)">
                                                Editar
                                            </button>

                                            <form action="/extracurriculares/delete/<?= urlencode($row['id'] ?? '') ?>" method="post" style="display:inline" onsubmit="return confirm('¿Eliminar este registro?')">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No hay registros</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editForm" action="/extracurriculares/update" method="post" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar actividad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="mb-3">
                            <label for="edit_estudiante_id" class="form-label">Estudiante ID</label>
                            <input type="number" class="form-control" id="edit_estudiante_id" name="estudiante_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nombre_actividad" class="form-label">Nombre actividad</label>
                            <input type="text" class="form-control" id="edit_nombre_actividad" name="nombre_actividad" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const editModalEl = document.getElementById('editModal');
        const bsEditModal = new bootstrap.Modal(editModalEl);

        function openEditModal(data) {
            // data esperado: { id, estudiante_id, nombre_actividad }
            document.getElementById('edit_id').value = data.id ?? '';
            document.getElementById('edit_estudiante_id').value = data.estudiante_id ?? '';
            document.getElementById('edit_nombre_actividad').value = data.nombre_actividad ?? '';
            bsEditModal.show();
        }
    </script>
</body>
</html>