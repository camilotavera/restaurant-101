<?php
// Configuración de la aplicación
define('APP_NAME', 'Restaurante El Buen Sabor');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/restaurante');

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'restaurante_db');
define('DB_USER', 'restaurante');
define('DB_PASS', '');

// Configuración de contacto
define('RESTAURANT_PHONE', '(123) 456-7890');
define('RESTAURANT_EMAIL', 'info@elbuensabor.com');
define('RESTAURANT_ADDRESS', 'Calle 123 # 45-67, Centro Comercial Plaza Mayor, Bogotá, Colombia');

// Configuración de horarios
define('RESTAURANT_HOURS_WEEKDAY', '7:00 AM - 10:00 PM');
define('RESTAURANT_HOURS_WEEKEND', '8:00 AM - 11:00 PM');

// Configuración de redes sociales
define('FACEBOOK_URL', '#');
define('INSTAGRAM_URL', '#');
define('TWITTER_URL', '#');
define('YOUTUBE_URL', '#');

// Configuración de la aplicación
define('DEBUG_MODE', true);
define('TIMEZONE', 'America/Bogota');

// Establecer zona horaria
date_default_timezone_set(TIMEZONE);

// Función para obtener la URL base
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['SCRIPT_NAME']);
    return $protocol . '://' . $host . $path;
}

// Función para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para sanitizar entrada
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Función para formatear precio
function formatPrice($price) {
    return '$' . number_format($price, 0, ',', '.');
}

// Función para obtener el estado actual de la página
function getCurrentPage() {
    $current_file = basename($_SERVER['PHP_SELF']);
    return str_replace('.php', '', $current_file);
}

// Función para verificar si la página está activa
function isActivePage($page) {
    return getCurrentPage() === $page;
}
?> 