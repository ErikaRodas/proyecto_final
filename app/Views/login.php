<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login del Colegio</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        /* Estilo para centrar el formulario verticalmente en la pantalla */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa; /* Fondo gris claro */
        }
        .login-card {
            max-width: 400px;
            width: 90%;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="card shadow-lg">
            
            <div class="card-header text-center bg-primary text-white">
                <h3 class="mb-0">🔑 Inicio de Sesión - Colegio</h3>
            </div>
            
            <div class="card-body">
                
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                
                <form action="<?= base_url('iniciar_sesion') ?>" method="post">
                    
                    <div class="mb-3">
                        <label for="txt_usuario" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="txt_usuario" name="txt_usuario" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="txt_contra" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="txt_contra" name="txt_contra" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">Entrar al Sistema</button>
                    </div>
                </form>
            </div>
            
            <div class="card-footer text-muted text-center">
                <small>
                    --- Pruebas ---<br>
                    Admin: erika@mail.com / erika123<br>
                    Estudiante: helary@mail.com / helary123
                </small>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>