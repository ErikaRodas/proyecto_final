<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Maestro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos básicos para centrar y dar un toque de sombra */
        body { background-color: #f8f9fa; }
        .card { box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 0.75rem; }
        .input-group-text { background-color: #e9ecef; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card p-4">
                    <h1 class="card-title text-center mb-4 text-primary">Buscar Maestro</h1>
                    <p class="text-center text-muted mb-4">Ingresa el nombre, apellido o código del maestro a buscar.</p>
                    
                    <!-- RUTA DE ACCIÓN: CORREGIDO a 'maestros/resultado' (plural) -->
                    <form action="<?= base_url('maestros/resultado') ?>" method="post">
                        
                        <div class="input-group mb-4 shadow-sm">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1q.06-.054.114-.098ZM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                            </span>
                            <input type="text" 
                                    name="termino_busqueda" 
                                    id="termino_busqueda" 
                                    class="form-control form-control-lg" 
                                    placeholder="Nombre, Apellido o Código..." 
                                    required>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1q.06-.054.114-.098ZM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                                Buscar
                            </button>
                            <!-- ENLACE CANCELAR: CORREGIDO a 'maestros' (ruta principal) -->
                            <a href="<?= base_url('maestros') ?>" class="btn btn-secondary">
                                Cancelar y Volver al Listado
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>