<?php
// Incluir archivo de conexión a la base de datos
include '../includes/db_connection.php';

// Procesar cambios de estado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $pedido_id = $_POST['pedido_id'];
    $nuevo_estado = $_POST['nuevo_estado'];
    
    $sql = "UPDATE pedidos SET estado = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nuevo_estado, $pedido_id);
    
    if ($stmt->execute()) {
        $mensaje_exito = "Estado del pedido actualizado exitosamente";
    } else {
        $mensaje_error = "Error al actualizar el estado: " . $conn->error;
    }
    
    $stmt->close();
}

// Obtener todos los pedidos
$sql = "SELECT * FROM pedidos ORDER BY fecha_pedido DESC";
$result = $conn->query($sql);
$pedidos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Restaurante El Buen Sabor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="fas fa-utensils me-2"></i>El Buen Sabor - Admin
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-home me-1"></i>Volver al Sitio
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">
                    <i class="fas fa-clipboard-list me-2"></i>Gestión de Pedidos
                </h1>
                
                <!-- Mensajes de éxito/error -->
                <?php if (isset($mensaje_exito)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?php echo $mensaje_exito; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($mensaje_error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i><?php echo $mensaje_error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Estadísticas -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Pedidos</h5>
                                <h2 class="card-text"><?php echo count($pedidos); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Pendientes</h5>
                                <h2 class="card-text"><?php echo count(array_filter($pedidos, function($p) { return $p['estado'] == 'Pendiente'; })); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">En Preparación</h5>
                                <h2 class="card-text"><?php echo count(array_filter($pedidos, function($p) { return $p['estado'] == 'En preparación'; })); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Entregados</h5>
                                <h2 class="card-text"><?php echo count(array_filter($pedidos, function($p) { return $p['estado'] == 'Entregado'; })); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Pedidos -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-list me-2"></i>Lista de Pedidos
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Documento</th>
                                        <th>Contacto</th>
                                        <th>Menú</th>
                                        <th>Mesa</th>
                                        <th>Tipo Servicio</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pedidos as $pedido): ?>
                                        <tr>
                                            <td>#<?php echo $pedido['id']; ?></td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($pedido['nombre_completo']); ?></strong>
                                            </td>
                                            <td>
                                                <?php echo $pedido['tipo_documento']; ?>: 
                                                <?php echo htmlspecialchars($pedido['numero_documento']); ?>
                                            </td>
                                            <td>
                                                <div><i class="fas fa-phone me-1"></i><?php echo htmlspecialchars($pedido['numero_celular']); ?></div>
                                                <div><i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($pedido['correo_electronico']); ?></div>
                                            </td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($pedido['menu_seleccionado']); ?></strong>
                                            </td>
                                            <td>
                                                <?php if (!empty($pedido['mesa'])): ?>
                                                    <span class="badge bg-secondary"><?php echo htmlspecialchars($pedido['mesa']); ?></span>
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($pedido['tipo_servicio'] == 'Restaurante'): ?>
                                                    <span class="badge bg-primary">
                                                        <i class="fas fa-utensils me-1"></i>Restaurante
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-info">
                                                        <i class="fas fa-shopping-bag me-1"></i>Para llevar
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])); ?>
                                            </td>
                                            <td>
                                                <?php
                                                $estado_colors = [
                                                    'Pendiente' => 'warning',
                                                    'En preparación' => 'info',
                                                    'Listo' => 'success',
                                                    'Entregado' => 'secondary'
                                                ];
                                                $color = $estado_colors[$pedido['estado']] ?? 'secondary';
                                                ?>
                                                <span class="badge bg-<?php echo $color; ?>">
                                                    <?php echo $pedido['estado']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#updateModal-<?php echo $pedido['id']; ?>">
                                                    <i class="fas fa-edit"></i> Cambiar Estado
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <!-- Modal para cambiar estado -->
                                        <div class="modal fade" id="updateModal-<?php echo $pedido['id']; ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Cambiar Estado del Pedido #<?php echo $pedido['id']; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form method="POST">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="nuevo_estado" class="form-label">Nuevo Estado</label>
                                                                <select class="form-select" id="nuevo_estado" name="nuevo_estado" required>
                                                                    <option value="Pendiente" <?php echo $pedido['estado'] == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                                                    <option value="En preparación" <?php echo $pedido['estado'] == 'En preparación' ? 'selected' : ''; ?>>En preparación</option>
                                                                    <option value="Listo" <?php echo $pedido['estado'] == 'Listo' ? 'selected' : ''; ?>>Listo</option>
                                                                    <option value="Entregado" <?php echo $pedido['estado'] == 'Entregado' ? 'selected' : ''; ?>>Entregado</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" name="update_status" class="btn btn-primary">
                                                                <i class="fas fa-save me-1"></i>Actualizar
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <?php if (empty($pedidos)): ?>
                            <div class="text-center py-5">
                                <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No hay pedidos registrados</h5>
                                <p class="text-muted">Los pedidos aparecerán aquí cuando los clientes realicen sus órdenes.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 