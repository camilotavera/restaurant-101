-- Crear base de datos
CREATE DATABASE IF NOT EXISTS restaurante_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE restaurante_db;

-- Tabla de menús
CREATE TABLE IF NOT EXISTS menus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    categoria ENUM('Desayuno', 'Almuerzo', 'Cena') NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    disponible BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_documento ENUM('CC', 'CE', 'TI', 'PP') NOT NULL,
    numero_documento VARCHAR(20) NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    numero_celular VARCHAR(15) NOT NULL,
    correo_electronico VARCHAR(100) NOT NULL,
    menu_seleccionado VARCHAR(100) NOT NULL,
    mesa VARCHAR(20),
    tipo_servicio ENUM('Restaurante', 'Para llevar') NOT NULL,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('Pendiente', 'En preparación', 'Listo', 'Entregado') DEFAULT 'Pendiente'
);

-- Insertar datos de ejemplo para menús

-- Desayunos
INSERT INTO menus (nombre, descripcion, precio, categoria, imagen) VALUES
('Huevos Benedictinos', 'Huevos pochados sobre pan tostado con salsa holandesa, acompañados de papas hash y vegetales frescos', 25000, 'Desayuno', 'https://images.unsplash.com/photo-1608039829572-78524f79c4c7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Pancakes de Avena', 'Pancakes esponjosos de avena con miel, frutas frescas y mantequilla casera', 18000, 'Desayuno', 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Tostadas Francesas', 'Pan brioche empapado en huevo y leche, dorado a la perfección con canela y azúcar glass', 22000, 'Desayuno', 'https://images.unsplash.com/photo-1484723091739-30a097e8f929?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Bowl de Acai', 'Bowl nutritivo de acai con granola casera, frutas tropicales y semillas de chía', 28000, 'Desayuno', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Omelette Gourmet', 'Omelette relleno de champiñones, queso manchego y hierbas frescas con pan artesanal', 24000, 'Desayuno', 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');

-- Almuerzos
INSERT INTO menus (nombre, descripcion, precio, categoria, imagen) VALUES
('Pasta Carbonara', 'Pasta fresca con salsa cremosa de huevo, queso parmesano, panceta y pimienta negra', 32000, 'Almuerzo', 'https://images.unsplash.com/photo-1621996346565-e3dbc353d2e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Pechuga a la Plancha', 'Pechuga de pollo marinada en hierbas, servida con arroz pilaf y vegetales al vapor', 28000, 'Almuerzo', 'https://images.unsplash.com/photo-1604503468506-a8da13d82791?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Ensalada César', 'Lechuga romana, crutones caseros, queso parmesano y aderezo César tradicional', 22000, 'Almuerzo', 'https://images.unsplash.com/photo-1546793665-c74683f339c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Salmón a la Parrilla', 'Filete de salmón fresco a la parrilla con salsa de limón y hierbas, acompañado de quinoa', 45000, 'Almuerzo', 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Sopa de Tomate', 'Sopa cremosa de tomates asados con albahaca fresca y crutones artesanal', 18000, 'Almuerzo', 'https://images.unsplash.com/photo-1547592166-23ac45744acd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');

-- Cenas
INSERT INTO menus (nombre, descripcion, precio, categoria, imagen) VALUES
('Filete Mignon', 'Tierno filete de res con salsa de vino tinto, puré de papas y vegetales asados', 55000, 'Cena', 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Risotto de Champiñones', 'Risotto cremoso con champiñones silvestres, queso parmesano y trufa negra', 38000, 'Cena', 'https://images.unsplash.com/photo-1476124369491-e7addf5db371?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Langosta a la Parrilla', 'Langosta fresca a la parrilla con mantequilla de limón y hierbas, servida con arroz salvaje', 65000, 'Cena', 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Pasta al Pesto', 'Pasta fresca con pesto casero de albahaca, piñones y queso parmesano', 30000, 'Cena', 'https://images.unsplash.com/photo-1621996346565-e3dbc353d2e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'),
('Ensalada de Quinoa', 'Ensalada nutritiva de quinoa con aguacate, tomates cherry y aderezo de limón', 25000, 'Cena', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');

-- Insertar algunos pedidos de ejemplo
INSERT INTO pedidos (tipo_documento, numero_documento, nombre_completo, numero_celular, correo_electronico, menu_seleccionado, mesa, tipo_servicio, estado) VALUES
('CC', '12345678', 'Juan Pérez', '3001234567', 'juan.perez@email.com', 'Huevos Benedictinos', 'Mesa 5', 'Restaurante', 'Entregado'),
('CE', '87654321', 'María González', '3007654321', 'maria.gonzalez@email.com', 'Pasta Carbonara', 'Mesa 3', 'Restaurante', 'En preparación'),
('CC', '11223344', 'Carlos López', '3001122334', 'carlos.lopez@email.com', 'Filete Mignon', '', 'Para llevar', 'Pendiente'),
('TI', '55667788', 'Ana Rodríguez', '3005566778', 'ana.rodriguez@email.com', 'Salmón a la Parrilla', 'Mesa 8', 'Restaurante', 'Listo'); 