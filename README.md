# Labburger

Labburger consiste en una página web sobre una hamburgueseria que permite tanto a clientes como administradores el uso de la misma con una finalidad distinta. Para los clientes se les ofrece funciones típicas como realizar un pedido, reservar una mesa o visitar la pagina de inicio mediante una interfaz moderna y dinámica. Por otro lado, para el buen mantenimiento de la aplicación, a los administradores se les permite gestionar toda la página en general.

## Tecnologías y herramientas utilizadas

- **Laravel 10** - Framework principal de backend y lógica de negocio.
- **PHP 8.1+** - Lenguaje de programación para el backend.
- **MySQL / MariaDB** - Sistema de gestión de base de datos relacional.
- **Tailwind CSS** - Framework CSS para el diseño responsive y personalizado.
- **JavaScript (ES6)** - Funcionalidades de interactividad en el frontend.
- **GSAP** - Librería de animación avanzada para efectos visuales.
- **Composer** - Gestor de dependencias de PHP.
- **NPM** - Gestor de dependencias de Node.js.
- **Laragon** - Entorno de desarrollo local.
- **phpMyAdmin** - Gestión visual de la base de datos.
- **Visual Studio Code** - Editor de código.
- **GitHub** - Control de versiones y alojamiento del código fuente.

## Funcionalidades principales

### Área pública:
- Visualización del menú de productos.
- Sistema de reservas de mesas con calendario interactivo.
- Carrito de compra y sistema de pedidos online.
- Registro e inicio de sesión de usuarios.

### Área de usuario registrado:
- Consulta de pedidos realizados.
- Consulta de reservas realizadas.
- Creación de la hamburguesa del mes.
- Creación de reseñas.
- Edición de datos personales desde el perfil.

### Área de administrador:
- Gestión completa de la carta de productos (añadir, editar, eliminar).
- Gestión de pedidos: visualización y actualización de estados.
- Gestión de reservas.
- Administración de usuarios.

## Instalación del proyecto

### Requisitos previos

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Node.js y NPM

### Pasos de instalación

1. Clonar el repositorio:

```bash
git clone https://github.com/usuario/labburger.git
```
2. Acceder al directorio del proyecto:
```bash
cd labburger
```
3. Instalar las dependencias de PHP:
```bash
composer install
```
4. Instalar las dependencias de JavaScript:
```bash
npm install
npm run dev
```
5. Copiar el archivo de entorno y generar la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```
6. Configurar el archivo .env con los datos de conexión de la base de datos.
7. Ejecutar las migraciones de la base de datos:
```bash
php artisan migrate
```
8. Iniciar el servidor de desarrollo:
```bash
php artisan serve
```

## Autor del Proyecto
Alumno: Marlon Daniel Torres Sangacha
