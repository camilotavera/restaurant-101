<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold">Quienes Somos</h1>
                <p class="lead text-muted">Conoce nuestra historia y pasión por la gastronomía</p>
            </div>
        </div>
    </div>
</section>

<!-- Carrusel de Imágenes -->
<section class="py-5">
    <div class="container">
        <div id="restaurantCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#restaurantCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#restaurantCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#restaurantCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#restaurantCarousel" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="Restaurante">
                    <div class="carousel-caption">
                        <h3>Nuestro Restaurante</h3>
                        <p>Un espacio acogedor donde la tradición se encuentra con la innovación</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&auto=format&fit=crop&w=2074&q=80" class="d-block w-100" alt="Chef">
                    <div class="carousel-caption">
                        <h3>Nuestros Chefs</h3>
                        <p>Expertos culinarios apasionados por crear experiencias gastronómicas únicas</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="d-block w-100" alt="Platos">
                    <div class="carousel-caption">
                        <h3>Nuestros Platos</h3>
                        <p>Cada plato es una obra de arte creada con ingredientes frescos y técnicas tradicionales</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Ambiente">
                    <div class="carousel-caption">
                        <h3>Nuestro Ambiente</h3>
                        <p>Un lugar perfecto para celebrar momentos especiales con familia y amigos</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#restaurantCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#restaurantCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
</section>

<!-- Historia del Restaurante -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">Nuestra Historia</h2>
                <p class="lead mb-4">
                    El Buen Sabor nació en 1995 con la visión de ofrecer la mejor experiencia gastronómica 
                    de la ciudad. Fundado por la familia Martínez, nuestro restaurante ha sido testigo de 
                    innumerables celebraciones, reuniones familiares y momentos especiales.
                </p>
                <p class="mb-4">
                    Durante más de 25 años, hemos mantenido viva la tradición culinaria de nuestra región, 
                    combinándola con técnicas modernas y ingredientes de la más alta calidad. Cada plato 
                    que servimos cuenta una historia, cada sabor evoca un recuerdo.
                </p>
                <p class="mb-4">
                    Nuestro equipo de chefs expertos trabaja incansablemente para crear experiencias 
                    gastronómicas únicas que deleiten todos los sentidos. Desde nuestros desayunos 
                    tradicionales hasta nuestras cenas gourmet, cada bocado es una celebración del buen gusto.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                     class="img-fluid rounded shadow" alt="Historia del restaurante">
            </div>
        </div>
    </div>
</section>

<!-- Valores -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold">Nuestros Valores</h2>
                <p class="lead text-muted">Los principios que guían nuestro trabajo diario</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-heart text-danger display-4 mb-3"></i>
                        <h4 class="card-title">Pasión</h4>
                        <p class="card-text">Cocinamos con amor y dedicación, poniendo nuestro corazón en cada plato que preparamos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-leaf text-success display-4 mb-3"></i>
                        <h4 class="card-title">Calidad</h4>
                        <p class="card-text">Utilizamos solo los mejores ingredientes frescos y de temporada para garantizar la excelencia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-users text-primary display-4 mb-3"></i>
                        <h4 class="card-title">Familia</h4>
                        <p class="card-text">Tratamos a cada cliente como parte de nuestra familia, creando un ambiente cálido y acogedor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Equipo -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold">Nuestro Equipo</h2>
                <p class="lead text-muted">Conoce a las personas que hacen posible la magia culinaria</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Chef Principal">
                    <div class="card-body">
                        <h5 class="card-title">Chef Carlos Martínez</h5>
                        <p class="card-text text-muted">Chef Principal</p>
                        <p class="card-text small">Más de 20 años de experiencia en gastronomía internacional</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <img src="https://images.unsplash.com/photo-1592861956120-e524fc739696?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Chef Pastelera">
                    <div class="card-body">
                        <h5 class="card-title">Chef Ana Rodríguez</h5>
                        <p class="card-text text-muted">Chef Pastelera</p>
                        <p class="card-text small">Especialista en postres y panadería artesanal</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Sous Chef">
                    <div class="card-body">
                        <h5 class="card-title">Chef Miguel López</h5>
                        <p class="card-text text-muted">Sous Chef</p>
                        <p class="card-text small">Experto en cocina mediterránea y fusión</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm text-center">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         class="card-img-top" alt="Gerente">
                    <div class="card-body">
                        <h5 class="card-title">María González</h5>
                        <p class="card-text text-muted">Gerente</p>
                        <p class="card-text small">Asegura que cada visita sea una experiencia memorable</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?> 