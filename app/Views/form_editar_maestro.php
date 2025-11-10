<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Maestro</title>
    <!-- Usando un CDN de Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h1 class="card-title text-center mb-4 text-primary">Modificar Maestro</h1>
                  
                    <!-- RUTA DE ACCIÓN: CORREGIDO a 'maestros/modificar' -->
                    <form action="<?= base_url('maestros/modificar') ?>" method="post">
                        
                        <!-- El valor del código de maestro es necesario para el update en el controlador -->
                        <input type="hidden" name="txt_codigo_maestro" value="<?= esc($maestro['codigo_maestro']) ?>">

                        <div class="mb-3">
                            <label for="txt_codigo_maestro_display" class="form-label">Código de Maestro (No editable)</label>
                            <input type="text" name="txt_codigo_maestro_display" id="txt_codigo_maestro_display" class="form-control"
                            value="<?= esc($maestro['codigo_maestro']) ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="txt_nombre" class="form-label">Nombre</label>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control"
                            value="<?= esc($maestro['nombre']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="txt_apellido" class="form-label">Apellido</label>
                            <input type="text" name="txt_apellido" id="txt_apellido" class="form-control"
                            value="<?= esc($maestro['apellido']) ?>" required>
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="txt_direccion" class="form-label">Dirección</label>
                            <input type="text" name="txt_direccion" id="txt_direccion" class="form-control"
                            value="<?= esc($maestro['direccion']) ?>" required>
                        </div>

                        
                        <div class="mb-3">
                            <label for="txt_email" class="form-label">Email</label>
                            <input type="email" name="txt_email" id="txt_email" class="form-control"
                            value="<?= esc($maestro['email']) ?>" required>
                        </div>
                        
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="<?= base_url('maestros') ?>" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>