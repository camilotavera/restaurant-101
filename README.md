# Restaurante El Buen Sabor - Aplicación Web

## Descripción

Aplicación web responsive para un restaurante que permite mostrar los productos gastronómicos (desayunos, almuerzos y cenas), gestionar pedidos de clientes y administrar la información del restaurante.

## Características

### Frontend
- ✅ Diseño responsive con HTML5 y CSS3
- ✅ Framework Bootstrap 5 para componentes UI
- ✅ Iconos Font Awesome
- ✅ Animaciones y transiciones suaves
- ✅ Carrusel de imágenes en "Quienes Somos"

### Backend
- ✅ PHP para lógica de servidor
- ✅ Base de datos MySQL
- ✅ Formularios funcionales para pedidos
- ✅ Panel de administración

### Funcionalidades
- ✅ Página de inicio con hero section
- ✅ Página "Quienes Somos" con carrusel de imágenes
- ✅ Página "Servicios" con cards de menús por categoría
- ✅ Formulario de pedidos con validación
- ✅ Página "Contáctenos" con formulario
- ✅ Panel de administración para gestionar pedidos
- ✅ Base de datos con menús y pedidos de ejemplo

## Estructura del Proyecto

```
restaurante/
├── index.php                 # Página principal
├── quienes-somos.php         # Página Quienes Somos
├── servicios.php             # Página de servicios y pedidos
├── contacto.php              # Página de contacto
├── css/
│   └── style.css            # Estilos personalizados
├── includes/
│   ├── header.php           # Header común
│   ├── footer.php           # Footer común
│   └── db_connection.php    # Conexión a base de datos
├── admin/
│   └── pedidos.php          # Panel de administración
├── database/
│   └── restaurante_db.sql   # Estructura y datos de la BD
└── README.md                # Este archivo
```

## Requisitos del Sistema

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)
- Navegador web moderno

## Instalación

### 1. Configurar el Servidor Web

Asegúrate de tener un servidor web con PHP y MySQL instalados. Puedes usar:
- XAMPP (Windows/Linux/Mac)
- WAMP (Windows)
- MAMP (Mac)
- Servidor local de desarrollo

### 2. Clonar/Descargar el Proyecto

1. Descarga o clona este proyecto en tu carpeta de servidor web
2. Navega a la carpeta del proyecto

### 3. Configurar la Base de Datos

1. Abre phpMyAdmin o tu cliente MySQL preferido
2. Crea una nueva base de datos llamada `restaurante_db`
3. Importa el archivo `database/restaurante_db.sql`
4. Verifica que las tablas se hayan creado correctamente:
   - `menus` - Contiene los menús del restaurante
   - `pedidos` - Contiene los pedidos de los clientes

### 4. Configurar la Conexión a la Base de Datos

Edita el archivo `includes/db_connection.php` y actualiza las credenciales:

```php
$host = 'localhost';        // Host de la base de datos
$dbname = 'restaurante_db'; // Nombre de la base de datos
$username = 'restaurante';         // Usuario de MySQL
$password = 'restaurante_secret';  // Contraseña de MySQL
```

### 5. Acceder a la Aplicación

1. Abre tu navegador web
2. Navega a `http://localhost/restaurante/` (ajusta la ruta según tu configuración)
3. Deberías ver la página principal del restaurante

## Uso de la Aplicación

### Para Clientes

1. **Navegar por el sitio**: Usa el menú de navegación para explorar las diferentes páginas
2. **Ver menús**: En la página "Servicios" puedes ver todos los menús organizados por categoría
3. **Realizar pedido**: 
   - Selecciona un menú haciendo clic en "Seleccionar"
   - Completa el formulario con tus datos
   - Elige el tipo de servicio (restaurante o para llevar)
   - Envía el pedido

### Para Administradores

1. **Acceder al panel**: Navega a `http://localhost/restaurante/admin/pedidos.php`
2. **Ver pedidos**: El panel muestra todos los pedidos con estadísticas
3. **Gestionar estados**: Puedes cambiar el estado de los pedidos (Pendiente → En preparación → Listo → Entregado)

## Base de Datos

### Tabla `menus`
- `id`: Identificador único
- `nombre`: Nombre del plato
- `descripcion`: Descripción detallada
- `precio`: Precio en pesos colombianos
- `categoria`: Desayuno, Almuerzo o Cena
- `imagen`: URL de la imagen del plato
- `disponible`: Si el plato está disponible
- `created_at`: Fecha de creación

### Tabla `pedidos`
- `id`: Identificador único
- `tipo_documento`: Tipo de documento (CC, CE, TI, PP)
- `numero_documento`: Número del documento
- `nombre_completo`: Nombre completo del cliente
- `numero_celular`: Número de teléfono
- `correo_electronico`: Correo electrónico
- `menu_seleccionado`: Menú elegido
- `mesa`: Mesa (opcional)
- `tipo_servicio`: Restaurante o Para llevar
- `fecha_pedido`: Fecha y hora del pedido
- `estado`: Estado del pedido (Pendiente, En preparación, Listo, Entregado)

## Personalización

### Cambiar Información del Restaurante

1. **Logo y nombre**: Edita el archivo `includes/header.php`
2. **Información de contacto**: Modifica `includes/footer.php` y `contacto.php`
3. **Menús**: Agrega, modifica o elimina menús directamente en la base de datos
4. **Colores y estilos**: Personaliza `css/style.css`

### Agregar Nuevos Menús

Puedes agregar nuevos menús directamente en la base de datos:

```sql
INSERT INTO menus (nombre, descripcion, precio, categoria, imagen) 
VALUES ('Nuevo Plato', 'Descripción del plato', 30000, 'Almuerzo', 'url_imagen');
```

## Solución de Problemas

### Error de Conexión a la Base de Datos
- Verifica que MySQL esté ejecutándose
- Confirma las credenciales en `includes/db_connection.php`
- Asegúrate de que la base de datos `restaurante_db` existe

### Páginas no Cargan
- Verifica que PHP esté habilitado en tu servidor
- Confirma que los archivos estén en la carpeta correcta
- Revisa los logs de error del servidor

### Imágenes no se Muestran
- Las imágenes usan URLs de Unsplash, verifica tu conexión a internet
- Para imágenes locales, colócalas en una carpeta `images/` y actualiza las rutas

## Tecnologías Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP 7.4+
- **Base de Datos**: MySQL 5.7+
- **Iconos**: Font Awesome 6
- **Imágenes**: Unsplash (gratuitas)

## Contribución

Para contribuir al proyecto:
1. Haz un fork del repositorio
2. Crea una rama para tu feature
3. Realiza tus cambios
4. Envía un pull request

## Licencia

Este proyecto es de uso educativo y puede ser modificado libremente.

## Contacto

Para soporte o consultas sobre el proyecto, contacta al desarrollador.

---

**Nota**: Esta aplicación está diseñada para fines educativos y demostrativos. Para uso en producción, se recomienda implementar medidas de seguridad adicionales como autenticación de usuarios, validación de datos más robusta y HTTPS. 