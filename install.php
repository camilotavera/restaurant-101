<?php
// Script de instalación automática
session_start();

// Configuración inicial
$config = [
    'host' => getenv('BD_HOST') ?: 'localhost',
    'username' => getenv('DB_USER_NAME') ?: 'restaurante',
    'password' => getenv('DB_PASSWORD') ?: 'restaurante_secret',
    'database' => getenv('DB_NAME') ?: 'restaurante_db'
];

$errors = [];
$success = false;

// Procesar formulario de configuración
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $config['host'] = $_POST['host'] ?? 'localhost';
    $config['username'] = $_POST['username'] ?? 'root';
    $config['password'] = $_POST['password'] ?? '';
    $config['database'] = $_POST['database'] ?? 'restaurante_db';
    
    // Probar conexión
    $test_conn = new mysqli($config['host'], $config['username'], $config['password']);
    
    if ($test_conn->connect_error) {
        $errors[] = "Error de conexión: " . $test_conn->connect_error;
    } else {
        // Crear base de datos si no existe
        $sql = "CREATE DATABASE IF NOT EXISTS `{$config['database']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        if (!$test_conn->query($sql)) {
            $errors[] = "Error al crear la base de datos: " . $test_conn->error;
        } else {
            // Seleccionar la base de datos
            $test_conn->select_db($config['database']);
            
            // Leer y ejecutar el archivo SQL
            $sql_file = 'database/restaurante_db.sql';
            if (file_exists($sql_file)) {
                $sql_content = file_get_contents($sql_file);
                
                // Remover la línea CREATE DATABASE y USE
                $sql_content = preg_replace('/CREATE DATABASE.*?;/s', '', $sql_content);
                $sql_content = preg_replace('/USE.*?;/s', '', $sql_content);
                
                // Ejecutar las consultas
                $queries = explode(';', $sql_content);
                foreach ($queries as $query) {
                    $query = trim($query);
                    if (!empty($query)) {
                        if (!$test_conn->query($query)) {
                            $errors[] = "Error al ejecutar consulta: " . $test_conn->error;
                            break;
                        }
                    }
                }
                
                if (empty($errors)) {
                    // Crear archivo de configuración
                    $config_content = "<?php
// Configuración de la base de datos
\$host = '{$config['host']}';
\$dbname = '{$config['database']}';
\$username = '{$config['username']}';
\$password = '{$config['password']}';

// Crear conexión
\$conn = new mysqli(\$host, \$username, \$password, \$dbname);

// Verificar conexión
if (\$conn->connect_error) {
    die(\"Error de conexión: \" . \$conn->connect_error);
}

// Establecer charset
\$conn->set_charset(\"utf8\");
?>";
                    
                    if (file_put_contents('includes/db_connection.php', $config_content)) {
                        $success = true;
                        $_SESSION['install_success'] = true;
                    } else {
                        $errors[] = "Error al crear el archivo de configuración";
                    }
                }
            } else {
                $errors[] = "No se encontró el archivo de base de datos";
            }
        }
        $test_conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalación - Restaurante El Buen Sabor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .install-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            font-weight: bold;
        }
        .step.active {
            background: #007bff;
            color: white;
        }
        .step.completed {
            background: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="install-container p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                        <h1 class="h2">Instalación del Restaurante</h1>
                        <p class="text-muted">Configuración inicial de la aplicación</p>
                    </div>

                    <?php if ($success): ?>
                        <div class="text-center">
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle fa-2x mb-3"></i>
                                <h4>¡Instalación Completada!</h4>
                                <p>La aplicación ha sido instalada exitosamente.</p>
                            </div>
                            <div class="mt-4">
                                <a href="index.php" class="btn btn-primary btn-lg me-3">
                                    <i class="fas fa-home me-2"></i>Ir al Sitio
                                </a>
                                <a href="admin/pedidos.php" class="btn btn-outline-primary btn-lg">
                                    <i class="fas fa-cog me-2"></i>Panel de Administración
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="step-indicator">
                            <div class="step active">1</div>
                            <div class="step">2</div>
                            <div class="step">3</div>
                        </div>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <h5><i class="fas fa-exclamation-triangle me-2"></i>Errores encontrados:</h5>
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST">
                            <h4 class="mb-3">
                                <i class="fas fa-database me-2"></i>Configuración de Base de Datos
                            </h4>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="host" class="form-label">Host</label>
                                    <input type="text" class="form-control" id="host" name="host" 
                                           value="<?php echo htmlspecialchars($config['host']); ?>" required>
                                    <div class="form-text">Generalmente 'localhost'</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="database" class="form-label">Nombre de la Base de Datos</label>
                                    <input type="text" class="form-control" id="database" name="database" 
                                           value="<?php echo htmlspecialchars($config['database']); ?>" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" id="username" name="username" 
                                           value="<?php echo htmlspecialchars($config['username']); ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           value="<?php echo htmlspecialchars($config['password']); ?>">
                                    <div class="form-text">Dejar vacío si no hay contraseña</div>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <h6><i class="fas fa-info-circle me-2"></i>Información importante:</h6>
                                <ul class="mb-0">
                                    <li>Asegúrate de que MySQL esté ejecutándose</li>
                                    <li>El usuario debe tener permisos para crear bases de datos</li>
                                    <li>Si la base de datos ya existe, se usará la existente</li>
                                </ul>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-play me-2"></i>Iniciar Instalación
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 