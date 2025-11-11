<?php
// app/Views/estudiantes.php
// Vista CRUD para la tabla "estudiantes" (asume CI4: $estudiantes provisto por el controlador)
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Estudiantes - CRUD</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Usar CDN de Bootstrap para estilos rápidos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container ">

<!-- add navbar -->


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






    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Estudiantes</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">Nuevo estudiante</button>
        <!-- button search modal -->
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalSearch">Buscar estudiante</button>
        <!-- show all estudiantes button -->
        <a href="<?= site_url('estudiantes') ?>" class="btn btn-info text-white">Mostrar todos</a>
    </div>

    <!-- Modal Buscar Estudiante -->
    <div class="modal fade" id="modalSearch" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= site_url('estudiantes') ?>" method="get" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buscar estudiante por Carné</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">Carné del estudiante</label>
                        <input name="query" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mensajes flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <!-- Tabla -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Carné</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha Nac.</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($estudiantes) && is_array($estudiantes)): ?>
                <?php foreach ($estudiantes as $est): ?>
                    <tr>
                        <td><?= esc($est['id'] ?? $est->id) ?></td>
                        <td><?= esc($est['carne_alumno'] ?? $est->carne_alumno) ?></td>
                        <td><?= esc($est['nombre'] ?? $est->nombre) ?></td>
                        <td><?= esc($est['apellido'] ?? $est->apellido) ?></td>
                        <td><?= esc($est['email'] ?? $est->email) ?></td>
                        <td><?= esc($est['telefono'] ?? $est->telefono) ?></td>
                        <td><?= esc($est['fechanacimiento'] ?? $est->fechanacimiento) ?></td>
                        <td><?= esc($est['grado_id'] ?? $est->grado_id) ?></td>
                        <td style="min-width:160px">
                            <button
                                class="btn btn-sm btn-outline-secondary btn-edit"
                            
                                data-id="<?= esc($est['id'] ?? $est->id) ?>"
                                data-nombre="<?= esc($est['nombre'] ?? $est->nombre) ?>"
                                data-apellido="<?= esc($est['apellido'] ?? $est->apellido) ?>"
                                data-correo="<?= esc($est['email'] ?? $est->email) ?>"
                                data-telefono="<?= esc($est['telefono'] ?? $est->telefono) ?>"
                                data-fecha_nacimiento="<?= esc($est['fechanacimiento'] ?? $est->fechanacimiento) ?>"
                                data-grado="<?= esc($est['grado_id'] ?? $est->grado_id) ?>"
                                data-bs-toggle="modal" data-bs-target="#modalEdit"
                            >
                                Editar
                            </button>

                            <form action="<?= site_url('estudiantes/delete/' . (esc($est['id'] ?? $est->id))) ?>" method="post" class="d-inline-block" onsubmit="return confirm('Eliminar este estudiante?');">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8" class="text-center">No hay estudiantes registrados.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Crear -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= site_url('estudiantes/create') ?>" method="post" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title">Nuevo estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label">Nombre</label>
                    <input name="nombre" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Apellido</label>
                    <input name="apellido" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Correo</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Teléfono</label>
                    <input name="telefono" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input name="fechanacimiento" type="date" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Grado</label>
                    <input name="grado_id" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit" method="post" class="modal-content">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-header">
                <h5 class="modal-title">Editar estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit_id">
                <div class="mb-2">
                    <label class="form-label">Nombre</label>
                    <input id="edit_nombre" name="nombre" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Apellido</label>
                    <input id="edit_apellido" name="apellido" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Correo</label>
                    <input id="edit_correo" name="email" type="email" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Teléfono</label>
                    <input id="edit_telefono" name="telefono" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input id="edit_fecha" name="fechanacimiento" type="date" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Grado</label>
                    <input id="edit_grado" name="grado_id" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Rellenar formulario de edición con datos del botón pulsado
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const nombre = this.dataset.nombre || '';
            const apellido = this.dataset.apellido || '';
            const correo = this.dataset.correo || '';
            const telefono = this.dataset.telefono || '';
            const fecha = this.dataset.fecha_nacimiento || '';
            const grado = this.dataset.grado || '';

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nombre').value = nombre;
            document.getElementById('edit_apellido').value = apellido;
            document.getElementById('edit_correo').value = correo;
            document.getElementById('edit_telefono').value = telefono;
            document.getElementById('edit_fecha').value = fecha;
            document.getElementById('edit_grado').value = grado;

            // Ajustar action del formulario según convención REST (controlador Estudiantes::update)
            const form = document.getElementById('formEdit');
            form.action = '<?= site_url('estudiantes/update/') ?>' + id;
        });
    });
</script>
</body>
</html>