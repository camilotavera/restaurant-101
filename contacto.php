<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold">Contáctenos</h1>
                <p class="lead text-muted">Estamos aquí para atenderte y resolver cualquier consulta</p>
            </div>
        </div>
    </div>
</section>

<!-- Información de Contacto y Formulario -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Información de Contacto -->
            <div class="col-lg-4 mb-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">
                            <i class="fas fa-info-circle text-primary me-2"></i>Información de Contacto
                        </h3>
                        
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Dirección</h6>
                                <p class="mb-0">Calle 123 # 45-67<br>Centro Comercial Plaza Mayor<br>Bogotá, Colombia</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-phone text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Teléfono</h6>
                                <p class="mb-0">(123) 456-7890<br>(123) 456-7891</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-envelope text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Correo Electrónico</h6>
                                <p class="mb-0">info@elbuensabor.com<br>reservas@elbuensabor.com</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Horarios</h6>
                                <p class="mb-0">
                                    <strong>Lunes a Viernes:</strong><br>
                                    7:00 AM - 10:00 PM<br>
                                    <strong>Sábados y Domingos:</strong><br>
                                    8:00 AM - 11:00 PM
                                </p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-wifi text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Redes Sociales</h6>
                                <div class="d-flex gap-2">
                                    <a href="#" class="text-primary"><i class="fab fa-facebook fa-2x"></i></a>
                                    <a href="#" class="text-primary"><i class="fab fa-instagram fa-2x"></i></a>
                                    <a href="#" class="text-primary"><i class="fab fa-twitter fa-2x"></i></a>
                                    <a href="#" class="text-primary"><i class="fab fa-youtube fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulario de Contacto -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">
                            <i class="fas fa-envelope-open text-primary me-2"></i>Envíanos un Mensaje
                        </h3>
                        
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre Completo *</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Correo Electrónico *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="asunto" class="form-label">Asunto *</label>
                                    <select class="form-select" id="asunto" name="asunto" required>
                                        <option value="">Seleccione un asunto...</option>
                                        <option value="Reserva">Reserva de Mesa</option>
                                        <option value="Consulta">Consulta General</option>
                                        <option value="Sugerencia">Sugerencia</option>
                                        <option value="Reclamo">Reclamo</option>
                                        <option value="Eventos">Eventos Especiales</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="mensaje" class="form-label">Mensaje *</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Suscribirme al boletín de noticias y ofertas especiales
                                    </label>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Enviar Mensaje
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-4">
                    <i class="fas fa-map-marked-alt text-primary me-2"></i>Nuestra Ubicación
                </h3>
                <div class="ratio ratio-21x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.789123456789!2d-74.0817!3d4.7110!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwNDInMzkuNiJOIDc0wrAwNCc1NC4xIlc!5e0!3m2!1ses!2sco!4v1234567890" 
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Preguntas Frecuentes -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h3 class="text-center mb-5">
                    <i class="fas fa-question-circle text-primary me-2"></i>Preguntas Frecuentes
                </h3>
                
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                ¿Hacen reservas para eventos especiales?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sí, ofrecemos servicios especiales para eventos como cumpleaños, aniversarios, 
                                reuniones de empresa y otros eventos especiales. Contáctanos para más información.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                ¿Tienen opciones vegetarianas en el menú?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sí, contamos con una variedad de opciones vegetarianas y veganas en nuestro menú. 
                                Nuestros chefs están preparados para adaptar platos según tus preferencias dietéticas.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                ¿Aceptan tarjetas de crédito y débito?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sí, aceptamos todas las tarjetas de crédito y débito principales, así como pagos 
                                en efectivo y transferencias bancarias.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                ¿Tienen estacionamiento disponible?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sí, contamos con estacionamiento gratuito para nuestros clientes en el centro 
                                comercial donde estamos ubicados.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?> 