<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Calificaciones</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    :root {
        --color-primario: #007bff;
        --color-secundario: #28a745;
        --color-peligro: #dc3545;
        --color-advertencia: #ffc107;
        --color-info: #17a2b8;
        --color-fondo: #f8f9fa;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--color-fondo);
    }

    .crud-container {
        max-width: 1300px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .crud-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }

    .crud-buttons a {
        text-decoration: none;
    }

    .crud-buttons button {
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-insertar {
        background-color: var(--color-secundario);
        color: white;
    }

    .btn-insertar:hover {
        background-color: #218838;
    }

    .btn-buscar,
    .btn-informe {
        background-color: var(--color-primario);
        color: white;
    }

    .btn-buscar:hover,
    .btn-informe:hover {
        background-color: #0056b3;
    }

    .btn-modificar-fila {
        background-color: var(--color-advertencia);
        color: #333;
    }

    .btn-eliminar-fila {
        background-color: var(--color-peligro);
        color: white;
    }

    .table-responsive {
        overflow-x: auto;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px;
    }

    th,
    td {
        border: 1px solid #e9ecef;
        padding: 12px;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background-color: #e9ecef;
        color: #333;
        font-weight: 600;
    }

    tr:nth-child(even) {
        background-color: #f6f6f6;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>

    <div class="container">
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

    <main class="crud-container">

        <h1>📊 Gestión de Calificaciones</h1>
        <p>Panel de administración de calificaciones.</p>

        <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
        <?php endif; ?>

        <section id="menu-crud">
            <h2>Acciones Principales</h2>
            <div class="crud-buttons">
                <a href="<?= base_url('calificaciones/nuevo') ?>">
                    <button class="btn-insertar">➕ Insertar Calificación</button>
                </a>

                <a href="<?= base_url('calificaciones/buscar') ?>">
                    <button class="btn-buscar">🔍 Búsqueda de Datos</button>
                </a>
            </div>
        </section>

        <hr>

        <section id="lista-datos">
            <h3>📝 Calificaciones Registradas</h3>

            <?php if (empty($calificaciones)): ?>
            <p>No hay calificaciones registradas.</p>
            <?php else: ?>
            <div class="table-responsive">
                <table id="tablaCalificaciones">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Carné Alumno</th>
                            <th>Código Materia</th>
                            <th>Período</th>
                            <th>Puntuación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($calificaciones as $calificacion): ?>
                        <tr>
                            <td><?= $calificacion['id'] ?></td>
                            <td><?= $calificacion['estudiante_id'] ?></td>
                            <td><?= $calificacion['materia_id'] ?></td>
                            <td><?= $calificacion['periodo'] ?></td>
                            <td><?= number_format($calificacion['puntuacion'], 2) ?></td>
                            <td>
                                <a href="<?= base_url('calificaciones/editar/' . $calificacion['id']) ?>">
                                    <button class="btn-modificar-fila">✏️ Modificar</button>
                                </a>

                                <a href="<?= base_url('calificaciones/eliminar/' . $calificacion['id']) ?>"
                                    onclick="return confirm('¿Está seguro de que desea eliminar esta calificación?');">
                                    <button class="btn-eliminar-fila">🗑️ Eliminar</button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </section>

    </main>
    </div>
</body>

</html>