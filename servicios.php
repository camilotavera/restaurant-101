<?php
// Set proper content type and encoding
header('Content-Type: text/html; charset=UTF-8');

// Incluir archivo de conexión a la base de datos
include 'includes/db_connection.php';

// Procesar formulario de pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_order'])) {
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombre_completo = $_POST['nombre_completo'];
    $numero_celular = $_POST['numero_celular'];
    $correo_electronico = $_POST['correo_electronico'];
    $menu_seleccionado = $_POST['menu_seleccionado'];
    $mesa = $_POST['mesa'];
    $tipo_servicio = $_POST['tipo_servicio'];
    
    $sql = "INSERT INTO pedidos (tipo_documento, numero_documento, nombre_completo, numero_celular, correo_electronico, menu_seleccionado, mesa, tipo_servicio, fecha_pedido) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $tipo_documento, $numero_documento, $nombre_completo, $numero_celular, $correo_electronico, $menu_seleccionado, $mesa, $tipo_servicio);
    
    if ($stmt->execute()) {
        $mensaje_exito = "¡Pedido registrado exitosamente!";
    } else {
        $mensaje_error = "Error al registrar el pedido: " . $conn->error;
    }
    
    $stmt->close();
}

// Obtener menús de la base de datos
$sql_menus = "SELECT * FROM menus ORDER BY categoria, nombre";
$result_menus = $conn->query($sql_menus);
$menus = [];
if ($result_menus->num_rows > 0) {
    while($row = $result_menus->fetch_assoc()) {
        $menus[] = $row;
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold">Nuestros Servicios</h1>
                <p class="lead text-muted">Explora nuestra deliciosa carta y realiza tu pedido</p>
            </div>
        </div>
    </div>
</section>

<!-- Mensajes de éxito/error -->
<?php if (isset($mensaje_exito)): ?>
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?php echo $mensaje_exito; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($mensaje_error)): ?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i><?php echo $mensaje_error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
<?php endif; ?>

<!-- Menús por Categoría -->
<section class="py-5">
    <div class="container">
        <!-- Desayunos -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-center mb-4">
                    <i class="fas fa-sun text-warning me-2"></i>Desayunos
                </h2>
            </div>
            <?php foreach ($menus as $menu): ?>
                <?php if ($menu['categoria'] == 'Desayuno'): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card menu-card h-100">
                            <img src="<?php echo $menu['imagen']; ?>" class="card-img-top" alt="<?php echo $menu['nombre']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $menu['nombre']; ?></h5>
                                <p class="card-text"><?php echo $menu['descripcion']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">$<?php echo number_format($menu['precio'], 0, ',', '.'); ?></span>
                                    <button class="btn btn-primary btn-sm" onclick="seleccionarMenu('<?php echo $menu['nombre']; ?>')">
                                        Seleccionar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Almuerzos -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-center mb-4">
                    <i class="fas fa-cloud-sun text-info me-2"></i>Almuerzos
                </h2>
            </div>
            <?php foreach ($menus as $menu): ?>
                <?php if ($menu['categoria'] == 'Almuerzo'): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card menu-card h-100">
                            <img src="<?php echo $menu['imagen']; ?>" class="card-img-top" alt="<?php echo $menu['nombre']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $menu['nombre']; ?></h5>
                                <p class="card-text"><?php echo $menu['descripcion']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">$<?php echo number_format($menu['precio'], 0, ',', '.'); ?></span>
                                    <button class="btn btn-primary btn-sm" onclick="seleccionarMenu('<?php echo $menu['nombre']; ?>')">
                                        Seleccionar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Cenas -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-center mb-4">
                    <i class="fas fa-moon text-primary me-2"></i>Cenas
                </h2>
            </div>
            <?php foreach ($menus as $menu): ?>
                <?php if ($menu['categoria'] == 'Cena'): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card menu-card h-100">
                            <img src="<?php echo $menu['imagen']; ?>" class="card-img-top" alt="<?php echo $menu['nombre']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $menu['nombre']; ?></h5>
                                <p class="card-text"><?php echo $menu['descripcion']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">$<?php echo number_format($menu['precio'], 0, ',', '.'); ?></span>
                                    <button class="btn btn-primary btn-sm" onclick="seleccionarMenu('<?php echo $menu['nombre']; ?>')">
                                        Seleccionar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Formulario de Pedido -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="order-form">
                    <h3 class="text-center mb-4">
                        <i class="fas fa-clipboard-list me-2"></i>Realizar Pedido
                    </h3>
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tipo_documento" class="form-label">Tipo de Documento *</label>
                                <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                    <option value="">Seleccione...</option>
                                    <option value="CC">Cédula de Ciudadanía</option>
                                    <option value="CE">Cédula de Extranjería</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="PP">Pasaporte</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="numero_documento" class="form-label">Número de Documento *</label>
                                <input type="text" class="form-control" id="numero_documento" name="numero_documento" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre_completo" class="form-label">Nombre Completo *</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="numero_celular" class="form-label">Número de Celular *</label>
                                <input type="tel" class="form-control" id="numero_celular" name="numero_celular" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="correo_electronico" class="form-label">Correo Electrónico *</label>
                            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="menu_seleccionado" class="form-label">Menú Seleccionado *</label>
                                <select class="form-select" id="menu_seleccionado" name="menu_seleccionado" required>
                                    <option value="">Seleccione un menú...</option>
                                    <?php foreach ($menus as $menu): ?>
                                        <option value="<?php echo $menu['nombre']; ?>">
                                            <?php echo $menu['nombre']; ?> - $<?php echo number_format($menu['precio'], 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mesa" class="form-label">Mesa (si aplica)</label>
                                <input type="text" class="form-control" id="mesa" name="mesa" placeholder="Ej: Mesa 5">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="tipo_servicio" class="form-label">Tipo de Servicio *</label>
                            <select class="form-select" id="tipo_servicio" name="tipo_servicio" required>
                                <option value="">Seleccione...</option>
                                <option value="Restaurante">Consumir en el restaurante</option>
                                <option value="Para llevar">Para llevar</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit_order" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Realizar Pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function seleccionarMenu(nombreMenu) {
    document.getElementById('menu_seleccionado').value = nombreMenu;
    document.getElementById('menu_seleccionado').scrollIntoView({ behavior: 'smooth' });
}
</script>

<?php include 'includes/footer.php'; ?> 