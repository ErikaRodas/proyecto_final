<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Maestros</title>
    <!-- Librerías de Bootstrap y Íconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome para el ícono de Modificar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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




    <h1 class="p-3 mb-4 rounded text-center text-dark bg-info bg-opacity-75 shadow-sm">
        <i class="bi bi-person-badge-fill me-2"></i> Gestión de Maestros
    </h1>
     <?php if (session()->getFlashdata('msg_exito')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg_exito') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- SECCIÓN DE BOTONES: AQUÍ ESTÁ EL BOTÓN DE BUSCAR -->
    <div class="d-flex justify-content-end mb-3">
        <!-- BOTÓN DE BÚSQUEDA (NUEVO) -->
        <a href="<?= base_url('maestros/buscar') ?>" class="btn btn-warning fw-bold text-dark shadow me-2">
            <i class="bi bi-search me-2"></i> Buscar Maestro
        </a>

        <!-- BOTÓN AGREGAR MAESTRO (EXISTENTE) -->
        <button type="button" class="btn btn-info fw-bold text-dark shadow" data-bs-toggle="modal" data-bs-target="#agregarMaestroModal">
            <i class="bi bi-person-fill-add me-2"></i> Agregar Maestro
        </button>
    </div>
    <div class="modal fade" id="agregarMaestroModal" tabindex="-1" aria-labelledby="agregarMaestroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-info text-dark">
                    <h1 class="modal-title fs-5" id="agregarMaestroModalLabel">Nuevo Maestro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORMULARIO CORREGIDO: APUNTA A LA RUTA CORRECTA DE GUARDAR -->
                    <form action="<?=base_url('maestros/guardar');?>" method="post"> 
                        
                        <!-- Campos del formulario: -->
                        <label for="txt_nombre" class="form-label mt-2">Nombre(s)</label>
                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required>

                        <label for="txt_apellido" class="form-label mt-2">Apellido(s)</label>
                        <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" required>
                        
                        <label for="txt_direccion" class="form-label mt-2">Dirección</label>
                        <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" required>
                        
                        <label for="txt_email" class="form-label mt-2">Email</label>
                        <input type="email" name="txt_email" id="txt_email" class="form-control" required>
                        
                        <button type="submit" class="form-control btn btn-success mt-4">
                            <i class="bi bi-box-arrow-in-down me-2"></i> Guardar Maestro
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    
    <div class="container">
        <div class="row">
            <div class="col-12">
            <!-- MENSAJE DE RESULTADO DE BÚSQUEDA (opcional) -->
            <?php if (isset($mensaje)): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?= $mensaje ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-hover shadow-sm">
                <thead>
                    <tr class="table-info text-dark">
                        <th>Código</th>
                        <th>Nombre(s)</th>
                        <th>Apellido(s)</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
            <tbody>
                <?php 
                // Usamos $datos o $maestros para asegurar que funcione al venir de la búsqueda.
                $lista_maestros = $datos ?? $maestros ?? [];

                foreach ($lista_maestros as $maestro) {
                ?>
                <tr>
                    <td> <?=$maestro['codigo_maestro'];?> </td>
                    <td> <?=$maestro['nombre'];?> </td>
                    <td> <?=$maestro['apellido'];?> </td>
                    <td> <?=$maestro['direccion'];?> </td>
                    <td> <?=$maestro['email'];?> </td>
                    <td> 
                        <!-- Botón Eliminar -->
    <a href="<?= base_url('maestros/eliminar/' .$maestro['id']) ?>" class="btn btn-sm btn-danger me-1" onclick="return confirm('¿Está seguro de eliminar el registro <?= $maestro['codigo_maestro'] ?>? Esta acción no se puede deshacer.');">Eliminar</a>
         
    <a href="<?= base_url('maestros/editar/' . $maestro['id']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Modificar</a>
                    </td>
                </tr>
                <?php
                }
                ?>

            </tbody>
            </table>
            <!-- Mostrar mensaje si no hay resultados después de una búsqueda -->
            <?php if (isset($mensaje) && count($lista_maestros) === 0): ?>
                <p class="text-center text-muted">Intente con un término de búsqueda diferente o <a href="<?= base_url('maestros') ?>">vea el listado completo</a>.</p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>