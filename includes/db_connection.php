<?php
// Configuración de la base de datos
$host = getenv('DB_HOST') ?: 'mysql_db';
$dbname = getenv('DB_NAME') ?: 'restaurante_db';
$username = getenv('DB_USER_NAME') ?: 'restaurante';
$password = getenv('DB_PASSWORD') ?: 'restaurante_secret';

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer charset
$conn->set_charset("utf8");
?> 
