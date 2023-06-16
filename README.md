# HeadlessHeadfull-CMS

Este proyecto proporciona una colección de API para la búsqueda y aplicación a plazas de trabajo. Está desarrollado utilizando Laravel Sail y Docker.

## Instalación y configuración

Este proyecto es una aplicación web desarrollada con Laravel Sail y Filament.

### Requisitos

Asegúrate de tener los siguientes requisitos antes de ejecutar el proyecto:

- Docker

### Pasos

Sigue estos pasos para configurar y ejecutar el proyecto:

1. Clona el repositorio desde Git: `git clone https://github.com/Majo97/HeadlessHeafull-CMS.git`
2. Crea el archivo `.env` a partir del archivo `.env.example` y configura las variables de entorno según tu entorno de desarrollo.
3. Ejecuta el comando `composer install` para instalar las dependencias del proyecto.
4. Asigna un alias a Sail para facilitar su uso: `alias sail='[RUTA_AL_PROYECTO]/vendor/bin/sail'`
5. Ejecuta el comando `sail up -d` para levantar los contenedores de Laravel Sail en segundo plano.
6. Ejecuta las migraciones para crear las tablas en la base de datos: `sail artisan migrate`
7. Ejecuta los seeders para poblar la base de datos con datos de ejemplo: `sail artisan db:seed`
8. Accede al panel de administración a través de `localhost/admin`. Inicia sesión con las siguientes credenciales:
   - email: user@example.com
   - password: administrador

En el panel de administración, podrás modificar, ver y agregar plazas de trabajo, empresas, usuarios y miembros de compañía.

## APIs

El proyecto cuenta con tres APIs:

- API para obtener una lista paginada de todas las plazas de trabajo: http://localhost/api/index/{perPage}
- API para obtener el detalle de una plaza de trabajo específica: http://localhost/api/job-positions/{id}
- API para enviar datos de aplicación y enviar correos en segundo plano: http://localhost/api/aplication

Lee la documentación completa de las APIs [aquí](https://documenter.getpostman.com/view/26976998/2s93sgV9so).

## Pruebas

El proyecto incluye pruebas automatizadas que puedes ejecutar con el siguiente comando: `sail artisan test`.

## Frontend

Si deseas ver el proyecto en funcionamiento, clona el repositorio del frontend [AQUÍ](https://github.com/Majo97/Headless-Frontend) y sigue las instrucciones de instalación y ejecución proporcionadas en ese repositorio.


