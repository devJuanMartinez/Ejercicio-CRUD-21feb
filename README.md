<h1 align="center">
  <img src="https://img.shields.io/badge/Made%20With-Laravel-blue?logo=laravel&style=for-the-badge" alt="Made with Laravel" />
  <br />
  <b>App utilizando CRUD</b>
  <br />
  <sub>App construida con Laravel</sub>
</h1>

<p align="center">
  <img src="https://img.shields.io/github/languages/top/tu-usuario/nombre-del-repositorio?color=blue&style=for-the-badge" alt="Top Language" />
  <img src="https://img.shields.io/github/issues/tu-usuario/nombre-del-repositorio?style=for-the-badge" alt="Issues" />
  <img src="https://img.shields.io/github/license/tu-usuario/nombre-del-repositorio?style=for-the-badge" alt="License" />
</p>

---

<p align="center">
  <i>¡Bienvenido al repositorio de mi increíble aplicación construida con Laravel!</i>
</p>

---

## Tabla de Contenidos

1. [Instalación](#instalación)
2. [Requisitos](#requisitos)
3. [Configuración](#configuración)
4. [Uso](#uso)
5. [Contribuir](#contribuir)
6. [Licencia](#licencia)

---

## 🚀 Instalación
Sigue los pasos a continuación para instalar y configurar esta aplicación en tu entorno local.

### Inicio
Dirigete a la carpeta en la que quieras clonar mi repositorio, por ejemplo Desktop

### Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/nombre-del-repositorio.git](https://github.com/devJuanMartinez/Ejercicio-CRUD-21feb.git
````

### Instalar dependencias
Instala las dependencias utilizando Composer para Laravel:

```bash
composer install
````

### Configurar el archivo .env
Copia el archivo de ejemplo .env.example a .env y personalízalo con tus configuraciones de base de datos y otras variables de entorno:

```bash
cp .env.example .env
````

Edita el archivo .env con tus credenciales:

```bash
APP_NAME=MiApp
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=nombre_de_usuario
DB_PASSWORD=contraseña
````
### Generar la clave de la aplicación
Genera la clave de la aplicación con el siguiente comando:

```bash
php artisan key:generate
````

### Migraciones y Seeders
Ejecuta las migraciones y los seeders para configurar tu base de datos:

```bash
php artisan migrate --seed
````

### Iniciar el servidor
Finalmente, inicia el servidor local de Laravel:

```bash
php artisan serve
````
Tu aplicación estará disponible en http://localhost:8000.




