# Proyecto de Integración Continua

Este proyecto es parte de un trabajo universitario que implementa una aplicación web utilizando Laravel, Docker y Jenkins para demostrar prácticas de integración continua y despliegue automatizado.

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes en tu sistema:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/download/) (para gestionar dependencias de PHP)

## Clonar el Repositorio

```bash
git clone https://github.com/AndresCupa/ProyectoIntCont.git
cd ProyectoIntCont
```

## Configuración del Entorno

1. Copia el archivo de ejemplo `.env.example` y renómbralo a `.env`:

```bash
cp .env.example .env
```

2. Genera la clave de la aplicación Laravel:

```bash
php artisan key:generate
```

## Construir y Levantar los Contenedores

El proyecto incluye un archivo `docker-compose.yml` y dos Dockerfiles (`dockerfile.laravel` y `dockerfile.nginx`) para configurar los servicios necesarios.

1. Construye y levanta los contenedores:

```bash
docker-compose up -d --build
```

Esto iniciará los siguientes servicios:

- **Laravel App**: Contenedor que ejecuta la aplicación Laravel.
- **Nginx**: Servidor web que sirve la aplicación.
- **MySQL**: Base de datos para la aplicación.

2. Verifica que los contenedores estén corriendo:

```bash
docker ps
```

## Instalar Dependencias

1. Accede al contenedor de la aplicación Laravel:

```bash
docker exec -it laravel_app bash
```

2. Dentro del contenedor, instala las dependencias de PHP:

```bash
composer install
```

## Migraciones y Seeders

1. Ejecuta las migraciones para crear las tablas en la base de datos:

```bash
php artisan migrate
```

2. (Opcional) Ejecuta los seeders para poblar la base de datos con datos de prueba:

```bash
php artisan db:seed
```

## Acceder a la Aplicación

Una vez que los contenedores estén en funcionamiento y las dependencias instaladas, puedes acceder a la aplicación en tu navegador web en:

```
http://localhost
```

## Pruebas

Para ejecutar las pruebas automatizadas, utiliza el siguiente comando dentro del contenedor de la aplicación:

```bash
php artisan test
```

## Desplegar con Jenkins

Este proyecto está preparado para integrarse con Jenkins para automatizar el proceso de integración continua. Asegúrate de tener Jenkins instalado y configurado en tu entorno. Puedes crear un pipeline en Jenkins que realice las siguientes tareas:

1. Clonar el repositorio.
2. Construir los contenedores Docker.
3. Ejecutar las migraciones y seeders.
4. Ejecutar las pruebas automatizadas.
5. Desplegar la aplicación.

## Contribuciones

Las contribuciones son bienvenidas. Por favor, sigue las buenas prácticas de desarrollo y realiza pull requests para proponer cambios.

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
