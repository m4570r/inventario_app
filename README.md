# inventario_app

Este proyecto tiene como objetivo desarrollar una aplicación web que permita a la empresa ABC mejorar sus procesos operativos de gestión de inventario en su almacén principal. La aplicación proporcionará una solución para llevar un registro detallado del inventario en tiempo real, así como el seguimiento de productos desde su llegada al almacén hasta su despacho. La aplicación también incluirá un sistema de control de acceso con diferentes niveles de permisos para empleados. Esto permitirá una gestión más eficiente de los pedidos y un mejor control de inventario, lo que en última instancia mejorará la eficiencia operativa de la empresa ABC

## Requisitos Previos

Asegúrate de tener instalados los siguientes requisitos previos:

- [XAMPP](https://www.apachefriends.org/index.html): Para ejecutar el servidor web y la base de datos localmente.

## Instalación y Uso

1. Clona este repositorio en tu máquina local.

2. Coloca los archivos de tu proyecto en el directorio `htdocs` de tu instalación de XAMPP.

3. Inicia los servicios de Apache y MySQL en XAMPP.

4. Abre tu navegador web y accede a `http://localhost/tu-proyecto` para usar la aplicación.

## Estructura de Directorios

- `htdocs/` : Directorio raíz de XAMPP donde se deben colocar los archivos de tu proyecto.
- `tu-proyecto/` : Directorio de tu proyecto dentro de `htdocs`.


### Estructura de Archivos

- `/config`
  - `config.php`: Archivo de configuración de la base de datos.
  
- `/controllers`
  - `ProductoController.php`: Controlador para la gestión de productos.
  - `UsuarioController.php`: Controlador para la gestión de usuarios.

- `/models`
  - `ProductoModel.php`: Modelo para la gestión de productos.
  - `UsuarioModel.php`: Modelo para la gestión de usuarios.

- `/views`
  - `/productos`
    - `listar.php`: Vista para listar productos.
    - `agregar.php`: Vista para agregar productos.
    - `editar.php`: Vista para editar productos.
  - `/usuarios`
    - `login.php`: Vista para el inicio de sesión.
    - `registro.php`: Vista para el registro de usuarios.

- `/public`
  - `/css`: Carpeta que contiene archivos CSS para el diseño de la aplicación.
    - `style.css`: Archivo CSS para estilos personalizados.
  - `/js`: Carpeta que contiene archivos JavaScript para la interacción en la interfaz de usuario.
    - `script.js`: Archivo JavaScript para funciones interactivas.

- `/templates`
  - `header.php`: Encabezado común de todas las páginas.
  - `footer.php`: Pie de página común de todas las páginas.

- `index.php`: Archivo principal de la aplicación.

### Estructura de la Base de Datos

- Base de datos: `inventario_app`

#### Tablas

1. `usuarios`
   - `id` (INT): Identificador único del usuario.
   - `nombre` (VARCHAR): Nombre del usuario.
   - `email` (VARCHAR): Correo electrónico del usuario.
   - `contrasena` (VARCHAR): Contraseña del usuario (se debe almacenar de manera segura, como un hash).
   - `nivel_permisos` (ENUM): Nivel de permisos del usuario ('admin' o 'empleado').
   - `fecha_registro` (TIMESTAMP): Fecha y hora de registro del usuario.

2. `productos`
   - `id` (INT): Identificador único del producto.
   - `nombre_producto` (VARCHAR): Nombre del producto.
   - `cantidad` (INT): Cantidad de productos disponibles.
   - `ubicacion` (VARCHAR): Ubicación del producto en el almacén.
   - `id_usuario` (INT): Identificador del usuario que registró el producto.
   - `fecha_ingreso` (TIMESTAMP): Fecha y hora de ingreso del producto.
   - `fecha_despacho` (TIMESTAMP): Fecha y hora de despacho del producto (puede ser nulo si no se ha despachado).

3. `tokens`
   - `id` (INT): Identificador único del token.
   - `id_usuario` (INT): Identificador del usuario asociado al token.
   - `token` (VARCHAR): Token de autenticación (Bearer Token).
   - `fecha_expiracion` (TIMESTAMP): Fecha y hora de expiración del token.

### Estructura del Programa

Este programa es una aplicación web de gestión de inventario para la empresa ABC. Utiliza PHP puro sin frameworks y se ejecuta en un servidor local XAMPP. A continuación, se describe brevemente la funcionalidad principal:

- **Usuarios**: Los usuarios pueden registrarse e iniciar sesión en la aplicación. Se distingue entre administradores y empleados, cada uno con diferentes niveles de permisos.

- **Productos**: Los usuarios pueden agregar, editar, eliminar y listar productos. Cada producto tiene un nombre, cantidad, ubicación y registro de fechas de ingreso y despacho.

- **Tokens**: Se utiliza un sistema de tokens de autenticación (Bearer Tokens) para el inicio de sesión y la gestión de sesiones de usuario.

La estructura de archivos sigue una división clara entre controladores, modelos, vistas y archivos públicos. Además, se proporciona un archivo de configuración para la base de datos. Los archivos CSS y JavaScript se encuentran en la carpeta `public` para el diseño y la interacción de la interfaz de usuario.

Para ejecutar la aplicación, sigue las instrucciones de instalación y configuración en el archivo `README.md`. Asegúrate de tener XAMPP instalado y configurado antes de ejecutar la aplicación.

## Contribuciones

Si deseas contribuir a este proyecto, puedes hacer un fork del repositorio, realizar tus cambios y crear un pull request.

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.
