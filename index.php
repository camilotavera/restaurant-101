<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante El Buen Sabor</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-utensils me-2"></i>El Buen Sabor
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quienes-somos.php">Quienes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contáctenos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-white fw-bold mb-4">
                            Los Mejores Sabores de la Ciudad
                        </h1>
                        <p class="lead text-white mb-4">
                            Disfruta de nuestra exquisita gastronomía con los mejores ingredientes 
                            frescos y preparados con amor por nuestros chefs expertos.
                        </p>
                        <a href="servicios.php" class="btn btn-primary btn-lg me-3">
                            Ver Menús
                        </a>
                        <a href="contacto.php" class="btn btn-outline-light btn-lg">
                            Reservar Mesa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Especialidades -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold">Nuestras Especialidades</h2>
                    <p class="lead text-muted">Descubre los platos más populares de nuestro restaurante</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-sun text-warning display-4 mb-3"></i>
                            <h4 class="card-title">Desayunos</h4>
                            <p class="card-text">Comienza tu día con energía con nuestros deliciosos desayunos preparados con ingredientes frescos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-cloud-sun text-info display-4 mb-3"></i>
                            <h4 class="card-title">Almuerzos</h4>
                            <p class="card-text">Platos principales que combinan tradición e innovación para una experiencia gastronómica única.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-moon text-primary display-4 mb-3"></i>
                            <h4 class="card-title">Cenas</h4>
                            <p class="card-text">Cenas elegantes y románticas perfectas para compartir con familia y amigos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-utensils me-2"></i>El Buen Sabor</h5>
                    <p class="mb-0">Los mejores sabores de la ciudad</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <i class="fas fa-phone me-2"></i>(123) 456-7890<br>
                        <i class="fas fa-envelope me-2"></i>info@elbuensabor.com
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 