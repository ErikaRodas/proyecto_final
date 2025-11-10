<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Materias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestión Escolar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                        <a class="nav-link active" aria-current="page" href="/materias">Materias</a> </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/grados">Grados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/extracurriculares">Extracurriculares</a>
                    </li>
                
                    <?php
                        } 
                    ?>
                </ul>

                <?php 
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

        <h1 class="p-3 mb-4 rounded text-center text-white bg-primary bg-opacity-75 shadow-sm">
            <i class="fas fa-book-open me-2"></i> Gestión de Materias
        </h1>

        <?php if (session()->getFlashdata('msg_exito')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('msg_exito') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (isset($mensaje) && $mensaje): ?> 
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= $mensaje ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


        <div class="d-flex justify-content-end mb-3">
            
            <a href="<?= base_url('materia/buscar') ?>" class="btn btn-info fw-bold text-dark shadow me-2">
                <i class="bi bi-search me-2"></i> Buscar Materia 
            </a>

            <button type="button" class="btn btn-primary fw-bold text-white shadow" data-bs-toggle="modal" data-bs-target="#agregarMateriaModal">
                <i class="fas fa-plus-circle me-2"></i> Agregar Materia
            </button>
        </div>

        <div class="modal fade" id="agregarMateriaModal" tabindex="-1" aria-labelledby="agregarMateriaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="agregarMateriaModalLabel">Nueva Materia</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('agregar_materia') ?>" method="post"> 
                            
                            <label for="txt_nombre_materia" class="form-label mt-2">Nombre de la Materia</label>
                            <input type="text" name="txt_nombre_materia" id="txt_nombre_materia" class="form-control" required>
                            
                            <button type="submit" class="form-control btn btn-primary mt-4">
                                <i class="bi bi-box-arrow-in-down me-2"></i> Guardar Materia
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

                    <table class="table table-striped table-hover shadow-sm">
                        <thead>
                            <tr class="table-primary text-dark">
                                <th>Código Mat.</th> 
                                <th>Materia</th>
                                <th>Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $lista_materias = $materias ?? $datos ?? [];
                            if (empty($lista_materias)) {
                                $lista_materias = [];
                            }

                            foreach ($lista_materias as $materia) {
                            ?>
                            <tr>
                                <td> <?=$materia['codigo_materia'];?> </td>
                                <td> <?=$materia['nombre_materia'];?> </td>
                                <td> 
                                    <a href="<?= base_url('eliminar_materia/' . $materia['id']) ?>" class="btn btn-sm btn-danger me-1" onclick="return confirm('¿Está seguro de eliminar la materia <?= $materia['codigo_materia'] ?>?');">Eliminar</a>
                      
                                    <a href="<?= base_url('editar_materia/' . $materia['id']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Modificar</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <?php if (isset($mensaje) && count($lista_materias) === 0): ?>
                        <p class="text-center text-muted">Intente con un término de búsqueda diferente o <a href="<?= base_url('materias') ?>">vea el listado completo</a>.</p>
                    <?php elseif (empty($lista_materias) && !isset($mensaje)): ?>
                        <p class="text-center text-muted">Aún no hay materias registradas. Utilice el botón "Agregar Materia".</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>