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

### Opción 1: Usando Docker (Recomendado)

#### Prerrequisitos para macOS
- **Docker Desktop para Mac**: Descarga e instala desde [docker.com](https://www.docker.com/products/docker-desktop)
- **Git** (opcional, para clonar el repositorio): Instala con Homebrew: `brew install git`
- **Homebrew** (recomendado): Para gestionar paquetes en macOS

#### Instalación de Docker Desktop en macOS

1. **Descargar Docker Desktop**
   - Ve a [docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)
   - Haz clic en "Download for Mac"
   - Selecciona la versión apropiada:
     - **Apple Silicon (M1/M2)**: Docker Desktop for Mac with Apple Silicon
     - **Intel Chip**: Docker Desktop for Mac with Intel Chip

2. **Instalar Docker Desktop**
   - Abre el archivo `.dmg` descargado
   - Arrastra Docker.app a la carpeta Applications
   - Abre Docker Desktop desde Applications
   - Sigue las instrucciones de instalación
   - Inicia sesión con tu cuenta de Docker (opcional, pero recomendado)

3. **Verificar la instalación**
   ```bash
   # Abre Terminal y ejecuta:
   docker --version
   docker-compose --version
   ```

#### Pasos para ejecutar con Docker en macOS

1. **Clonar/Descargar el Proyecto**
   ```bash
   git clone <url-del-repositorio>
   cd restaurant-101
   ```

2. **Configurar Variables de Entorno (Opcional)**
   
   Puedes crear un archivo `.env` en la raíz del proyecto:
   ```bash
   # En Terminal, desde la carpeta del proyecto:
   touch .env
   ```
   
   Luego edita el archivo `.env` con tu editor preferido:
   ```env
   BD_HOST=mysql_db
   DB_NAME=restaurante_db
   DB_USER_NAME=restaurante
   DB_PASSWORD=restaurante_secret
   ```

3. **Ejecutar con Docker Compose**
   ```bash
   # Construir y levantar los contenedores
   docker-compose up -d
   
   # Para ver los logs en tiempo real
   docker-compose logs -f
   ```

4. **Acceder a la Aplicación**
   - Abre Safari, Chrome, o Firefox
   - Ve a `http://localhost`
   - La aplicación estará disponible en el puerto 80

5. **Comandos útiles de Docker para macOS**
   ```bash
   # Detener los contenedores
   docker compose down
   
   # Reconstruir los contenedores (si hay cambios)
   docker compose build --no-cache
   docker compose up -d
   
   # Ver logs de un servicio específico
   docker compose logs nginx
   docker compose logs php
   docker compose logs db
   
   # Acceder al contenedor de la base de datos
   docker exec -it mysql_db mysql -u root -proot-secret
   
   # Ver contenedores en ejecución
   docker ps
   
   # Ver uso de recursos de Docker
   docker stats
   ```

#### Solución de problemas comunes en macOS

**Docker Desktop no inicia:**
- Verifica que tienes permisos de administrador
- Reinicia Docker Desktop desde Applications
- Si persiste, reinicia tu Mac

**Puerto 80 ocupado:**
```bash
# Verificar qué está usando el puerto 80
sudo lsof -i :80

# Si es necesario, cambiar el puerto en docker-compose.yml
# Cambia "80:80" por "8080:80" y accede a http://localhost:8080
```

**Problemas de permisos:**
```bash
# Si tienes problemas con permisos de archivos
chmod +x docker-compose.yml
```

**Docker Desktop lento:**
- Aumenta la memoria asignada en Docker Desktop > Preferences > Resources
- Recomendado: 4GB RAM mínimo, 8GB preferido

#### Estructura de Contenedores
- **nginx**: Servidor web (puerto 80)
- **php**: Servidor PHP-FPM (puerto 9000)
- **db**: Base de datos MySQL (puerto interno)

---

### Opción 2: Instalación Local Tradicional

#### Prerrequisitos
- Servidor web con PHP y MySQL instalados. Puedes usar:
  - XAMPP (Windows/Linux/Mac)
  - WAMP (Windows)
  - MAMP (Mac)
  - Servidor local de desarrollo

#### Pasos

1. **Clonar/Descargar el Proyecto**
   ```bash
   git clone <url-del-repositorio>
   cd restaurante
   ```

2. **Configurar la Base de Datos**
   - Abre phpMyAdmin o tu cliente MySQL preferido
   - Crea una nueva base de datos llamada `restaurante_db`
   - Importa el archivo `database/restaurante_db.sql`
   - Verifica que las tablas se hayan creado correctamente:
     - `menus` - Contiene los menús del restaurante
     - `pedidos` - Contiene los pedidos de los clientes

3. **Configurar la Conexión a la Base de Datos**
   
   Edita el archivo `includes/db_connection.php` y actualiza las credenciales:
   ```php
   $host = 'localhost' or 'mysql_db' si usas docker;        // Host de la base de datos
   $dbname = 'restaurante_db'; // Nombre de la base de datos
   $username = 'restaurante';         // Usuario de MySQL
   $password = 'restaurante_secret';  // Contraseña de MySQL
   ```

4. **Acceder a la Aplicación**
   - Abre tu navegador web
   - Navega a `http://localhost/restaurante/` (ajusta la ruta según tu configuración)
   - Deberías ver la página principal del restaurante

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