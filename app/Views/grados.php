<?php // app/Views/grados.php
// Vista CRUD para 'grados' (CI4). Espera $grados como array de objetos/arrays con keys: id, codigo_grado, nombre_grado
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Grados - CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-name" content="<?= csrf_token() ?>">
    <meta name="csrf-hash" content="<?= csrf_hash() ?>">
    <!-- Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">



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
        <h2>Grados</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" id="btnAdd">Agregar grado</button>
        <!-- button search grades -->
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#searchModal" id="btnSearch">Buscar grado</button>
        <!-- button all grades -->
        <a href="<?php echo site_url('grados'); ?>" class="btn btn-info text-white" id="btnAll">Ver todos</a>
    </div>

    


    <div id="alertPlaceholder"></div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0" id="tablaGrados">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($grados)): ?>
                        <?php foreach ($grados as $g): ?>
                            <tr data-id="<?= esc($g['id'] ?? $g->id) ?>">
                                <td><?= esc($g['id'] ?? $g->id) ?></td>
                                <td class="codigo"><?= esc($g['codigo_grado'] ?? $g->codigo_grado) ?></td>
                                <td class="nombre"><?= esc($g['nombre_grado'] ?? $g->nombre_grado) ?></td>
                                <td class="text-end">
                                    <!--update modal botstrap-->
                                    <button class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= esc($g['id'] ?? $g->id) ?>" data-codigo="<?= esc($g['codigo_grado'] ?? $g->codigo_grado) ?>" data-nombre="<?= esc($g['nombre_grado'] ?? $g->nombre_grado) ?>">Editar</button>

                                    <a href="<?php echo site_url('grados/delete/' . (isset($g['id']) ? $g['id'] : $g->id)); ?>" class="btn btn-sm btn-danger">Eliminar</a> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center py-3">No hay grados registrados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- search modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="searchGradoForm" method="get" action="<?php echo site_url('grados/search'); ?>" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Buscar grado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
          <?= csrf_field() ?>
          <div class="mb-3">
              <label for="searchCodigo" class="form-label">Código del grado</label>
              <input type="text" class="form-control" id="searchCodigo" name="query" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
    </form>
  </div>
</div>

<!-- update modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editGradoForm" method="post" action="<?php echo site_url('grados/update/'.esc($g['id'] ?? $g->id)); ?>" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar grado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
          <?= csrf_field() ?>
          <input type="hidden" name="txt_codigo_grado" id="editCodigoGrado" value="">
          <div class="mb-3">
              <label for="editNombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="editNombre" name="txt_nombre" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal formulario (crear / editar) -->
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="gradoForm" method="post" action="<?php echo site_url('grados/create'); ?>" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Agregar grado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
          <?= csrf_field() ?>
          <input type="hidden" name="id" id="gradoId" value="">
          <div class="mb-3">
              <label for="codigo" class="form-label">Código</label>
              <input type="text" class="form-control" id="codigo" name="codigo_grado" required>
          </div>
          <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre_grado" required>
          </div>
          <div id="formErrors" class="text-danger small"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="submitBtn">Guardar</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS + dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>